<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use App\TbWallet;
use App\TbWalletCat;
use App\User;
use Auth;
use DB;

class TbWalletController extends Controller
{
    
    public function index()
    {
        $mid = session()->get('mid');
        $dd = date('Y-m-');

        $txt_mount = array('01'=>'มกราคม','02'=>'กุมภาพันธ์','03'=>'มีนาคม','04'=>'เมษายน','05'=>'พฤษภาคม','06'=>'มิถุนายน','07'=>'กรกฎาคม','08'=>'สิงหาคม','09'=>'กันยายน','10'=>'ตุลาคม','11'=>'พฤศจิกายน','12'=>'ธันวาคม');
        $txt_date = $txt_mount[date('m')];
        
        $wallet = TbWallet::where('w_dt','LIKE',$dd.'%')
                    ->where('m_id',$mid)
                    ->where('w_type','1')
                    ->orderBy('w_dt','desc')
                    ->get();
        $scat = TbWalletCat::where('m_id','=',$mid)
                    ->where('wc_type','1')
                    ->orderBy('wc_name','asc')
                    ->pluck('wc_name','wc_id');

        return view('wallet.income',[
            'wallet'=>$wallet,
            'scat'=>$scat,
            'txt_date'=>$txt_date
            ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $mid = session()->get('mid');
        $uid = Auth::user()->u_id;
        //$midup = TbMember::where('m_id',$mid)->pluck('m_id_up')->first();

        $scat = $request->s_cat;     
        $tname = $request->t_name;
        $tamount = $request->t_amount;
        $tetc = $request->t_etc;
        $tdate = $request->t_date;
        $ttype = '1'; //income
        $tstatus = '1';

        if($scat=="")
        return redirect('/wallet/income')->with('error','*กรุณาระบุหมวดหมู่รายได้');
        if($tname=="")
        return redirect('/wallet/income')->with('error','*กรุณาระบุชื่อรายการ');
        if($tdate=="")
        return redirect('/wallet/income')->with('error','*กรุณาระบุวันที่');
        if($tamount=="")
        return redirect('/wallet/income')->with('error','*กรุณาระบุจำนวนเงิน');
        
        $data = new TbWallet();

        $data->wc_id = $scat;
        $data->w_name = $tname;
        $data->w_amount = $tamount;
        $data->w_etc = $tetc;
        $data->w_dt = $tdate;
        $data->w_type = $ttype;
        $data->m_id = $mid;
        $data->u_id = $uid;
        $data->w_status = $tstatus;

        $data->save();
        SWAL::message('ผลการทำงาน','บันทึกข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);
        
        return redirect()->action('TbWalletController@index');
    }

    // public function show($id)
    // {
    //     //
    // }

    public function edit($id)
    {
        $mid = session()->get('mid');
        //$midup = TbMember::where('m_id',$mid)->pluck('m_id_up')->first();
        
        $data = TbWallet::findOrFail($id);
        $scat = TbWalletCat::where('m_id','=',$mid)
                    ->where('wc_type','1')
                    ->orderBy('wc_name','asc')
                    ->pluck('wc_name','wc_id');

        return view('wallet.wallet_edit',[
            'data'=>$data,
            'scat'=>$scat
            ]);
    }

    public function update(Request $request, $id)
    {
        $wallet = new TbWallet();
        $data = $this->validate($request, [
            't_name'=>'required',
            's_cat'=>'required',
            't_amount'=>'required',
            't_date'=>'required',
            's_status'=>'required'
        ]);
        $data['w_id'] = $id;

        $wallet->updateWallet($data);

        SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
        return redirect()->action('TbWalletController@index');
    }
    

    public function incomelist()
    {
        $data = DB::table('tb_wallet')
        ->select('w_id','wc_name','w_name','w_amount','w_dt','w_status','u_name','tb_wallet.created_at')
        ->join('tb_users','tb_users.u_id','=','tb_wallet.u_id')
        ->join('tb_wallet_cat','tb_wallet_cat.wc_id','=','tb_wallet.wc_id')
        ->where('tb_wallet.m_id',session()->get('mid'))
        ->where('w_type','1')
        ->orderBy('tb_wallet.created_at','desc')
        ->get();
        
        return view('wallet.list_income',[
            'data'=>$data
        ]);
    }

    public function expenlist()
    {
        $data = DB::table('tb_wallet')
        ->select('w_id','wc_name','w_name','w_amount','w_dt','w_status','u_name','tb_wallet.created_at')
        ->join('tb_users','tb_users.u_id','=','tb_wallet.u_id')
        ->join('tb_wallet_cat','tb_wallet_cat.wc_id','=','tb_wallet.wc_id')
        ->where('tb_wallet.m_id',session()->get('mid'))
        ->where('w_type','2')
        ->orderBy('tb_wallet.created_at','desc')
        ->get();
        
        return view('wallet.list_expen',[
            'data'=>$data
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use App\TbWalletCat;
use App\User;
use Auth;

class TbWalletCatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $mid = session()->get('mid');
        
        $walletcat = TbWalletCat::where('m_id','=',$mid)
                    ->orderBy('wc_type','asc')
                    ->orderBy('wc_name','asc')
                    ->get();

        $wcat = array('1'=>'รายได้','2'=>'ค่าใช้จ่าย');

        return view('category.wallet',[
            'walletcat'=>$walletcat,
            'wcat'=>$wcat
            ]);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $name = $request->t_name;
        $type = $request->s_type;
        $cat = $request->s_cat;
        $mid = session()->get('mid');
        $status = '1';

        if($name=="")
        return redirect('cat_wallet')->with('error','*กรุณาระบุชื่อหมวดหมู่');
        
        if($cat == '')
        {
            $cat = '0';
        }

        $wall_cat = new TbWalletCat();

        $wall_cat->wc_name = $name;
        $wall_cat->wc_type = $type;
        $wall_cat->wc_cat = $cat;
        $wall_cat->m_id = $mid;
        $wall_cat->wc_status = $status;

        $wall_cat->save();
        SWAL::message('ผลการทำงาน','บันทึกข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);
        
        return redirect()->action('TbWalletCatController@index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $walletcat = TbWalletCat::findOrFail($id);
        return view('category.wallet_edit',[
            'walletcat'=>$walletcat
            ]);
    }

    public function update(Request $request, $id)
    {
        // $walletcat = TbWalletCat::find($id);
        // $walletcat->update($request->all());

        $walletcat = new TbWalletCat();
        $data = $this->validate($request, [
            't_name'=>'required',
            's_type'=>'required',
            's_cat'=>'required',
            's_status'=>'required'
        ]);
        $data['wc_id'] = $id;

        $walletcat->updateWalletcat($data);

        SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
        return redirect()->action('TbWalletCatController@index');
    }


    public function getWcatList(Request $request)
    {
        $mid = session()->get('mid');

        $wcat = TbWalletCat::where("wc_type",$request->type_id)
                    ->where("m_id",$mid)
                    ->pluck("wc_name","wc_id");

        return response()->json($wcat);
    }

}

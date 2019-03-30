<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use Auth;
use DB;
use App\TbShop;
use App\TbUserDetail;
use App\TbInvite;

class UserManageController extends Controller
{
    public function index()
    {
        return $this->home_user();
    }

    public function check($ck,$mid)
    {
        if($ck == 'shop')
        {
            return $this->shop($mid);
        }

    }
    
    private function home_user()
    {        
        $shop = DB::table('tb_user_detail')
        ->select('tb_shop.m_id','m_name')
        ->join('tb_shop','tb_shop.m_id','=','tb_user_detail.m_id')
        ->where('u_id',session()->get('uid'))
        ->where('ud_status','1')
        ->where('ud_level','6')
        ->get();

        $invite = DB::table('tb_users')
        ->join('tb_invite','tb_invite.in_email','=','tb_users.u_email')
        ->where('tb_users.u_id',session()->get('uid'))
        ->where('in_status','1')
        ->count();

        return view('user_manage.home',[
            'shop'=>$shop,
            'invite'=>$invite
            ]);
    }
    
    public function myshop()
    {
        // ร้านเจ้าของ
        $data = DB::table('tb_user_detail')
        ->select('tb_user_detail.m_id','ud_level','ud_position','ud_phone','ud_right','ud_login','ud_cstock','m_name','m_address','m_register_date')
        ->join('tb_shop','tb_shop.m_id','=','tb_user_detail.m_id')
        ->where('u_id',session()->get('uid'))
        ->where('ud_status','1')
        ->where('ud_level','6')
        ->get();

        // ร้านอื่นๆ
        $data2 = DB::table('tb_user_detail')
        ->select('tb_user_detail.m_id','ud_level','ud_position','ud_phone','ud_right','ud_login','ud_cstock','m_name','m_address','m_register_date')
        ->join('tb_shop','tb_shop.m_id','=','tb_user_detail.m_id')
        ->where('u_id',session()->get('uid'))
        ->where('ud_status','1')
        ->where('ud_level','4')
        ->get();

        $invite = DB::table('tb_users')
        ->join('tb_invite','tb_invite.in_email','=','tb_users.u_email')
        ->where('tb_users.u_id',session()->get('uid'))
        ->where('in_status','1')
        ->count();

        return view('user_manage.myshop',[
            'data'=>$data,
            'data2'=>$data2,
            'invite'=>$invite
            ]);
    }
    
    // public function othershop()
    // {
    //     $data = DB::table('tb_user_detail')
    //     ->select('tb_user_detail.m_id','ud_level','ud_position','ud_phone','ud_right','ud_login','ud_cstock','m_name','m_address','m_register_date')
    //     ->join('tb_shop','tb_shop.m_id','=','tb_user_detail.m_id')
    //     ->where('u_id',session()->get('uid'))
    //     ->where('ud_status','1')
    //     ->where('ud_level','4')
    //     ->get();

    //     return view('user_manage.othershop',['data'=>$data]);
    // }
    
    // public function invite()
    // {
    //     $data = DB::table('tb_invite')
    //     ->select('tb_shop.m_id','m_name','in_id','tb_invite.created_at')
    //     ->join('tb_shop','tb_shop.m_id','=','tb_invite.m_id')
    //     ->join('tb_users','tb_users.u_email','=','tb_invite.in_email')
    //     ->where('tb_users.u_id',session()->get('uid'))
    //     ->where('in_status','1')
    //     ->get();

    //     return view('user_manage.myinvite',['data'=>$data]);
    // }

    private function shop($mid)
    {
        $shop = \App\TbShop::where('m_id',$mid)->first();
        $u_detail = TbUserDetail::where('u_id',session()->get('uid'))
                    ->where('m_id',$mid)
                    ->first();

        session(['mid'=>$mid]);
        session(['midup'=>$shop->m_id_up]);
        session(['mname'=>$shop->m_name]);
        session(['udlevel'=>$u_detail->ud_level]);
        session(['udright'=>$u_detail->ud_right]);
        session(['udlogin'=>$u_detail->ud_login]);

        return redirect('/dashboard');
    }

    public function store(Request $request)
    {
        $shop = new TbShop();
        //$shop->m_id_up = $shop->m_id;
        $shop->m_name = $request->t_name;
        $shop->m_level = '1';
        $shop->m_status = '1';
        $shop->m_register_date = date('Y-m-d');
        $shop->save();

        DB::table('tb_shop')
                ->where('m_id',$shop->m_id)
                ->update(['m_id_up'=>$shop->m_id]);

        $udetail = new \App\TbUserDetail();
        $udetail->u_id = session()->get('uid');
        $udetail->m_id = $shop->m_id;
        $udetail->ud_level = '6';
        $udetail->ud_status = '1';
        $udetail->save();

        SWAL::message('ผลการทำงาน','สร้างร้านค้าใหม่แล้ว','success',['timer'=>5000]);

        //return $this->home_user();
        return redirect('/myshop');
    }
}


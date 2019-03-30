<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use DB;
use App\TbUsers;
use App\TbUserDetail;
use App\User;
use App\TbInvite;
use Hash;

class TbUsersController extends Controller
{
    
    public function index()
    {
        $mid = session()->get('mid');

        $data = DB::table('tb_users')
                    ->select('tb_users.u_id','tb_users.u_name',
                            'tb_user_detail.ud_id','tb_user_detail.ud_position','tb_user_detail.ud_phone','tb_user_detail.ud_status','ud_level')
                    ->join('tb_user_detail','tb_user_detail.u_id','=','tb_users.u_id')
                    ->where('m_id',$mid)
                    ->orderBy('ud_level','desc')
                    ->get();

        $invite = TbInvite::where('m_id',$mid)->get();

        return view('user_manage.emp.list',[
            'data'=>$data,
            'invite'=>$invite
            ]);
    }

    // public function check($id)
    // {
    //     session(['mid'=>$id]);

    //     return $this->index();
    // }

    public function work($work, $id)
    {
        if($work == 'edit')
        {
            return $this->edit($id);
        }

        if($work == 'right')
        {
            return $this->right($id);
        }

        if($work == 'login_dt')
        {
            return $this->login_dt($id);
        }

        if($work == 'myaccount')
        {
            return $this->edit_myaccount();
        }
    }

    private function edit_myaccount()
    {
        $data = TbUsers::findOrFail(session()->get('uid'));

        return view('user_manage.myaccount_edit',[
            'data'=>$data
            ]);
    }

    private function right($id)
    {
        $data = DB::table('tb_users')
                    ->select('tb_users.u_id','u_name','ud_id','ud_right')
                    ->join('tb_user_detail','tb_user_detail.u_id','=','tb_users.u_id')
                    ->where('m_id',session()->get('mid'))
                    ->where('ud_id',$id)
                    ->first();

        $right = \App\TbUserRight::orderBy('ri_no','asc')->get();


        return view('user_manage.emp.right',[
            'data'=>$data,
            'right'=>$right
            ]);
    }

    private function login_dt($id)
    {
        $data = DB::table('tb_users')
                    ->select('tb_users.u_id','u_name','ud_id','ud_login')
                    ->join('tb_user_detail','tb_user_detail.u_id','=','tb_users.u_id')
                    ->where('m_id',session()->get('mid'))
                    ->where('ud_id',$id)
                    ->first();

        return view('user_manage.emp.login_dt',[
            'data'=>$data
            ]);
    }
    
    public function myaccount()
    {
        $data = TbUsers::findOrFail(session()->get('uid'));

        $invite = DB::table('tb_users')
        ->join('tb_invite','tb_invite.in_email','=','tb_users.u_email')
        ->where('tb_users.u_id',session()->get('uid'))
        ->where('in_status','1')
        ->count();

        return view('user_manage.myaccount',[
            'data'=>$data,
            'invite'=>$invite
            ]);
    }

    public function create()
    {
        return view('user_manage.emp.create'); 
    }


    public function store(Request $request)
    {        
        $data = $this->validate($request, [
            't_idcard'=>'required',
            't_name'=>'required',
            't_email'=>'required'
        ],[
            't_idcard.required'=>'โปรดระบุหมายเลขประจำตัวประชาชน',
            't_name.required'=>'โปรดระบุชื่อ',
            't_email.required'=>'โปรดระบุอีเมล'
        ]);

        // เช็คว่ามียัง
        $count = TbUsers::where('u_email',$request->t_email)->count();        
        if($count > 0)
        {
            SWAL::message('ผลการทำงาน','มีบัญชีผู้ใช้นี้ ' . $request->t_email . ' อยู่ในระบบแล้ว ไม่สามารถเพิ่มใหม่ได้','warning',['timer'=>5000]);    
            return redirect()->back();
        }

        $data = new TbUsers();
        $data->u_idcard = $request->t_idcard;
        $data->u_name = $request->t_name;
        $data->u_email = $request->t_email;
        $data->password = Hash::make($request->t_pass);
        $data->u_status = '1';
        $data->save();
        $uid = $data->u_id;

        $detail = new TbUserDetail();
        $detail->u_id = $uid;
        $detail->m_id = session()->get('mid');
        $detail->ud_level = '4';
        $detail->ud_position = $request->t_position;
        $detail->ud_phone = $request->t_tel;
        $detail->ud_status = '1';       

        $detail->save();

        SWAL::message('ผลการทำงาน','บันทึกพนักงานใหม่แล้ว','success',['timer'=>5000]);

        return redirect('/employee');
    }

    public function edit($id)
    {
        $data = TbUserDetail::findOrFail($id);

        return view('user_manage.emp.edit',[
            'data'=>$data
            ]);
    }

    public function update(Request $request, $id)
    {
        if($request->ck == 'emp')
        {
            return $this->upd_emp($request, $id);
        }

        if($request->ck == 'right')
        {
            return $this->upd_right($request, $id);
        }

        if($request->ck == 'login_dt')
        {
            return $this->upd_login_dt($request, $id);
        }

        if($request->ck == 'myaccount')
        {
            return $this->upd_myaccount($request, $id);
        }
    }

    private function upd_emp($request, $id)
    {
        $upd = TbUserDetail::find($id);
        $upd->ud_position = $request->t_position;
        $upd->ud_phone = $request->t_tel;
        $upd->ud_status = $request->s_status;
        $upd->save();


        SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
        return redirect()->action('TbUsersController@index');
    }

    private function upd_right($request, $id)
    {
        $rig = '/';
        foreach($request->cb as $request)
        {
            $rig .= $request . '/';
        }
        
        $upd = TbUserDetail::find($id);
        $upd->ud_right = $rig;
        $upd->save();


        SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
        return redirect()->action('TbUsersController@index');
    }

    private function upd_login_dt($request, $id)
    {
        $dd = ' ';

        if($request->day)
        {
            foreach($request->day as $day)
            {
                $dd .= ',' . $day .'|' . $request->start[$day] . '|' . $request->stop[$day] ;
            }
        }else{
            $dd = '';
        }
        //dd($dd);
        $upd = TbUserDetail::find($id);
        $upd->ud_login = $dd;
        $upd->save();

        SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
        return redirect()->action('TbUsersController@index');
    }

    private function upd_myaccount($request, $id)
    {
        $upd = TbUsers::find($id);
        $upd->u_idcard = $request->t_idcard;
        $upd->u_name = $request->t_name;
        $upd->u_email = $request->t_email;
        $upd->save();


        SWAL::message('ผลการทำงาน','แก้ไขข้อมูลเรียบร้อยแล้ว','success',['timer'=>5000]);        
        return redirect('myaccount');
    }
}

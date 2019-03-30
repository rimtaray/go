<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\SweetAlert\Facades\SWAL;
use App\TbInvite;
use App\TbUsers;
use App\TbUserDetail;
use DB;

class TbInviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('tb_invite')
        ->select('tb_shop.m_id','m_name','in_id','tb_invite.created_at')
        ->join('tb_shop','tb_shop.m_id','=','tb_invite.m_id')
        ->join('tb_users','tb_users.u_email','=','tb_invite.in_email')
        ->where('tb_users.u_id',session()->get('uid'))
        ->where('in_status','1')
        ->get();

        $invite = DB::table('tb_users')
        ->join('tb_invite','tb_invite.in_email','=','tb_users.u_email')
        ->where('tb_users.u_id',session()->get('uid'))
        ->where('in_status','1')
        ->count();

        return view('user_manage.myinvite',[
            'data'=>$data,
            'invite'=>$invite
            ]);
    }
    
    public function work($work, $id)
    {
        if($work == 'accept')
        {            
            $upd = TbInvite::find($id);
            $upd->in_status = '2';
            $upd->save();

            $detail = new TbUserDetail();
            $detail->u_id = session()->get('uid');
            $detail->m_id = $upd->m_id;
            $detail->ud_level = '4';
            $detail->ud_status = '1';    
            $detail->save();

            SWAL::message('ผลการทำงาน','ตอบรับคำเชิญแล้ว','success',['timer'=>5000]);        
            return redirect('invite');
        }
        if($work == 'reject')
        {
            $upd = TbInvite::find($id);
            $upd->in_status = '3';
            $upd->save();

            SWAL::message('ผลการทำงาน','ปฎิเสธการเชิญแล้ว','success',['timer'=>5000]);        
            return redirect('invite');
        }
        if($work == 'cancel')
        {
            $upd = TbInvite::find($id);
            $upd->in_status = '0';
            $upd->save();

            SWAL::message('ผลการทำงาน','ยกเลิกการเชิญแล้ว','success',['timer'=>5000]);        
            return redirect('employee');
        }
    }
    public function create()
    {
        return view('user_manage.invite.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $this->validate($request, [
            't_email'=>'required'
        ],[
            't_email.required'=>'โปรดระบุอีเมล'
        ]);

        // เช็คว่ามียัง
        $count = TbUsers::where('u_email',$request->t_email)->count();        
        if($count < 1)
        {
            SWAL::message('ผลการทำงาน','ไม่พบบัญชีผู้ใช้นี้ ' . $request->t_email . ' อยู่ในระบบ ไม่สามารถเชิญได้','warning',['timer'=>5000]);    
            return redirect()->back();
        }

        $data = new TbInvite();
        $data->in_email = $request->t_email;
        $data->u_id = session()->get('uid');
        $data->m_id = session()->get('mid');
        $data->in_status = '1';
        
        $data->save();    

        SWAL::message('ผลการทำงาน','เชิญผู้ใช้ใหม่แล้ว','success',['timer'=>5000]);

        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

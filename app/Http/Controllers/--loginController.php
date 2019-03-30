<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\TbUsers;
use Hash;

class loginController extends Controller
{
    public function login(Request $req)
    {
        $username = $req->input('username');
        $password = $req->input('password');

        $user = TbUsers::where("u_email",$username)->first();
        
        if(!$user)
        return redirect('login')->with('error','ไม่พบผู้ใช้นี้ในระบบ');

        if(!\Hash::check($password,$user->u_pass))
        return redirect('login')->with('error','รหัสผ่านไม่ถูกต้อง');

        //\Auth::login($user);

        return redirect('/dashboard');


        //$checkLogin = TbUsers::where(['u_email'=>$username,'u_pass'=>Hash::make($password)])->get();
        // $checkLogin = TbUsers::where(['u_email'=>$username,'u_pass'=>Hash::check($user, $password)])->get();

        // if(count($checkLogin) > 0)
        // {
        //     echo "login";
        // }
        // else
        // {
        //     echo "Faield ";
        //     echo $username .'-'.Hash::make($password);
        // }
    }
    
}

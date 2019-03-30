<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\User;
use Hash;

//use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if($request->isMethod('get'))
        return view('auth.login2');

        $username = $request->input('username');
        $password = $request->input('password');

        if($username=="" || $password=="")
        return redirect('login2')->with('error','กรุณาระบุอีเมลและรหัสผ่าน');

        $user = User::where("u_email",$username)->first();
        
        if(!$user)
        return redirect()->back()->with('error','ไม่พบผู้ใช้นี้ในระบบ');

        if(!\Hash::check($password,$user->password))
        return redirect()->back()->with('error','รหัสผ่านไม่ถูกต้อง');

         \Auth::login($user);

        $u = \Auth::user();
        $uid = $u->u_id;
        $uname = $u->u_name;

        session(['uid'=>$uid]);
        session(['uname'=>$uname]);

        // session(['mid'=>$mid]);
        // session(['midup'=>$midup]);
        
        // return redirect('/dashboard');
        return redirect('/user_manage');

    }


    // public function authenticate()
    // {
    //     if (Auth::attempt(['u_email' => $username, 'password' => $password])) {
    //         // Authentication passed...
    //         return redirect()->intended('barcode');
    //     }
    // }

    public function username()
    {
        return 'u_email';
    }

    // public function authenticate(Request $req)
    // {
    //         $username = $req->input('username');
    //         $password = $req->input('password');
        
    //     if (Auth::attempt(['u_email' => $username, 'password' => $password])) {
    //         // Authentication passed...
    //         return redirect()->intended('home');
    //     }
    // }
    
    public function logout()
    {
        if(\Auth::check())
        {
            \Auth::logout();
        }

        return redirect('/login');
    }
}

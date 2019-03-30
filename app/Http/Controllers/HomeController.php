<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Middleware;
//use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function test()
    {
        //return view('home');
        $userlogin = Auth::user();
        return $userlogin;
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendcontroller extends Controller
{
    //
    public function __construct()
    {

    }
    public function home()
    {
         return view('home');
    }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function forget()
    {
        return view('forgetpass');
    }
}

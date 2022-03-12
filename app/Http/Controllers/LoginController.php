<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login.login');
    }

    public function register()
    {
        return view('admin.login.register');
    }

    public function forgotpassword()
    {
        return view('admin.login.forgotpassword');
    }

    public function changepassword()
    {
        return view('admin.login.changepassword');
    }
}

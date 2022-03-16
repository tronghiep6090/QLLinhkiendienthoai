<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

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
    public function CheckLogin()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin-login')->send();
        }
    }
    public function sb_Login(Request $request)
    {
        $uname = $request->username;
        $upass = $request->password;

        $result = DB::table('users')->where('name', $uname)->where('password', $upass)->first();

        if($result){
            //Session::put('name',$result->customer_fullname);
            //Session::put('id',$result->id);

            return Redirect::to('/home');
        } else{
            Session::put('message','Tài khoản hoặc mật khẩu không đúng.');
            return Redirect::to('/login');
        }
    }
    public function logout(){
        $this->CheckLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin-login');
    }

    public function sb_Register(Request $request)
    {
        $uname = $request->username;
        $upass = $request->password;

        $result = DB::table('users')->where('name', $uname)->where('password', $upass)->first();

        if($result){
            //Session::put('name',$result->customer_fullname);
            //Session::put('id',$result->id);

            return Redirect::to('/home');
        } else{
            Session::put('message','Tài khoản hoặc mật khẩu không đúng.');
            return Redirect::to('/login');
        }
    }
}
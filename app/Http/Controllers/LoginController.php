<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
// Update 2022
use Illuminate\Support\Facades\Log;

use App\Http\Requests;
use Exception;
use Illuminate\Support\Facades\Redirect;
session_start();

class LoginController extends Controller
{

    public function loginpage()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        //$uname = $request->session()->get('username');
        //$upass = $request->session()->get('password');
        $username = $request->input('username');
        $passwd = $request->input('password');

        Log::debug($username);
        Log::debug($passwd);

        $result = DB::table('users')->where('name', $username)->where('password', $passwd)->first();

        if ($result)
        {
            $request->session()->put('username', $username);
            $request->session()->put('password', $passwd);
            return Redirect::to('/home');
        }
        else
        {
            // Update: return to loginpage
            Session::put('message','Tài khoản hoặc mật khẩu không đúng.');
            return view("login");
        }

    }

    public function getLogin(Request $request)
    {
        return view("login");
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
        $id=Session::get('id');
        if($id){
            return Redirect::to('welcome');
        }else{
            return Redirect::to('login')->send();
        }
    }

    // To be remove
    public function sb_Login(Request $request)
    {
        $uname = $request->username;
        $upass = $request->password;

        $result = DB::table('users')->where('name', $uname)->where('password', $upass)->first();

        if($result){
            Session::put('name',$result->name);
            Session::put('id',$result->id);

            return Redirect::to('/home');
        } else{
            Session::put('message','Tài khoản hoặc mật khẩu không đúng.');
            return Redirect::to('/login');
        }
    }

    public function logout(){
        $this->CheckLogin();
        Session::put('name',null);
        Session::put('id',null);
        return Redirect::to('/login');
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

    public function regis(Request $request)
    {
        $data = array();
        $data['name']= $request->user;
        $data['email']= $request->email;
        $data['password']= $request->password;
        $data['remember_token']= $request->confirmpassword;
        try {
             $NO = DB::table('users')->insert($data);
             Session::put('message','Đăng Ký Thành công !');
        return view('admin.login.register');
          } catch (Exception $e) {
            return view('admin.login.register');
            }


        //return redirect::to('/admin.login.register');
        //view('admin.login.forgotpassword');
    }
}

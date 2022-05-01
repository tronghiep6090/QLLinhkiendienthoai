<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $username = $request->session()->get('username');
        $passwd = $request->session()->get('password');

        if ($username)
        {
            return view('home');
        }
        else
        {
            return Redirect::to('/');
        }
    }
}

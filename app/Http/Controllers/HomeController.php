<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $username = $request->session()->get('username');
        $passwd = $request->session()->get('password');

        Log::Debug($username.'HomeController');
        Log::Debug($passwd);

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

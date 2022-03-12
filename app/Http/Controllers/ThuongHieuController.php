<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThuongHieuController extends Controller
{
    //
    public function danhsachthuonghieu()
    {
        return view('admin.thuonghieu.danhsachthuonghieu');
    }
    public function themthuonghieu()
    {
        return view('admin.thuonghieu.themthuonghieu');
    }
}

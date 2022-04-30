<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChiTietXuatController extends Controller
{
    function  __construct()
    {
        $this->folder = 'chitietxuat';
    }
    public function  index()
    {
        // $ctx = ChiTietXuat::all();
        // $data =array('ctx'=> $ctx);
        // $this->render('index',$data);
    }
    public function  insert()
    {
        $this->render('insert');
    }
    public function edit()
    {
        // $donxuat = DonXuat::find($_GET['id']);
        // $data =array('donxuat'=> $donxuat);
        // $this->render('edit',$data);
    }
}

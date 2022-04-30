<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonNhapController extends Controller
{
    function  __construct()
    {
        $this->folder = 'donnhap';
    }
    public function  index()
    {
        // $donnhap = DonNhap::all();
        // $data =array('donnhap'=> $donnhap);
        // $this->render('index',$data);
    }
    public function  insert()
    {
        $this->render('insert');
    }
    public function  show()
    {
        // $donnhap = DonNhap::find($_GET['id']);
        // $data = array('donnhap' => $donnhap);
        // $this->render('show', $data);
    }
    public function  print()
    {
        // $donnhap = DonNhap::find($_GET['id']);
        // $data = array('donnhap' => $donnhap);
        // $this->render('print', $data);
    }
}

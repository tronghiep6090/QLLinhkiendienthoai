<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Facade\FlareClient\View;

class NhaCungCapController extends Controller
{
    //
    public function DS_loai()
    {
        $nv = DB::table('loaihanghoa')->get();
        $data = view('quanlychucvu')->with('room',$nv);
        return view('admin.');
    }
    public function them_nhacungcap(Request $request)
    {
        $data = array();
        
        $data['id_NCC']= $request->id_NCC;
        $data['ten_NCC']= $request->ten_NCC;
        $data['e_mail']= $request->e_mail;
        $data['dien_thoai']= $request->dien_thoai;
        $data['dia_chi']= $request->dia_chi;

        DB::table('nhacungcap')->insert($data);
        Session::put('message','Thêm TH Thành công !');

        return redirect::to('/them-nhacungcap');
    }

    public function DS_nhacungcap()
    {
        $kh = DB::table('nhacungcap')->get();
        $data = view('admin.nhacungcap.danhsachnhacungcap')->with('DSnhacungcap',$kh);
        return view('welcome')->with('nhacungcap',$data);
    }
    public function manufacture_list()
    {
        //$this->CheckLogin();
        $manufacture_list=DB::table('nhacungcap')->get();
        $manager_manufacture=view('admin.nhacungcap.danhsachnhacungcap')->with('danhsachnhacungcap',$manufacture_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.nhacungcap.danhsachnhacungcap',$manager_manufacture); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
}

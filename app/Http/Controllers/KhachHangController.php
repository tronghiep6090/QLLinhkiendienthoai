<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Facade\FlareClient\View;

class KhachHangController extends Controller
{
    //
    // public function danhsach_thuonghieu()
    // {
    //     $nv = DB::table('khachhang')->get();
    //     $data = view('quanlychucvu')->with('room',$nv);
    //     return view('admin.');
    // }
    public function them_thuonghieu(Request $request)
    {
        $data = array();
        
        $data['id_TH']= $request->id_TH;
        $data['ten_TH']= $request->ten_TH;
        $data['mo_ta']= $request->mo_ta;

        DB::table('thuonghieu')->insert($data);
        Session::put('message','Thêm TH Thành công !');

        return redirect::to('/them-thuonghieu');
    }

    public function danhsach_khachhang()
    {
        $kh = DB::table('khachhang')->get();
        $data = view('danhsachkhachhang')->with('room',$kh);
        return view('welcome')->with('danhsachkhachhang',$data);
    }
    public function customer_list()
    {
        //$this->CheckLogin();
        $customer_list=DB::table('khachhang')->get();
        $manager_customer=view('admin.khachhang.danhsachkhachhang')->with('danhsachkhachhang',$customer_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.khachhang.danhsachkhachhang',$manager_customer); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
}

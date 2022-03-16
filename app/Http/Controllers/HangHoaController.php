<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Facade\FlareClient\View;

class HangHoaController extends Controller
{
    //
    public function DS_loai()
    {
        $nv = DB::table('loaihanghoa')->get();
        $data = view('quanlychucvu')->with('room',$nv);
        return view('admin.');
    }
    public function them_hanghoa(Request $request)
    {
        $data = array();
        
        $data['id_HH']= $request->id_HH;
        $data['ten_HH']= $request->ten_HH;
        $data['so_luong']= $request->so_luong;
        $data['mo_ta']= $request->mo_ta;
        $data['loai_HH']= $request->loai_HH;
        $data['id_TH']= $request->id_TH;
        $data['gia_HH']= $request->gia_HH;

        DB::table('hanghoa')->insert($data);
        Session::put('message','Thêm TH Thành công !');

        return redirect::to('/them-hanghoa');
    }

    public function DS_hanghoa()
    {
        $kh = DB::table('hanghoa')->get();
        $data = view('admin.hanghoa.danhsachhanghoa')->with('DShanghoa',$kh);
        return view('welcome')->with('hanghoa',$data);
    }
    public function product_list()
    {
        //$this->CheckLogin();
        $product_list=DB::table('hanghoa')->get();
        $manager_product=view('admin.hanghoa.danhsachhanghoa')->with('danhsachhanghoa',$product_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.hanghoa.danhsachhanghoa',$manager_product); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Facade\FlareClient\View;

class LHangHoaController extends Controller
{
    //
    public function DS_loai()
    {
        $nv = DB::table('loaihanghoa')->get();
        $data = view('quanlychucvu')->with('room',$nv);
        return view('admin.');
    }
    public function them_loaihanghoa(Request $request)
    {
        $data = array();
        
        $data['id_LHH']= $request->id_LHH;
        $data['ten_LHH']= $request->ten_LHH;
        $data['mo_ta']= $request->mo_ta;

        DB::table('loaihanghoa')->insert($data);
        Session::put('message','Thêm TH Thành công !');

        return redirect::to('/them-loaihanghoa');
    }

    public function DS_loaihanghoa()
    {
        $kh = DB::table('loaihanghoa')->get();
        $data = view('admin.loaihanghoa.danhsachloaihanghoa')->with('DSloaihanghoa',$kh);
        return view('welcome')->with('loaihanghoa',$data);
    }
    public function product_type_list()
    {
        //$this->CheckLogin();
        $product_type_list=DB::table('loaihanghoa')->get();
        $manager_producttype=view('admin.loaihanghoa.danhsachloaihanghoa')->with('danhsachloaihanghoa',$product_type_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.loaihanghoa.danhsachloaihanghoa',$manager_producttype); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
}

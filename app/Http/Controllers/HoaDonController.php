<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Facade\FlareClient\View;

class HoaDonController extends Controller
{
    //
    public function DS_loai()
    {
        $nv = DB::table('loaihanghoa')->get();
        $data = view('quanlychucvu')->with('room',$nv);
        return view('admin.');
    }
    public function them_hoadon(Request $request)
    {
        $data = array();
        
        $data['id_LHH']= $request->id_LHH;
        $data['ten_LHH']= $request->ten_LHH;
        $data['mo_ta']= $request->mo_ta;

        DB::table('loaihanghoa')->insert($data);
        Session::put('message','Thêm TH Thành công !');

        return redirect::to('/them-loaihanghoa');
    }

    public function DS_hoadon()
    {
        $kh = DB::table('hoadon')->get();
        $data = view('admin.hoadon.danhsachhoadon')->with('DShoadon',$kh);
        return view('welcome')->with('hoadon',$data);
    }
    public function bill_list()
    {
        //$this->CheckLogin();
        $bill_list=DB::table('hoadon')->get();
        $manager_bill=view('admin.hoadon.danhsachhoadon')->with('danhsachhoadon',$bill_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.hoadon.danhsachhoadon',$manager_bill); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
}

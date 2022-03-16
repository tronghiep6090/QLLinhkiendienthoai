<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Facade\FlareClient\View;

class ThuongHieuController extends Controller
{
    //
    public function DS_loai()
    {
        $nv = DB::table('loaihanghoa')->get();
        $data = view('quanlychucvu')->with('room',$nv);
        return view('admin.');
    }
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

    public function DS_thuonghieu()
    {
        $kh = DB::table('thuonghieu')->get();
        $data = view('admin.thuonghieu.danhsachthuonghieu')->with('DSthuonghieu',$kh);
        return view('welcome')->with('thuonghieu',$data);
    }
    public function brand_list()
    {
        //$this->CheckLogin();
        $brand_list=DB::table('thuonghieu')->get();
        $manager_brand=view('admin.thuonghieu.danhsachthuonghieu')->with('danhsachthuonghieu',$brand_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.thuonghieu.danhsachthuonghieu',$manager_brand); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
}

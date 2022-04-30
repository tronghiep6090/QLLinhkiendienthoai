<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Facade\FlareClient\View;

class DonXuatController extends Controller
{
    // public function delivery_add()
    // {
        
    //     return view('admin.donxuat.themdonxuat');
    // }
    public function delivery_add()
    {
        $nhanvien = DB::table('nhanvien')->orderby('id_NV','desc')->get();
        $khachhang = DB::table('khachhang')->orderby('id_KH','desc')->get();
        $loaihanghoa = DB::table('loaihanghoa')->orderby('id_LHH','desc')->get();
        $thuonghieu = DB::table('thuonghieu')->orderby('id_TH','desc')->get();
        return view('admin.donxuat.themdonxuat')->with('nhanvien',$nhanvien)->with('khachhang',$khachhang) ->with('loaihanghoa',$loaihanghoa)-> with('thuonghieu',$thuonghieu);
    }
    public function save_delivery(Request $request)
    {
        $data = array();
        $data['ngay_ban']= $request->ngay_ban;
        $data['id_NV']= $request->id_NV;
        $data['id_KH']= $request->id_KH;
        $data['loai_HH']= $request->loai_HH;
        $data['id_TH']= $request->id_TH;
        $data['tong']= $request->tong;
        $data['trang_thai']= $request->trang_thai;
        $data['trangthai_DX']=1;
        DB::table('donxuat')->insert($data);
        Session::put('message','Thêm DX Thành công !');

        return redirect::to('/them-donxuat');
    }

    public function DS_donxuat()
    {
        $hh = DB::table('donxuat')
        ->join('nhanvien','nhanvien.id_NV','=','nhanvien.ten_NV')
        ->join('khachhang','khachhang.id_KH','=','khachhang.ten_KH')
        ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.loai_HH')
        ->join('thuonghieu','thuonghieu.id_TH','=','thuonghieu.ten_TH')
        ->orderby('donxuat.id_DX','desc')->get();
        $manager_delivery=view('admin.donxuat.danhsachdonxuat')->with('all_delivery',$hh); //goi lai theo ten file da tao, $all_product ở ngoài sẽ đc gán vào all_product ở trong
        return view('welcome')->with('donxuat',$manager_delivery);

        // $kh = DB::table('hanghoa')->get();
        // $data = view('admin.hanghoa.danhsachhanghoa')->with('DShanghoa',$kh);
        // return view('welcome')->with('hanghoa',$data);
    }
    // public function delivery_list()
    // {
    //     //$this->CheckLogin();
    //     $delivery_list=DB::table('donxuat')->where('trangthai_DX','1')->get();
    //     $manager_delivery=view('admin.donxuat.danhsachdonxuat')->with('danhsachdonxuat',$delivery_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
    //     return view('welcome')->with('admin.donxuat.danhsachdonxuat',$manager_delivery);// cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    // }
    public function delivery_list()
    {
        // $this->CheckLogin();
        // $product_list=DB::table('hanghoa')->where('trangthai_HH','1')->get();
        // $manager_product=view('admin.hanghoa.danhsachhanghoa')->with('danhsachhanghoa',$product_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        // return view('welcome')->with('admin.hanghoa.danhsachhanghoa',$manager_product); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product

        $hh = DB::table('donxuat')
        ->join('nhanvien','nhanvien.id_NV','=','donxuat.id_NV')
        ->join('khachhang','khachhangn.id_KH','=','donxuat.id_KH')
        ->join('loaihanghoa','loaihanghoa.id_LHH','=','donxuat.loai_HH')
        ->join('thuonghieu','thuonghieu.id_TH','=','donxuat.id_TH')
        ->orderby('donxuat.id_DX','desc')->where('trangthai_DX','1')->get();
        $manager_delivery=view('admin.donxuat.danhsachdonxuat')->with('danhsachdonxuat',$hh); //goi lai theo ten file da tao, $all_product ở ngoài sẽ đc gán vào all_product ở trong
        return view('welcome')->with('hanghoa',$manager_delivery);
    }
    //xóa lun
    public function delete_delivery($id_DX)
    {
        DB::table('donxuat')->where('id_DX',$id_DX)->delete();
        Session::put('message','XÓA khách hàng thành công rồi nha');
        return Redirect::to('/DS-donxuatdaxoa');
    }
    ///ẩn
    public function unactive_delivery($id_DX) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('donxuat')->where('id_DX',$id_DX)->update(['trangthai_DX'=>0]);
        Session::put('message','Xóa thành công');
        return Redirect::to('/DS-donxuat');
    }

    ///khôi phục
    public function active_delivery($id_DX) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('donxuat')->where('id_DX',$id_DX)->update(['trangthai_DX'=>1]);
        Session::put('message','khôi phục thành công');
        return Redirect::to('/DS-donxuat');
    }

    //danh sách thương hiệu đã xóa
    public function delivery_list_delete()
    {
        //$this->CheckLogin();
        $delivery_list=DB::table('donxuat')->where('trangthai_DX','0')->get();
        $manager_delivery=view('admin.donxuat.danhsachDXdaxoa')->with('danhsachkhachhangdaxoa',$delivery_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.donxuat.danhsachDXdaxoa',$manager_delivery); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
}

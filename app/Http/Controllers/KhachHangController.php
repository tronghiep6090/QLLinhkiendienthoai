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
    public function customer_add()
    {
        
        return view('admin.khachhang.themkhachhang');
    }
    public function save_customer(Request $request)
    {
        $data = array();
        $data['ten_KH']= $request->ten_KH;
        $data['e_mail']= $request->e_mail;
        $data['dien_thoai']= $request->dien_thoai;
        $data['dia_chi']= $request->dia_chi;
        $data['trangthai_KH']=1;
        DB::table('khachhang')->insert($data);
        Session::put('message','Thêm KH Thành công !');

        return redirect::to('/them-khachhang');
    }

    // public function DS_khachhang()
    // {
    //     $kh = DB::table('khachhang')->get();
    //     $data = view('danhsachkhachhang')->with('room',$kh);
    //     return view('welcome')->with('danhsachkhachhang',$data);
    // }
    public function customer_list()
    {
        //$this->CheckLogin();
        $customer_list=DB::table('khachhang')->where('trangthai_KH','1')->get();
        $manager_customer=view('admin.khachhang.danhsachkhachhang')->with('danhsachkhachhang',$customer_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.khachhang.danhsachkhachhang',$manager_customer);// cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    //edit
    public function edit_customer($id_KH)
    {
        //$this->CheckLogin();
        $edit_customer=DB::table('khachhang')->where('id_KH',$id_KH)->get();
        $manager_customer=view('admin.khachhang.suakhachhang')->with('suakhachhang',$edit_customer); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.khachhang.suakhachhang',$manager_customer); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    public function update_customer(Request $request, $id_KH)
    {
        $data = array();
        $data['ten_KH']= $request->ten_KH;
        $data['e_mail']= $request->e_mail;
        $data['dien_thoai']= $request->dien_thoai;
        $data['dia_chi']= $request->dia_chi;

        DB::table('khachhang')->where('id_KH',$id_KH)->update($data);
        Session::put('message','Sửa KH Thành công !');
       
        return redirect::to('/DS-khachhang');
    }
    //xóa lun
    public function delete_customer($id_KH)
    {
        DB::table('khachhang')->where('id_KH',$id_KH)->delete();
        Session::put('message','XÓA khách hàng thành công rồi nha');
        return Redirect::to('/DS-khachhangdaxoa');
    }
    ///ẩn
    public function unactive_customer($id_KH) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('khachhang')->where('id_KH',$id_KH)->update(['trangthai_KH'=>0]);
        Session::put('message','Xóa thành công');
        return Redirect::to('/DS-khachhang');
    }

    ///khôi phục
    public function active_customer($id_KH) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('khachhang')->where('id_KH',$id_KH)->update(['trangthai_KH'=>1]);
        Session::put('message','khôi phục thành công');
        return Redirect::to('/DS-khachhang');
    }

    //danh sách thương hiệu đã xóa
    public function customer_list_delete()
    {
        //$this->CheckLogin();
        $customer_list=DB::table('khachhang')->where('trangthai_KH','0')->get();
        $manager_customer=view('admin.khachhang.danhsachKHdaxoa')->with('danhsachkhachhangdaxoa',$customer_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.khachhang.danhsachKHdaxoa',$manager_customer); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
}

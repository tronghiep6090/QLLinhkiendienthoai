<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Facade\FlareClient\View;

class NhanVienController extends Controller
{
    //
    public function staff_add()
    {
        
        return view('admin.nhanvien.themnhanvien');
    }
    public function save_staff(Request $request)
    {
        $data = array();
        $data['ten_NV']= $request->ten_NV;
        $data['dien_thoai']= $request->dien_thoai;
        $data['e_mail']= $request->e_mail;
        
        $data['dia_chi']= $request->dia_chi;
        $data['tai_khoan']= $request->tai_khoan;
        $data['mat_khau']= $request->mat_khau;
        $data['trang_thai']=1;
        DB::table('nhanvien')->insert($data);
        Session::put('message','Thêm NV Thành công !');

        return redirect::to('/them-nhanvien');
    }

    public function staff_list()
    {
        //$this->CheckLogin();
        $staff_list=DB::table('nhanvien')->where('trang_thai','1')->get();
        $manager_staff=view('admin.nhanvien.danhsachnhanvien')->with('danhsachnhanvien',$staff_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.nhanvien.danhsachnhanvien',$manager_staff); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    //edit
    public function edit_staff($id_NV)
    {
        //$this->CheckLogin();
        $edit_staff=DB::table('nhanvien')->where('id_NV',$id_NV)->get();
        $manager_staff=view('admin.nhanvien.suanhanvien')->with('suanhanvien',$edit_staff); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.nhanvien.suanhanvien',$manager_staff); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    public function update_staff(Request $request, $id_NV)
    {
        $data = array();
        $data['ten_NV']= $request->ten_NV;
        $data['dien_thoai']= $request->dien_thoai;
        $data['e_mail']= $request->e_mail;
        $data['dia_chi']= $request->dia_chi;
        $data['tai_khoan']= $request->tai_khoan;
        $data['mat_khau']= $request->mat_khau;

        DB::table('nhanvien')->where('id_NV',$id_NV)->update($data);
        Session::put('message','Sửa NCC Thành công !');
       
        return redirect::to('/DS-nhanvien');
    }
    //xóa lun
    public function delete_staff($id_NV)
    {
        DB::table('nhanvien')->where('id_NV',$id_NV)->delete();
        Session::put('message','XÓA nhà cung cấp sản phẩm thành công rồi nha');
        return Redirect::to('/DS-nhaviendaxoa');
    }
    ///ẩn
    public function unactive_staff($id_NV) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('nhanvien')->where('id_NV',$id_NV)->update(['trang_thai'=>0]);
        Session::put('message','Xóa thành công');
        return Redirect::to('/DS-nhanvien');
    }

    ///khôi phục
    public function active_staff($id_NV) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('nhanvien')->where('id_NV',$id_NV)->update(['trang_thai'=>1]);
        Session::put('message','khôi phục thành công');
        return Redirect::to('/DS-nhanvien');
    }

    //danh sách thương hiệu đã xóa
    public function staff_list_delete()
    {
        //$this->CheckLogin();
        $staff_list=DB::table('nhanvien')->where('trang_thai','0')->get();
        $manager_staff=view('admin.nhanvien.danhsachnhanviendaxoa')->with('danhsachnhanviendaxoa',$staff_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.nhanvien.danhsachnhanviendaxoa',$manager_staff); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
}

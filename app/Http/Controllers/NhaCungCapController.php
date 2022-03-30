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
    public function manufacture_add()
    {
        
        return view('admin.nhacungcap.themnhacungcap');
    }
    public function save_manufacture(Request $request)
    {
        $data = array();
        $data['ten_NCC']= $request->ten_NCC;
        $data['e_mail']= $request->e_mail;
        $data['dien_thoai']= $request->dien_thoai;
        $data['dia_chi']= $request->dia_chi;
        $data['trangthai_NCC']=1;
        DB::table('nhacungcap')->insert($data);
        Session::put('message','Thêm NCC Thành công !');

        return redirect::to('/them-nhacungcap');
    }

    public function manufacture_list()
    {
        //$this->CheckLogin();
        $manufacture_list=DB::table('nhacungcap')->where('trangthai_NCC','1')->get();
        $manager_manufacture=view('admin.nhacungcap.danhsachnhacungcap')->with('danhsachnhacungcap',$manufacture_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.nhacungcap.danhsachnhacungcap',$manager_manufacture); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    //edit
    public function edit_manufacture($id_NCC)
    {
        //$this->CheckLogin();
        $edit_manufacture=DB::table('nhacungcap')->where('id_NCC',$id_NCC)->get();
        $manager_manufacture=view('admin.nhacungcap.suanhacungcap')->with('suanhacungcap',$edit_manufacture); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.nhacungcap.suanhacungcap',$manager_manufacture); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    public function update_manufacture(Request $request, $id_NCC)
    {
        $data = array();
        $data['ten_NCC']= $request->ten_NCC;
        $data['e_mail']= $request->e_mail;
        $data['dien_thoai']= $request->dien_thoai;
        $data['dia_chi']= $request->dia_chi;

        DB::table('nhacungcap')->where('id_NCC',$id_NCC)->update($data);
        Session::put('message','Sửa NCC Thành công !');
       
        return redirect::to('/DS-nhacungcap');
    }
    //xóa lun
    public function delete_manufacture($id_NCC)
    {
        DB::table('nhacungcap')->where('id_NCC',$id_NCC)->delete();
        Session::put('message','XÓA nhà cung cấp sản phẩm thành công rồi nha');
        return Redirect::to('/DS-nhacungcapdaxoa');
    }
    ///ẩn
    public function unactive_manufacture($id_NCC) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('nhacungcap')->where('id_NCC',$id_NCC)->update(['trangthai_NCC'=>0]);
        Session::put('message','Xóa thành công');
        return Redirect::to('/DS-nhacungcap');
    }

    ///khôi phục
    public function active_manufacture($id_NCC) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('nhacungcap')->where('id_NCC',$id_NCC)->update(['trangthai_NCC'=>1]);
        Session::put('message','khôi phục thành công');
        return Redirect::to('/DS-nhacungcap');
    }

    //danh sách thương hiệu đã xóa
    public function manufacture_list_delete()
    {
        //$this->CheckLogin();
        $manufacture_list=DB::table('nhacungcap')->where('trangthai_NCC','0')->get();
        $manager_manufacture=view('admin.nhacungcap.danhsachNCCdaxoa')->with('danhsachnhacungcapdaxoa',$manufacture_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.nhacungcap.danhsachNCCdaxoa',$manager_manufacture); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
}

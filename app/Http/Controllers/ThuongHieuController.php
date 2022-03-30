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
    public function brand_add()
    {
        
        return view('admin.thuonghieu.themthuonghieu');
    }
    public function save_brand(Request $request)
    {
        $data = array();
        $data['ten_TH']= $request->ten_TH;
        $data['mota_TH']= $request->mota_TH;
        $data['trangthai_TH']=1;
        DB::table('thuonghieu')->insert($data);
        Session::put('message','Thêm TH Thành công !');

        return redirect::to('/them-thuonghieu');
        //return view('admin.thuonghieu.themthuonghieu');
    }
    // public function DS_thuonghieu()
    // {
    //     $kh = DB::table('thuonghieu')->where('trangthai_TH','1')->get();
    //     $data = view('admin.thuonghieu.danhsachthuonghieu')->with('DSthuonghieu',$kh);
    //     return view('welcome')->with('thuonghieu',$data);
    // }
    public function brand_list()
    {
        //$this->CheckLogin();
        $brand_list=DB::table('thuonghieu')->where('trangthai_TH','1')->get();
        $manager_brand=view('admin.thuonghieu.danhsachthuonghieu')->with('danhsachthuonghieu',$brand_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.thuonghieu.danhsachthuonghieu',$manager_brand); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    //edit
    public function edit_brand($id_TH)
    {
        //$this->CheckLogin();
        $edit_brand=DB::table('thuonghieu')->where('id_TH',$id_TH)->get();
        $manager_brand_product=view('admin.thuonghieu.suathuonghieu')->with('suathuonghieu',$edit_brand); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.thuonghieu.suathuonghieu',$manager_brand_product); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    public function update_brand(Request $request, $id_TH)
    {
        $data = array();
        $data['ten_TH']= $request->ten_TH;
        $data['mota_TH']= $request->mota_TH;

        DB::table('thuonghieu')->where('id_TH',$id_TH)->update($data);
        Session::put('message','Sửa TH Thành công !');
       
        return redirect::to('/DS-thuonghieu');
    }
    //xóa lun
    public function delete_brand($id_TH)
    {
        DB::table('thuonghieu')->where('id_TH',$id_TH)->delete();
        Session::put('message','XÓA thương hiệu sản phẩm thành công rồi nha');
        return Redirect::to('/DS-thuonghieudaxoa');
    }
    ///ẩn
    public function unactive_brand($id_TH) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('thuonghieu')->where('id_TH',$id_TH)->update(['trangthai_TH'=>0]);
        Session::put('message','Xóa thành công');
        return Redirect::to('/DS-thuonghieu');
    }

    ///khôi phục
    public function active_brand($id_TH) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('thuonghieu')->where('id_TH',$id_TH)->update(['trangthai_TH'=>1]);
        Session::put('message','khôi phục thành công');
        return Redirect::to('/DS-thuonghieu');
    }

    //danh sách thương hiệu đã xóa
    public function brand_list_delete()
    {
        //$this->CheckLogin();
        $brand_list=DB::table('thuonghieu')->where('trangthai_TH','0')->get();
        $manager_brand=view('admin.thuonghieu.danhsachTHdaxoa')->with('danhsachthuonghieudaxoa',$brand_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.thuonghieu.danhsachTHdaxoa',$manager_brand); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Facade\FlareClient\View;

class DonViController extends Controller
{
    public function unit_add()
    {
        
        return view('admin.donvitinh.themdonvitinh');
    }
    public function save_unit(Request $request)
    {
        $data = array();
        $data['don_vi']= $request->don_vi;
        $data['trangthai_DVT']=1;
        DB::table('donvitinh')->insert($data);
        Session::put('message','Thêm TH Thành công !');

        return redirect::to('/them-donvitinh');
        //return view('admin.thuonghieu.themthuonghieu');
    }
    // public function DS_thuonghieu()
    // {
    //     $kh = DB::table('thuonghieu')->where('trangthai_TH','1')->get();
    //     $data = view('admin.thuonghieu.danhsachthuonghieu')->with('DSthuonghieu',$kh);
    //     return view('welcome')->with('thuonghieu',$data);
    // }
    public function unit_list()
    {
        //$this->CheckLogin();
        $unit_list=DB::table('donvitinh')->where('trangthai_DVT','1')->get();
        $manager_unit=view('admin.donvitinh.danhsachdonvitinh')->with('danhsachdonvitinh',$unit_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.donvitinh.danhsachdonvitinh',$manager_unit); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    //edit
    public function edit_unit($id_DVT)
    {
        //$this->CheckLogin();
        $edit_unit=DB::table('donvitinh')->where('id_DVT',$id_DVT)->get();
        $manager_unit=view('admin.donvitinh.suadonvitinh')->with('suadonvitinh',$edit_unit); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.donvitinh.suadonvitinh',$manager_unit); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    public function update_unit(Request $request, $id_DVT)
    {
        $data = array();
        $data['ten_DVT']= $request->don_vi;

        DB::table('donvitinh')->where('id_DVT',$id_DVT)->update($data);
        Session::put('message','Sửa TH Thành công !');
       
        return redirect::to('/DS-donvitinh');
    }
    //xóa lun
    public function delete_unit($id_DVT)
    {
        DB::table('donvitinh')->where('id_DVT',$id_DVT)->delete();
        Session::put('message','XÓA thương hiệu sản phẩm thành công rồi nha');
        return Redirect::to('/DS-donvitinhdaxoa');
    }
    ///ẩn
    public function unactive_unit($id_DVT) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('donvitinh')->where('id_DVT',$id_DVT)->update(['trangthai_DVT'=>0]);
        Session::put('message','Xóa thành công');
        return Redirect::to('/DS-donvitinh');
    }

    ///khôi phục
    public function active_unit($id_DVT) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('donvitinh')->where('id_DVT',$id_DVT)->update(['trangthai_DVT'=>1]);
        Session::put('message','khôi phục thành công');
        return Redirect::to('/DS-donvitinh');
    }

    //danh sách thương hiệu đã xóa
    public function unit_list_delete()
    {
        //$this->CheckLogin();
        $unit_list=DB::table('donvitinh')->where('trangthai_DVT','0')->get();
        $manager_unit=view('admin.donvitinh.danhsachDVTdaxoa')->with('danhsachdonvitinhdaxoa',$unit_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.donvitinh.danhsachDVTdaxoa',$manager_unit); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    //danh sách sản phẩm thuộc TH
    // public function list_product_product_typee($id_TH)
    // {
    // //$this->CheckLogin();
    // // $list_product_product_type=DB::table('loaihanghoa')->where('id_LHH',$id_LHH)->get();
    // // $manager_product_type=view('admin.loaihanghoa.sualoaihanghoa')->with('sualoaihanghoa',$edit_product_type); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
    // // return view('welcome')->with('admin.loaihanghoa.sualoaihanghoa',$manager_product_type); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    // $name_product_type =DB::table('hanghoa')
    
    // ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.loai_HH')
    // ->join('thuonghieu','thuonghieu.id_TH','=','hanghoa.id_TH')
    // ->orderby('hanghoa.id_HH','desc')->where('trangthai_HH','1')->where('thuonghieu.id_TH',$id_TH)->limit(1)->get();
    
    // $count_product_product_type = DB::table('hanghoa')
    
    // ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.loai_HH')
    // ->join('thuonghieu','thuonghieu.id_TH','=','hanghoa.id_TH')
    // ->orderby('hanghoa.id_HH','desc')->where('trangthai_HH','1')->where('thuonghieu.id_TH',$id_TH)->get()->count();
   

    // $list_product_product_typee = DB::table('hanghoa')
    
    // ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.loai_HH')
    // ->join('thuonghieu','thuonghieu.id_TH','=','hanghoa.id_TH')
    // ->orderby('hanghoa.id_HH','desc')->where('trangthai_HH','1')->where('thuonghieu.id_TH',$id_TH)->get();
    // // $manager_product=view('admin.loaihanghoa.productlist')->with('list_product_product_type',$list_product_product_type)->with('name_product_type',$name_product_type); //goi lai theo ten file da tao, $all_product ở ngoài sẽ đc gán vào all_product ở trong
    // // return view('welcome')->with('admin.loaihanghoa.productlist',$manager_product)->with('name_product_type',$name_product_type);
    // return view('admin.thuonghieu.brandlist')
    //         ->with('name_product_type',$name_product_type)
    //         ->with('list_product_product_typee',$list_product_product_typee)
    //         ->with('count_product_product_type',$count_product_product_type);
    // }    
}

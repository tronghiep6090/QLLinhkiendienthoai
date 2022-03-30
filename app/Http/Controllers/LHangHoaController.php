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
    public function product_type_add()
    {
        return view('admin.loaihanghoa.themloaihanghoa');
    }
    public function save_product_type(Request $request)
    {
        $data = array();
        $data['ten_LHH']= $request->ten_LHH;
        $data['mota_LHH']= $request->mota_LHH;

        DB::table('loaihanghoa')->insert($data);
        Session::put('message','Thêm LHH Thành công !');

        return redirect::to('/them-loaihanghoa');
        //return view('admin.thuonghieu.themthuonghieu');
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
        $product_type_list=DB::table('loaihanghoa')->where('trangthai_LHH',1)->get();
        $manager_producttype=view('admin.loaihanghoa.danhsachloaihanghoa')->with('danhsachloaihanghoa',$product_type_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.loaihanghoa.danhsachloaihanghoa',$manager_producttype); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    //edit
    public function edit_product_type($id_LHH)
    {
        //$this->CheckLogin();
        $edit_product_type=DB::table('loaihanghoa')->where('id_LHH',$id_LHH)->get();
        $manager_product_type=view('admin.loaihanghoa.sualoaihanghoa')->with('sualoaihanghoa',$edit_product_type); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.loaihanghoa.sualoaihanghoa',$manager_product_type); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    public function update_product_type(Request $request, $id_LHH)
    {
        $data = array();
        $data['ten_LHH']= $request->ten_LHH;
        $data['mota_LHH']= $request->mota_LHH;

        DB::table('loaihanghoa')->where('id_LHH',$id_LHH)->update($data);
        Session::put('message','Sửa LHH Thành công !');
    
        return redirect::to('/DS-loaihanghoa');
    }
    //xóa lun
    public function delete_product_type($id_LHH)
    {
        DB::table('loaihanghoa')->where('id_LHH',$id_LHH)->delete();
        Session::put('message','XÓA loại sản phẩm thành công rồi nha');
        return Redirect::to('/DS-loaihanghoadaxoa');
    }
    ///ẩn
    public function unactive_product_type($id_LHH) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('loaihanghoa')->where('id_LHH',$id_LHH)->update(['trangthai_LHH'=>0]);
        Session::put('message','Xóa thành công');
        return Redirect::to('/DS-loaihanghoa');
    }

    //danh sách thương hiệu đã xóa
    public function product_type_list_delete()
    {
        //$this->CheckLogin();
        $product_type_list=DB::table('loaihanghoa')->where('trangthai_LHH','0')->get();
        $manager_product_type=view('admin.loaihanghoa.danhsachLHHdaxoa')->with('danhsachLHHdaxoa',$product_type_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.loaihanghoa.danhsachLHHdaxoa',$manager_product_type); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }

    ///khôi phục
    public function active_product_type($id_LHH) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('loaihanghoa')->where('id_LHH',$id_LHH)->update(['trangthai_LHH'=>1]);
        Session::put('message','khôi phục thành công');
        return Redirect::to('/DS-loaihanghoa');
    }
    //danh sách sản phẩm thuộc LHH
    public function list_product_product_type($id_LHH)
    {
        //$this->CheckLogin();
        // $list_product_product_type=DB::table('loaihanghoa')->where('id_LHH',$id_LHH)->get();
        // $manager_product_type=view('admin.loaihanghoa.sualoaihanghoa')->with('sualoaihanghoa',$edit_product_type); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        // return view('welcome')->with('admin.loaihanghoa.sualoaihanghoa',$manager_product_type); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
        $name_product_type =DB::table('hanghoa')
        ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.loai_HH')
        ->join('thuonghieu','thuonghieu.id_TH','=','hanghoa.id_TH')
        ->orderby('hanghoa.id_HH','desc')->where('trangthai_HH','1')->where('id_LHH',$id_LHH)->limit(1)->get();
        
        $count_product_product_type = DB::table('hanghoa')
        ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.loai_HH')
        ->join('thuonghieu','thuonghieu.id_TH','=','hanghoa.id_TH')
        ->orderby('hanghoa.id_HH','desc')->where('trangthai_HH','1')->where('id_LHH',$id_LHH)->get()->count();
       

        $list_product_product_type = DB::table('hanghoa')
        ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.loai_HH')
        ->join('thuonghieu','thuonghieu.id_TH','=','hanghoa.id_TH')
        ->orderby('hanghoa.id_HH','desc')->where('trangthai_HH','1')->where('id_LHH',$id_LHH)->get();
        // $manager_product=view('admin.loaihanghoa.productlist')->with('list_product_product_type',$list_product_product_type)->with('name_product_type',$name_product_type); //goi lai theo ten file da tao, $all_product ở ngoài sẽ đc gán vào all_product ở trong
        // return view('welcome')->with('admin.loaihanghoa.productlist',$manager_product)->with('name_product_type',$name_product_type);
        return view('admin.loaihanghoa.productlist')
                ->with('name_product_type',$name_product_type)
                ->with('list_product_product_type',$list_product_product_type)
                ->with('count_product_product_type',$count_product_product_type);
    } 
}

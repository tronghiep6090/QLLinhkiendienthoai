<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Facade\FlareClient\View;

class PhieuMuaHangController extends Controller
{
    public function vouchers_add()
    {
        $hanghoa = DB::table('hanghoa')->orderby('id_HH','desc')->get();
        return view('admin.phieumuahang.themphieumuahang')->with('hanghoa',$hanghoa);
    }
    public function save_vouchers(Request $request)
    {
        $data = array();
        $data['ngay_lap']= $request->ngay_lap;
        $data['id_HH']= $request->ten_HH;
        $data['so_luong']= $request->so_luong;
        $data['trangthai_PMH']=1;
        

        DB::table('phieumuahang')->insert($data);
        Session::put('message','Thêm PMH Thành công !');

        return redirect::to('/them-phieumuahang');
        //return view('admin.thuonghieu.themthuonghieu');
    }
    public function DS_phieumuahang()
    {
        $hh = DB::table('phieumuahang')
        ->join('hanghoa','hanghoa.id_HH','=','phieumuahang.id_HH')
        ->orderby('phieumuahang.id_PMH','desc')->get();
        $manager_vouchers=view('admin.phieumuahang.danhsachphieumuahang')->with('all_vouchers',$hh); //goi lai theo ten file da tao, $all_product ở ngoài sẽ đc gán vào all_product ở trong
        return view('welcome')->with('phieumuahang',$manager_vouchers);
    }
    public function vouchers_list()
    {
        $hh = DB::table('phieumuahang')
        ->join('hanghoa','hanghoa.id_HH','=','phieumuahang.id_HH')
        ->orderby('phieumuahang.id_PMH','desc')->where('trangthai_PMH',1)->get();
        $manager_vouchers=view('admin.phieumuahang.danhsachphieumuahang')->with('danhsachphieumuahang',$hh); //goi lai theo ten file da tao, $all_product ở ngoài sẽ đc gán vào all_product ở trong
        return view('welcome')->with('danhsachphieumuahang',$manager_vouchers);
        // $vouchers_list=DB::table('phieumuahang')->where('trangthai_PMH','1')->get();
        // $manager_vouchers=view('admin.phieumuahang.danhsachphieumuahang')->with('danhsachphieumuahang',$vouchers_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        // return view('welcome')->with('admin.phieumuahang.danhsachphieumuahang',$manager_vouchers); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    public function add_vouchers()
    {
        //$this->CheckLogin();
        $hanghoa = DB::table('hanghoa')->orderby('ten_HH','desc')->get();
        return view('admin.phieumuahang.themphieumuahang')->with('hanghoa',$hanghoa);
    }

    //edit
    public function edit_vouchers($id_PMH)
    {
        $hanghoa = DB::table('hanghoa')->orderby('ten_HH','desc')->get();
       
        //$this->CheckLogin();
        $edit_vouchers=DB::table('phieumuahang')->where('id_PMH',$id_PMH)->get();
        $manager_vouchers=view('admin.phieumuahang.suaphieumuahang')->with('suaphieumuahang',$edit_vouchers)->with('hanghoa',$hanghoa); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.phieumuahang.suaphieumuahang',$manager_vouchers); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    public function update_vouchers(Request $request, $id_PMH)
    {
        $data = array();
        $data['ngay_lap']= $request->ngay_lap;
        $data['id_HH']= $request->ten_HH;
        $data['so_luong']= $request->so_luong;

        DB::table('phieumuahang')->where('id_PMH',$id_PMH)->update($data);
        Session::put('message','Sửa PMH Thành công !');
       
        return redirect::to('/DS-phieumuahang');
    }
    //xóa lun
    public function delete_vouchers($id_PMH)
    {
        DB::table('phieumuahang')->where('id_PMH',$id_PMH)->delete();
        Session::put('message','XÓA sản phẩm thành công rồi nha');
        return Redirect::to('/DS-phieumuahangdaxoa');
    }
    ///ẩn
    public function unactive_vouchers($id_PMH) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('phieumuahang')->where('id_PMH',$id_PMH)->update(['trangthai_PMH'=>0]);
        Session::put('message','Xóa thành công');
        return Redirect::to('/DS-phieumuahang');
    }
    //khôi phục
    public function active_vouchers($id_PMH) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('phieumuahang')->where('id_PMH',$id_PMH)->update(['trangthai_PMH'=>1]);
        Session::put('message','khôi phục thành công');
        return Redirect::to('/DS-phieumuahang');
    }

    //danh sách thương hiệu đã xóa
    public function vouchers_list_delete()
    {
        //$this->CheckLogin();
        $vouchers_list=DB::table('phieumuahang')->where('trangthai_PMH','0')->get();
        $manager_vouchers=view('admin.phieumuahang.danhsachPMHdaxoa')->with('danhsachphieumuahangdaxoa',$vouchers_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.phieumuahang.danhsachPMHdaxoa',$manager_vouchers); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
}

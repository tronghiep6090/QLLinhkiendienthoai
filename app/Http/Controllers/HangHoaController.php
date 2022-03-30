<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use Facade\FlareClient\View;

class HangHoaController extends Controller
{
    public function CheckLogin()
    {
        $admin_id=Session::get('id');
        if($admin_id){
            return Redirect::to('welcome');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function product_add()
    {
        $loaihanghoa = DB::table('loaihanghoa')->orderby('id_LHH','desc')->get();
        $thuonghieu = DB::table('thuonghieu')->orderby('id_TH','desc')->get();
        return view('admin.hanghoa.themhanghoa')->with('loaihanghoa',$loaihanghoa)-> with('thuonghieu',$thuonghieu);
    }
    public function save_product(Request $request)
    {
        $data = array();
        $data['ten_HH']= $request->ten_HH;
        $data['so_luong']= $request->so_luong;
        $data['mo_ta']= $request->mo_ta;
        $data['loai_HH']= $request->loai_HH;
        $data['id_TH']= $request->id_TH;
        $data['gia_HH']= $request->gia_HH;
        $data['trangthai_HH']=1;

        $get_image=$request->file('hinh_anh');
        
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi mở rộng
            $get_image->move('public/frontend/vendors/images/product',$new_image); //dư cái public nè, nó tự động gọi đến public r nên để v là dư nó sẽ tự tạo thêm 1 folder public nữa
            $data['hinh_anh'] = $new_image;
            DB::table('hanghoa')->insert($data);

            Session::put('message','Thêm sản phẩm thành công !!');
            return Redirect::to('/them-hanghoa');
        }

        DB::table('hanghoa')->insert($data);
        Session::put('message','Sửa HH Thành công !');
       
        return redirect::to('/DS-hanghoa');
    }

    public function DS_hanghoa()
    {
        $hh = DB::table('hanghoa')
        ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.loai_HH')
        ->join('thuonghieu','thuonghieu.id_TH','=','thuonghieu.ten_TH')
        ->orderby('hanghoa.id_HH','desc')->get();
        $manager_product=view('admin.hanghoa.danhsachhanghoa')->with('all_product',$hh); //goi lai theo ten file da tao, $all_product ở ngoài sẽ đc gán vào all_product ở trong
        return view('welcome')->with('hanghoa',$manager_product);

        // $kh = DB::table('hanghoa')->get();
        // $data = view('admin.hanghoa.danhsachhanghoa')->with('DShanghoa',$kh);
        // return view('welcome')->with('hanghoa',$data);
    }
    public function product_list()
    {
        // $this->CheckLogin();
        // $product_list=DB::table('hanghoa')->where('trangthai_HH','1')->get();
        // $manager_product=view('admin.hanghoa.danhsachhanghoa')->with('danhsachhanghoa',$product_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        // return view('welcome')->with('admin.hanghoa.danhsachhanghoa',$manager_product); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product

        $hh = DB::table('hanghoa')
        ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.loai_HH')
        ->join('thuonghieu','thuonghieu.id_TH','=','hanghoa.id_TH')
        ->orderby('hanghoa.id_HH','desc')->where('trangthai_HH','1')->get();
        $manager_product=view('admin.hanghoa.danhsachhanghoa')->with('danhsachhanghoa',$hh); //goi lai theo ten file da tao, $all_product ở ngoài sẽ đc gán vào all_product ở trong
        return view('welcome')->with('hanghoa',$manager_product);
    }
    public function add_product()
    {
        //$this->CheckLogin();
        $loaihanghoa = DB::table('loaihanghoa')->orderby('id_LHH','desc')->get();
        $thuonghieu = DB::table('thuonghieu')->orderby('id_TH','desc')->get();
        return view('admin.hanghoa.themhanghoa')->with('loaihanghoa',$loaihanghoa)-> with('thuonghieu',$thuonghieu);
    }

    //edit
    public function edit_product($id_HH)
    {
        $loaihanghoa = DB::table('loaihanghoa')->orderby('id_LHH','desc')->get();
        $thuonghieu = DB::table('thuonghieu')->orderby('id_TH','desc')->get();
       
        //$this->CheckLogin();
        $edit_product=DB::table('hanghoa')->where('id_HH',$id_HH)->get();
        $manager_product=view('admin.hanghoa.suahanghoa')->with('suahanghoa',$edit_product)->with('loaihanghoa',$loaihanghoa)-> with('thuonghieu',$thuonghieu); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.hanghoa.suahanghoa',$manager_product); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }
    public function update_product(Request $request, $id_HH)
    {
        $data = array();
        $data['ten_HH']= $request->ten_HH;
        $data['so_luong']= $request->so_luong;
        $data['mo_ta']= $request->mo_ta;
        $data['loai_HH']= $request->loai_HH;
        $data['id_TH']= $request->id_TH;
        $data['gia_HH']= $request->gia_HH;
        $data['trangthai_HH']=1;

        $get_image=$request->file('hinh_anh');
        
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi mở rộng
            $get_image->move('public/frontend/vendors/images/product',$new_image); //dư cái public nè, nó tự động gọi đến public r nên để v là dư nó sẽ tự tạo thêm 1 folder public nữa
            $data['hinh_anh'] = $new_image;
            DB::table('hanghoa')->where('id_HH',$id_HH)->update($data);

            Session::put('message','Thêm sản phẩm thành công !!');
            return Redirect::to('/them-hanghoa');
        }

        DB::table('hanghoa')->where('id_HH',$id_HH)->update($data);
        Session::put('message','Sửa HH Thành công !');
       
        return redirect::to('/DS-hanghoa');
    }
    //xóa lun
    public function delete_product($id_HH)
    {
        DB::table('hanghoa')->where('id_HH',$id_HH)->delete();
        Session::put('message','XÓA sản phẩm thành công rồi nha');
        return Redirect::to('/DS-hanghoadaxoa');
    }
    ///ẩn
    public function unactive_product($id_HH) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('hanghoa')->where('id_HH',$id_HH)->update(['trangthai_HH'=>0]);
        Session::put('message','Xóa thành công');
        return Redirect::to('/DS-hanghoa');
    }
    //khôi phục
    public function active_product($id_HH) //giống với cái tên bên web.php đặt á $brand_product_id
    {
        DB::table('hanghoa')->where('id_HH',$id_HH)->update(['trangthai_HH'=>1]);
        Session::put('message','khôi phục thành công');
        return Redirect::to('/DS-hanghoa');
    }

    //danh sách thương hiệu đã xóa
    public function product_list_delete()
    {
        //$this->CheckLogin();
        $product_list=DB::table('hanghoa')->where('trangthai_HH','0')->get();
        $manager_product=view('admin.hanghoa.danhsachHHdaxoa')->with('danhsachhanghoadaxoa',$product_list); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.hanghoa.danhsachHHdaxoa',$manager_product); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    }

    //chi tiết hàng hóa
    public function view_product($id_HH)
    {
        // $view_product=DB::table('hanghoa')
        // ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.loai_HH')
        // ->join('thuonghieu','thuonghieu.id_TH','=','thuonghieu.id_TH')
        // ->orderby('hanghoa.loai_HH','desc')->get();

        // SELECT * 
        // FROM hanghoa  JOIN loaihanghoa ON loaihanghoa.id_LHH=hanghoa.loai_HH
        //             JOIN thuonghieu ON thuonghieu.id_TH=hanghoa.id_TH
        // WHERE hanghoa.id_HH=2
        $view_product = DB::table('hanghoa')
        ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.loai_HH')
        ->join('thuonghieu','thuonghieu.id_TH','=','hanghoa.id_TH')
        ->orderby('hanghoa.id_HH','desc')->where('trangthai_HH','1')->where('hanghoa.id_HH',$id_HH)->get();
        $manager_product=view('admin.hanghoa.chitiethanghoa')->with('chitiethanghoa',$view_product); //goi lai theo ten file da tao, $all_product ở ngoài sẽ đc gán vào all_product ở trong
       

        // $view_product=DB::table('hanghoa')
        // ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.loai_HH')
        // ->join('thuonghieu','thuonghieu.id_TH','=','hanghoa.id_TH')
        // ->where('hanghoa.id_HH',$id_HH)->get();
        // $manager_product=view('admin.hanghoa.chitiethanghoa')->with('chitiethanghoa',$view_product); //goi lai theo ten file da tao, $all_brand_product ở ngoài sẽ đc gán vào all_brand_product ở trong
        return view('welcome')->with('admin.hanghoa.chitiethanghoa',$manager_product); // cái trang admin_layout sẽ chứa brand_product lun được gán vào biến $manager_brand_product
    
    }
    // public function view_product($id_HH)
    // {
    //     $loaihanghoa = DB::table('loaihanghoa')->where('trangthai_LHH','0')->orderby('id_LHH','desc')->get();
    //     $thuonghieu = DB::table('thuonghieu')->where('trangthai_TH','0')->orderby('id_TH','desc')->get();
    //     $view_product=DB::table('hanghoa')
    //     ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.loai_HH')
    //     ->join('thuonghieu','thuonghieu.id_TH','=','hanghoa.id_TH')
    //     ->where('hanghoa.id_HH',$id_HH)->get();

    //     foreach($view_product as $key => $value)
    //     {
    //         $id_LHH = $value->id_LHH;
    //     }
    //     // $related_product = DB::table('hanghoa')
    //     // ->join('loaihanghoa','loaihanghoa.id_LHH','=','hanghoa.id_HH')
    //     // ->join('thuonghieu','thuonghieu.id_TH','=','hanghoa.id_TH')
    //     // ->where('loaihanghoa.id_LHH',$id_LHH)->whereNotIn('hanghoa.id_HH',[$id_HH])->get();

    //     return view('admin.hanghoa.chitiethanghoa') 
    //         -> with('loaihanghoa',$loaihanghoa)
    //         -> with('thuonghieu',$thuonghieu)
    //         -> with('view_product',$view_product);
    // }
}

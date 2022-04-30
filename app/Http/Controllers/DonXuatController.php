<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Export;
use App\Http\Requests\ExportRequest;
use App\Total;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use Facade\FlareClient\View;

class DonXuatController extends Controller
{
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

    
    }
    
    public function delivery_list()
    {
       

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

    public function update_brand($id_DX)
    {
       return "hello";
       
    }
}

// class DonXuatController extends Controller
// {
//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('auth');
//     }

//     public function index(){
//         $data = DB::table('donxuat')
//                     ->join('products', 'Exports.product_id', '=', 'products.id')
//                     ->select('Exports.*', 'products.name as productName', 'products.ma_product')
//                     ->orderBy('Exports.id','DESC')
//                     ->get()
//                     ->toArray();
//         return view('admin.donxuat.index',compact('data'));
//     }

//     public function addGet(){
//         $product = Product::select('id','ma_product')->orderBy('id','DESC')->get()->toArray();
//         return view('pages.export.add', compact('product'));
//     }

//     public function addPost(ExportRequest $request){
//         $export = new Export;
//         $export->quantity= $request->quantity;
//         $export->product_id = $request->product_id;
//         $export->save();
        
//         // Update or add totals table
//         $total = DB::table('totals')->where('product_id', $request->product_id)->first();
        
//         if(count($total) == 0){ // Insert new row
//             $total = new Total;
//             $total->exp_quantities = $request->quantity;
//             $total->imp_quantities = 0;
//             $total->product_id = $request->product_id;
//             $total->save();
//         }else{// Edit
//             $exp_quantities = $total->exp_quantities + $request->quantity;
            
//             DB::table('totals')
//             ->where('totals.product_id', $request->product_id)
//             ->update(['totals.exp_quantities' => $exp_quantities]);
//         }
        
//         return redirect('admin/exportList')->with(['flash-message'=> 'Bạn đã thêm xuất kho thành công','flash-type'=>'success']);
//     }
// }
//     public function editGet($id){
//         $data = DB::table('Exports')
//         ->join('products', 'Exports.product_id', '=', 'product_id')
//         ->select('Exports.*', 'products.name as productName', 'products.ma_product')
//         ->where('Exports.id', $id)
//         ->get()
//         ->toArray();
//         return view('pages.export.edit',compact('data'));
//     }

//     public function editPost(ExportRequest $request, $id){
//         $export = Export::find($id);
//         // Update exp_quantities totals table
//         $total = DB::table('totals')->where('product_id', $request->product_id)->first();
//         $exp_quantities = ($total->exp_quantities - $export->quantity) + $request->quantity;
        
//         DB::table('totals')
//             ->where('totals.product_id', $request->product_id)
//             ->update(['totals.exp_quantities' => $exp_quantities]);
        
//         $export->quantity = $request->quantity;
//         $export->save();
//         return redirect('admin/exportList')->with(['flash-message'=> 'Bạn đã sửa xuất kho thành công','flash-type'=>'success']);
//     }

//     public function expExportExcel(){
//         $ext = 'xls';//, xlsx, csv, pdf...
//         $fileName = 'QuanLyXuatKho_'.date('Y-m-d-H-i-s');
        
//         Excel::create($fileName, function($excel) {
//             $excel->sheet('All', function($sheet) {
//                 $data = DB::table('Exports')
//                 ->join('products', 'Exports.product_id', '=', 'products.id')
//                 ->select('Exports.*', 'products.name as productName', 'products.ma_product')
//                 ->orderBy('Exports.id','DESC')
//                 ->get()
//                 ->toArray();
//                 $sheet->loadView('pages.export.excel', ['data' => $data]);
//             });
//         })->download($ext);
//     }
    
//     public function deletePost(){
//         $id =  Input::get('id');
//         $export = Export::find($id);
//         $export->delete();

//         $msg = "OK";
//         return response()->json(array('msg'=> $msg), 200);
//     }
// }
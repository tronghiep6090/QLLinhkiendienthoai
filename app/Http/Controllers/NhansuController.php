<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Redirect;
session_start();

class NhansuController extends Controller
//Nhan vien
{
    public function them_nhan_vien()
    {
        $PB = DB::table('tbl_phongban')->orderBy('id_phongban','desc')->get();
        return view('themnhanvien')->with('ten_pb',$PB);
    }
    // public function DS_nhan_vien()
    // {
    //     return view('quanlynhanvien');
    // }
    public function add_nhan_vien(Request $request)
    {
        $data = array();
        $data['ma_nv'] = $request->ma_nv;
        $data['ho_nv'] = $request->ho_nv;
        $data['ten_nv'] = $request->ten_nv;
        $data['nam_sinh'] = $request->nam_sinh;
        $data['gioi_tinh'] = $request->gioi_tinh;
        $data['que_quan'] = $request->que_quan;
        $data['phong_ban'] = $request->phong_ban;
        $data['chuc_vu'] = $request->chuc_vu;
        $data['email'] = $request->email;
        $data['sdt'] = $request->sdt;

        DB::table('tbl_nhanvien')->insert($data);
        //Session::put('message','Đăng ký thành công');
        return Redirect::to('/them-nhan-vien');
    }
    public function DS_nhan_vien()
    {
        $nv = DB::table('tbl_nhanvien')->get();
        $data = view('quanlynhanvien')->with('room',$nv);
        return view('welcome')->with('quanlynhanvien',$data);

    }
    public function xoa_nhan_vien($xoa)
    {
        DB::table('tbl_nhanvien')->where('id_nhanvien', $xoa)->delete();
        return Redirect::to('/DS-nhan-vien');
    }
    public function sua_nhan_vien($id)
    {
        $edit = DB::table('tbl_nhanvien')->where('id_nhanvien', $id)->get();
        $sua = view('suanhanvien')->with('edit_nhanvien',$edit);
        return view('welcome')->with('suanhanvien',$sua);
    }
    public function edit_nhan_vien(Request $request, $load)
    {
        $data = array();
        $data['ma_nv'] = $request->ma_nv;
        $data['ho_nv'] = $request->ho_nv;
        $data['ten_nv'] = $request->ten_nv;
        $data['nam_sinh'] = $request->nam_sinh;
        $data['gioi_tinh'] = $request->gioi_tinh;
        $data['que_quan'] = $request->que_quan;
        $data['phong_ban'] = $request->phong_ban;
        $data['chuc_vu'] = $request->chuc_vu;
        $data['email'] = $request->email;
        $data['sdt'] = $request->sdt;

        DB::table('tbl_nhanvien')->where('id_nhanvien', $load)->update($data);
        //Session::put('message','Đăng ký thành công');
        return Redirect::to('DS-nhan-vien');
    }

    //Phong ban
    public function them_phong_ban()
    {
        return view('themphongban');
    }
    public function add_phong_ban(Request $request)
    {
        $data = array();
        $data['ma_pb'] = $request->ma_pb;
        $data['ten_pb'] = $request->ten_pb;
        $data['so_luong'] = $request->so_luong;
        $data['dia_chi'] = $request->dia_chi;

        DB::table('tbl_phongban')->insert($data);
        //Session::put('message','Đăng ký thành công');
        return Redirect::to('/them-phong-ban');
    }
    public function DS_phong_ban()
    {
        $nv = DB::table('tbl_phongban')->get();
        $data = view('quanlyphongban')->with('room',$nv);
        return view('welcome')->with('quanlyphongban',$data);

    }
    public function xoa_phong_ban($xoa)
    {
        DB::table('tbl_phongban')->where('id_phongban', $xoa)->delete();
        return Redirect::to('/DS-phong-ban');
    }
    public function sua_phong_ban($id)
    {
        $edit = DB::table('tbl_phongban')->where('id_phongban', $id)->get();
        $sua = view('suaphongban')->with('edit_phongban',$edit);
        return view('welcome')->with('suaphongban',$sua);
    }
    public function edit_phong_ban(Request $request, $load)
    {
        $data = array();
        $data['ma_pb'] = $request->ma_pb;
        $data['ten_pb'] = $request->ten_pb;
        $data['so_luong'] = $request->so_luong;
        $data['dia_chi'] = $request->dia_chi;
        DB::table('tbl_phongban')->where('id_phongban', $load)->update($data);
        //Session::put('message','Đăng ký thành công');
        return Redirect::to('DS-phong-ban');
    }

    //Chuc vu
    public function them_chuc_vu()
    {
        return view('themchucvu');
    }
    public function DS_chuc_vu()
    {
        $nv = DB::table('tbl_chucvu')->get();
        $data = view('quanlychucvu')->with('room',$nv);
        return view('welcome')->with('quanlychucvu',$data);

    }
    public function add_chuc_vu(Request $request)
    {
        $data = array();
        $data['ma_cv'] = $request->ma_cv;
        $data['ten_cv'] = $request->ten_cv;
        $data['luong'] = $request->luong;
        $data['mo_ta'] = $request->mo_ta;

        DB::table('tbl_chucvu')->insert($data);
        //Session::put('message','Đăng ký thành công');
        return Redirect::to('/them-chuc-vu');
    }
    public function xoa_chuc_vu($xoa)
    {
        DB::table('tbl_chucvu')->where('id_chucvu', $xoa)->delete();
        return Redirect::to('/DS-chuc-vu');
    }
    public function sua_chuc_vu($id)
    {
        $edit = DB::table('tbl_chucvu')->where('id_chucvu', $id)->get();
        $sua = view('suachucvu')->with('edit_chucvu',$edit);
        return view('welcome')->with('suachucvu',$sua);
    }
    public function edit_chuc_vu(Request $request, $load)
    {
        $data = array();
        $data['ma_cv'] = $request->ma_cv;
        $data['ten_cv'] = $request->ten_cv;
        $data['luong'] = $request->luong;
        $data['mo_ta'] = $request->mo_ta;
        DB::table('tbl_chucvu')->where('id_chucvu', $load)->update($data);
        //Session::put('message','Đăng ký thành công');
        return Redirect::to('DS-chuc-vu');
    }

    //Leader
    public function DS_leader()
    {
        $nv = DB::table('tbl_nhanvien')->where('chuc_vu','Trưởng phòng')->get();
        $data = view('quanlyleader')->with('room',$nv);
        return view('welcome')->with('quanlyleader',$data);
    }
}

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|ư
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/login');
});
Route::get('/home','HomeController@home');

Route::get('/login','LoginController@login');
Route::get('/register','LoginController@register');
Route::post('/regis','LoginController@regis');

Route::get('/forgotpassword','LoginController@forgotpassword');
Route::get('/changepassword','LoginController@changepassword');

Route::post('/loginn','LoginController@sb_Login');

//Quản lý nhân viên
Route::get('/DS-nhanvien','NhanVienController@staff_list');
Route::get('/them-nhanvien','NhanVienController@staff_add');
Route::get('/edit-staff/{id_NV}','NhanVienController@edit_staff');
Route::post('/update-staff/{id_NV}','NhanVienController@update_staff');
Route::post('/save-staff','NhanVienController@save_staff');
Route::get('/add-staff','NhanVienController@add_staff');
    //xóa nhà cung cấp
    Route::get('/unactive-staff/{id_NV}','NhanVienController@unactive_staff');//tạo thêm môt tham số { category_product_id } tên gì cũng đc để dễ phân biệt
    //danh sách nhà cung cấp đã xóa
    Route::get('/DS-nhanviendaxoa','NhanVienController@staff_list_delete');
    Route::get('/delete-staff/{id_NV}','NhanVienController@delete_staff');//xóa lun
    Route::get('/active-staff/{id_NV}','NhanVienController@active_staff');//khôi phục
//---------------------------

//Quản lý khách hàng
Route::get('/DS-khachhang','KhachHangController@customer_list');
Route::get('/them-khachhang','KhachHangController@customer_add');
Route::post('/save-customer','KhachHangController@save_customer');
Route::get('/edit-customer/{id_KH}','KhachHangController@edit_customer');
Route::post('/update-customer/{id_KH}','KhachHangController@update_customer');
    //xóa khách hàng
    Route::get('/unactive-customer/{id_KH}','KhachHangController@unactive_customer');//tạo thêm môt tham số { category_product_id } tên gì cũng đc để dễ phân biệt
    //danh sách khách hàng đã xóa
    Route::get('/DS-khachhangdaxoa','KhachHangController@customer_list_delete');
    Route::get('/delete-customer/{id_KH}','KhachHangController@delete_customer');//xóa lun
    Route::get('/active-customer/{id_KH}','KhachHangController@active_customer');//khôi phục
    //---------------------------

//Quản lý loại hàng hóa
Route::get('/DS-loaihanghoa','LHangHoaController@product_type_list');
Route::get('/them-loaihanghoa','LHangHoaController@product_type_add');
Route::get('/edit-product-type/{id_LHH}','LHangHoaController@edit_product_type');
Route::post('/update-product-type/{id_LHH}','LHangHoaController@update_product_type');
Route::post('/save-product-type','LHangHoaController@save_product_type');
Route::get('/add-product-type','LHangHoaController@add_product_type');
//danh sách sản phẩm trong loại sản phẩm
Route::get('/list-product-product-type/{id_LHH}','LHangHoaController@list_product_product_type');

    //xóa loại hàng hóa
    Route::get('/unactive-product-type/{id_LHH}','LHangHoaController@unactive_product_type');//tạo thêm môt tham số { category_product_id } tên gì cũng đc để dễ phân biệt
    //danh sách loại hàng hóa đã xóa
    Route::get('/DS-loaihanghoadaxoa','LHangHoaController@product_type_list_delete');
    Route::get('/delete-product-type/{id_LHH}','LHangHoaController@delete_product_type');//xóa lun
    Route::get('/active-product-type/{id_LHH}','LHangHoaController@active_product_type');//khôi phục
//---------------------------

//Quản lý hàng hóa
Route::get('/DS-hanghoa','HangHoaController@product_list');
Route::get('/them-hanghoa','HangHoaController@product_add');
Route::post('/save-product','HangHoaController@save_product');
Route::get('/edit-product/{id_HH}','HangHoaController@edit_product');
Route::post('/update-product/{id_HH}','HangHoaController@update_product');

Route::get('/add-product','HangHoaController@add_product');//Lấy dữ liệu bảng loại hàng hóa và bảng thương hiệu để hiển thị tên
//xóa hàng hóa
Route::get('/unactive-product/{id_HH}','HangHoaController@unactive_product');//tạo thêm môt tham số { category_product_id } tên gì cũng đc để dễ phân biệt
//danh sách hàng hóa đã xóa
Route::get('/DS-hanghoadaxoa','HangHoaController@product_list_delete');
Route::get('/delete-product/{id_HH}','HangHoaController@delete_product');//xóa lun
Route::get('/active-product/{id_HH}','HangHoaController@active_product');//khôi phục
//chi tiết hàng hóa
Route::get('/view-product/{id_HH}','HangHoaController@view_product');
//---------------------------

//Quản lý đơn xuất
Route::get('/DS-donxuat','DonXuatController@delivery_list');
Route::get('/them-donxuat','DonXuatController@delivery_add');
Route::post('/save-delivery','DonXuatController@save_delivery');
Route::get('/update-brand/{id_TH}','DonXuatController@update_brand');
Route::get('/add-delivery','DonXuatController@add_delivery');//Lấy dữ liệu bảng loại hàng hóa và bảng thương hiệu để hiển thị tên
//xóa đơn xuất
Route::get('/unactive-delivery/{id_DX}','DonXuatController@unactive_delivery');//tạo thêm môt tham số { category_product_id } tên gì cũng đc để dễ phân biệt
//danh sách đơn xuất đã xóa
Route::get('/DS-donxuatdaxoa','DonXuatController@delivery_list_delete');
Route::get('/delete-delivery/{id_DX}','DonXuatController@delete_delivery');//xóa lun
Route::get('/active-delivery/{id_DX}','DonXuatController@active_delivery');//khôi phục
//chi tiết hàng hóa
Route::get('/view-delivery/{id_DX}','DonXuatController@view_delivery');

// Quan ly Export
// Route::get('exportList', 'DonXuatController@index');
// Route::get('addExport', 'DonXuatController@addGet');
// Route::post('addExport', 'DonXuatController@addPost');
// Route::get('editExport/{id}', 'DonXuatController@editGet');
// Route::post('editExport/{id}', 'DonXuatController@editPost');
// Route::post('exportList/deletePost', 'DonXuatController@deletePost');
//---------------------------

//Quản lý nhà cung cấp
Route::get('/DS-nhacungcap','NhaCungCapController@manufacture_list');
Route::get('/them-nhacungcap','NhaCungCapController@manufacture_add');
Route::get('/edit-manufacture/{id_NCC}','NhaCungCapController@edit_manufacture');
Route::post('/update-manufacture/{id_NCC}','NhaCungCapController@update_manufacture');
Route::post('/save-manufacture','NhaCungCapController@save_manufacture');
Route::get('/add-manufacture','NhaCungCapController@add_manufacture');
    //xóa nhà cung cấp
    Route::get('/unactive-manufacture/{id_NCC}','NhaCungCapController@unactive_manufacture');//tạo thêm môt tham số { category_product_id } tên gì cũng đc để dễ phân biệt
    //danh sách nhà cung cấp đã xóa
    Route::get('/DS-nhacungcapdaxoa','NhaCungCapController@manufacture_list_delete');
    Route::get('/delete-manufacture/{id_NCC}','NhaCungCapController@delete_manufacture');//xóa lun
    Route::get('/active-manufacture/{id_NCC}','NhaCungCapController@active_manufacture');//khôi phục
//---------------------------

//-------------------------------------
//Quản lý thương hiệu
Route::get('/DS-thuonghieu','ThuongHieuController@brand_list');
Route::get('/them-thuonghieu','ThuongHieuController@brand_add');
Route::post('/save-brand','ThuongHieuController@save_brand');
Route::get('/edit-brand/{id_TH}','ThuongHieuController@edit_brand');
Route::post('/update-brand/{id_TH}','ThuongHieuController@update_brand');
//danh sách sản phẩm trong loại sản phẩm
Route::get('/list-product-product-typee/{id_TH}','ThuongHieuController@list_product_product_typee');
    //xóa thương hiệu
    Route::get('/unactive-brand/{id_TH}','ThuongHieuController@unactive_brand');//tạo thêm môt tham số { category_product_id } tên gì cũng đc để dễ phân biệt
    //danh sách thương hiệu đã xóa
    Route::get('/DS-thuonghieudaxoa','ThuongHieuController@brand_list_delete');
    Route::get('/delete-brand/{id_TH}','ThuongHieuController@delete_brand');//xóa lun
    Route::get('/active-brand/{id_TH}','ThuongHieuController@active_brand');//khôi phục
    //---------------------------

    //Quản lý dơn vị tính
Route::get('/DS-donvitinh','DonViController@unit_list');
Route::get('/them-donvitinh','DonViController@unit_add');
Route::post('/save-unit','DonViController@save_unit');
Route::get('/edit-unit/{id_DVT}','DonViController@edit_unit');
Route::post('/update-unit/{id_DVT}','DonViController@update_unit');
// //danh sách sản phẩm trong loại sản phẩm
// Route::get('/list-product-product-typee/{id_TH}','ThuongHieuController@list_product_product_typee');
    //xóa đơn vị tính
    Route::get('/unactive-unit/{id_DVT}','DonViController@unactive_unit');//tạo thêm môt tham số { category_product_id } tên gì cũng đc để dễ phân biệt
    //danh sách dơn vị đã xóa
    Route::get('/DS-donvitinhdaxoa','DonViController@unit_list_delete');
    Route::get('/delete-unit/{id_DVT}','DonViController@delete_unit');//xóa lun
    Route::get('/active-unit/{id_DVT}','DonViController@active_unit');//khôi phục
    //---------------------------
//Quản lý hóa đơn
Route::get('/DS-hoadon','HoaDonController@bill_list');
Route::get('/them-hoadon','HoaDonController@bill_add');

//Quản lý phiếu mua hàng
Route::get('/DS-phieumuahang','PhieuMuaHangController@vouchers_list');
Route::get('/them-phieumuahang','PhieuMuaHangController@vouchers_add');
Route::post('/save-vouchers','PhieuMuaHangController@save_vouchers');
Route::get('/edit-vouchers/{id_PMH}','PhieuMuaHangController@edit_vouchers');
Route::post('/update-vouchers/{id_PMH}','PhieuMuaHangController@update_vouchers');

Route::get('/add-vouchers','PhieuMuaHangController@add_vouchers');//Lấy dữ liệu bảng loại hàng hóa và bảng thương hiệu để hiển thị tên
//xóa hàng hóa
Route::get('/unactive-vouchers/{id_PMH}','PhieuMuaHangController@unactive_vouchers');//tạo thêm môt tham số { category_product_id } tên gì cũng đc để dễ phân biệt
//danh sách hàng hóa đã xóa
Route::get('/DS-phieumuahangdaxoa','PhieuMuaHangController@vouchers_list_delete');
Route::get('/delete-vouchers/{id_PMH}','PhieuMuaHangController@delete_vouchers');//xóa lun
Route::get('/active-vouchers/{id_PMH}','PhieuMuaHangController@active_vouchers');//khôi phục


//đăng xuất
Route::get('/login-checkout','LoginController@login_checkout');
Route::get('/logout','LoginController@logout');
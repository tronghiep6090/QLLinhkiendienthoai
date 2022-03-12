<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Nhân viên
Route::get('/them-nhan-vien','NhansuController@them_nhan_vien');
Route::get('/DS-nhan-vien','NhansuController@DS_nhan_vien');

Route::post('/add-nhan-vien','NhansuController@add_nhan_vien');//thêm
Route::get('/xoa-nhan-vien/{xoa}','NhansuController@xoa_nhan_vien');
Route::get('/sua-nhan-vien/{id}','NhansuController@sua_nhan_vien');
Route::post('/edit-nhan-vien/{load}','NhansuController@edit_nhan_vien');

//Phòng ban
Route::get('/them-phong-ban','NhansuController@them_phong_ban');
Route::get('/DS-phong-ban','NhansuController@DS_phong_ban');

Route::post('/add-phong-ban','NhansuController@add_phong_ban');
Route::get('/xoa-phong-ban/{xoa}','NhansuController@xoa_phong_ban');
Route::get('/sua-phong-ban/{id}','NhansuController@sua_phong_ban');
Route::post('/edit-phong-ban/{load}','NhansuController@edit_phong_ban');

//Chức vụ
Route::get('/them-chuc-vu','NhansuController@them_chuc_vu');
Route::get('/DS-chuc-vu','NhansuController@DS_chuc_vu');

Route::post('/add-chuc-vu','NhansuController@add_chuc_vu');
Route::get('/xoa-chuc-vu/{xoa}','NhansuController@xoa_chuc_vu');
Route::get('/sua-chuc-vu/{id}','NhansuController@sua_chuc_vu');
Route::post('/edit-chuc-vu/{load}','NhansuController@edit_chuc_vu');

//Leader
Route::get('/DS-leader','NhansuController@DS_leader');



//
Route::get('/danhsachthuonghieu','ThuongHieuController@danhsachthuonghieu');
Route::get('/themthuonghieu','ThuongHieuController@themthuonghieu');
Route::get('/home','HomeController@home');
Route::get('/login','LoginController@login');
Route::get('/register','LoginController@register');
Route::get('/forgotpassword','LoginController@forgotpassword');
Route::get('/changepassword','LoginController@changepassword');
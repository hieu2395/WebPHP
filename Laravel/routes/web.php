<?php

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
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});
//
Route::get('admin/dangnhap', 'UserController@getDangnhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangnhapAdmin');
Route::get('admin/logout', 'UserController@getDangxuatAdmin');

//middleware kiem tra dang nhap quyen admin moi dc vao
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function(){
	
	Route::group(['prefix'=>'theloai'], function(){
		//admin/theloai/danhsach|them|sua
		Route::get('danhsach', 'TheLoaiController@getDanhSach');

		Route::get('them', 'TheLoaiController@getThem');

		Route::get('sua/{id}', 'TheLoaiController@getSua');

		Route::post('them', 'TheLoaiController@postThem');

		Route::post('sua/{id}', 'TheLoaiController@postSua');

		Route::get('xoa/{id}', 'TheLoaiController@getXoa');

	});

	Route::group(['prefix'=>'loaitin'], function(){
		//admin/loaitin/danhsach|them|sua
		Route::get('danhsach', 'LoaiTinController@getDanhSach');

		Route::get('them', 'LoaiTinController@getThem');

		Route::get('sua/{id}', 'LoaiTinController@getSua');

		Route::post('them', 'LoaiTinController@postThem');

		Route::post('sua/{id}', 'LoaiTinController@postSua');

		Route::get('xoa/{id}', 'LoaiTinController@getXoa');

	});

	Route::group(['prefix'=>'tintuc'], function(){
		//admin/loaitin/danhsach|them|sua
		Route::get('danhsach', 'TinTucController@getDanhSach');

		Route::get('them', 'TinTucController@getThem');

		Route::get('sua/{id}', 'TinTucController@getSua');
		
		Route::post('them', 'TinTucController@postThem');

		Route::post('sua/{id}', 'TinTucController@postSua');

		Route::get('xoa/{id}', 'TinTucController@getXoa');

	});

	Route::group(['prefix'=>'comment'], function(){

		Route::get('danhsach', 'CommentController@getDanhSach');

		Route::get('xoa/{id}', 'CommentController@getXoaUser');

		Route::get('xoa/{id}/{idTinTuc}', 'CommentController@getXoa');

	});

	Route::group(['prefix'=>'user'], function(){
		//admin/user/danhsach|them|sua
		Route::get('danhsach', 'UserController@getDanhSach');

		Route::get('them', 'UserController@getThem');

		Route::get('sua/{id}', 'UserController@getSua');

		Route::post('them', 'UserController@postThem');

		Route::post('sua/{id}', 'UserController@postSua');

		Route::get('xoa/{id}', 'UserController@getXoa');
	
	});

	Route::group(['prefix'=>'slide'], function(){
		//admin/slide/danhsach|them|sua
		Route::get('danhsach', 'SlideController@getDanhSach');

		Route::get('them', 'SlideController@getThem');

		Route::get('sua/{id}', 'SlideController@getSua');

		Route::post('them', 'SlideController@postThem');

		Route::post('sua/{id}', 'SlideController@postSua');

		Route::get('xoa/{id}', 'SlideController@getXoa');
		
	});

	Route::group(['prefix'=>'ajax'], function(){

		Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');

	});
});
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

Route::group(['prefix'=>'admin'], function(){
	
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

		Route::get('sua', 'TinTucController@getSua');
		
		Route::post('them', 'TinTucController@postThem');

		Route::post('sua', 'TinTucController@postSua');
	
	});

	Route::group(['prefix'=>'user'], function(){
		//admin/user/danhsach|them|sua
		Route::get('danhsach', 'UserController@getDanhSach');

		Route::get('them', 'UserController@getThem');

		Route::get('sua', 'UserController@getSua');

		Route::post('them', 'UserController@postThem');

		Route::post('sua', 'UserController@postSua');
	
	});

	Route::group(['prefix'=>'slide'], function(){
		//admin/slide/danhsach|them|sua
		Route::get('danhsach', 'SlideController@getDanhSach');

		Route::get('them', 'SlideController@getThem');

		Route::get('sua', 'SlideController@getSua');

		Route::post('them', 'SlideController@postThem');

		Route::post('sua', 'SlideController@postSua');

	});
});
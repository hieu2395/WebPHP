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

		Route::get('sua', 'TheLoaiController@getSua');

		Route::post('them', 'TheLoaiController@postThem');
	
	});

	Route::group(['prefix'=>'loaitin'], function(){
		//admin/loaitin/danhsach|them|sua
		Route::get('danhsach', 'LoaiTinController@getDanhSach');

		Route::get('them', 'LoaiTinController@getThem');

		Route::get('sua', 'LoaiTinController@getSua');

		Route::post('them', 'LoaiTinController@postThem');

	});

	Route::group(['prefix'=>'tintuc'], function(){
		//admin/loaitin/danhsach|them|sua
		Route::get('danhsach', 'TinTucController@getDanhSach');

		Route::get('them', 'TinTucController@getThem');

		Route::get('sua', 'TinTucController@getSua');
		
		Route::post('them', 'TinTucController@postThem');
	
	});

	Route::group(['prefix'=>'user'], function(){
		//admin/user/danhsach|them|sua
		Route::get('danhsach', 'UserController@getDanhSach');

		Route::get('them', 'UserController@getThem');

		Route::get('sua', 'UserController@getSua');

		Route::post('them', 'UserController@postThem');
	
	});

	Route::group(['prefix'=>'slide'], function(){
		//admin/slide/danhsach|them|sua
		Route::get('danhsach', 'SlideController@getDanhSach');

		Route::get('them', 'SlideController@getThem');

		Route::get('sua', 'SlideController@getSua');

		Route::post('them', 'SlideController@postThem');

	});
});
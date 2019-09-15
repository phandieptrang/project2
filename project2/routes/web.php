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
Route::group(['prefix' => 'giao_vu', 'middleware' => 'CheckGiaoVu'], function(){
	Route::group(['prefix'=>'mon'],function (){
		$group = 'mon';
		Route::get('view_all','MonController@view_all')->name("$group.view_all");
		Route::get('view_insert','MonController@view_insert')->name("$group.view_insert");
		Route::post('process_insert','MonController@process_insert')->name("$group.process_insert");
		Route::get('view_update','MonController@view_update')->name("$group.view_update");
		Route::post('process_update','MonController@process_update')->name("$group.process_update");
	});

	Route::group(['prefix'=>'chuyen_nganh'],function (){
		$group = 'chuyen_nganh';
		Route::get('view_all','ChuyenNganhController@view_all')->name("$group.view_all");
		Route::get('view_insert','ChuyenNganhController@view_insert')->name("$group.view_insert");
		Route::post('process_insert','ChuyenNganhController@process_insert')->name("$group.process_insert");
	});

	Route::group(['prefix'=>'phan_cong'],function (){
		$group = 'phan_cong';
		Route::get('view_all','PhanCongController@view_all')->name("$group.view_all");
		Route::get('view_insert','PhanCongController@view_insert')->name("$group.view_insert");
		Route::get('ajax_view_insert','PhanCongController@ajax_view_insert')->name("$group.ajax_view_insert");
		Route::post('process_insert','PhanCongController@process_insert')->name("$group.process_insert");
		Route::get('view_update','PhanCongController@view_update')->name("$group.view_update");
		Route::post('process_update','PhanCongController@process_update')->name("$group.process_update");
		Route::get('get_mon_by_chuyen_nganh','PhanCongController@get_mon_by_chuyen_nganh')->name("$group.get_mon_by_chuyen_nganh");
		Route::get('get_lop_by_chuyen_nganh','PhanCongController@get_lop_by_chuyen_nganh')->name("$group.get_lop_by_chuyen_nganh");
		Route::get('get_giang_vien_by_chuyen_nganh','PhanCongController@get_giang_vien_by_chuyen_nganh')->name("$group.get_giang_vien_by_chuyen_nganh");
	});

	Route::group(['prefix'=>'cham_cong'],function(){
		$group = "cham_cong";
		Route::get('view_cham_cong','ChamCongController@view_cham_cong')->name("$group.view_cham_cong");
		Route::get('process_cham_cong','ChamCongController@process_cham_cong')->name("$group.process_cham_cong");
		Route::get('process_update_cham_cong','ChamCongController@process_update_cham_cong')->name("$group.process_update_cham_cong");
		Route::get('xac_nhan_cham_cong','ChamCongController@xac_nhan_cham_cong')->name("$group.xac_nhan_cham_cong");
		Route::get('xac_nhan_tat_ca_cham_cong','ChamCongController@xac_nhan_tat_ca_cham_cong')->name("$group.xac_nhan_tat_ca_cham_cong");
		Route::get('get_cham_cong_da_xac_nhan','ChamCongController@get_cham_cong_da_xac_nhan')->name("$group.get_cham_cong_da_xac_nhan");
		Route::get('get_cham_cong_chua_xac_nhan','ChamCongController@get_cham_cong_chua_xac_nhan')->name("$group.get_cham_cong_chua_xac_nhan");
		Route::get('get_cham_cong_by_search','ChamCongController@get_cham_cong_by_search')->name("$group.get_cham_cong_by_search");
		Route::get('danh_sach_cham_cong','ChamCongController@list_cham_cong')->name("$group.danh_sach_cham_cong");
	});

	Route::get('redirect','Controller@redirect')->name('redirect');
	Route::get('logout','Controller@logout')->name('logout');
	Route::get('thong_ke_luong_trung_binh','LuongController@view_chart_luong')->name('thong_ke_luong_trung_binh');
	Route::get('thong_ke_luong_ca_nhan','LuongController@view_chart_luong_ca_nhan')->name('thong_ke_luong_ca_nhan');

});

Route::get('view_login','Controller@view_login')->name('view_login');
Route::post('process_login','Controller@process_login')->name('process_login');

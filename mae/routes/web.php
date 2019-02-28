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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin','Admin\IndexController@index');

Route::resource('/admin/cate','Admin\CateController');

Route::get('welcome.blade.php',function(){
	return view('admin.index.welcome');
});














// wangfan
// 广告表
Route::resource('/admin/adver','Admin\AdverController');


















// endwangfan
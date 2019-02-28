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























































//fengwenting
// 网站管理
	Route::get('admin/web','Admin\Webcontroller@index');
	Route::get('admin/web/edit','Admin\Webcontroller@edit');
	Route::post('admin/web/update','Admin\Webcontroller@update');
//友情链接
	//Route::resource('admin/link/create',)
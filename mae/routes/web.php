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

//后台首页路由
Route::get('/admin','Admin\IndexController@index');
//后台用户管理
Route::resource('admin/user','Admin\UserController');









































Route::get('welcome.blade.php',function(){
	return view('admin.index.welcome');
});

















// 广告表
Route::resource('/admin/adver','Admin\AdverController');












































 // 网站管理
Route::get('admin/web','Admin\Webcontroller@index');
Route::get('admin/web/edit','Admin\Webcontroller@edit');
Route::post('admin/web/update','Admin\Webcontroller@update');
// 友情链接
// Route::resource('admin/link/create',)









// 7zc 专属战区


//添加类别子分类
Route::get('/admin/cate/create/{id}','Admin\CateController@create');
Route::resource('/admin/cate','Admin\CateController');

//商品属性展示
Route::resource('/admin/goodval','Admin\GoodvalController');


//轮播图管理
Route::resource('/admin/slid','Admin\SlidController');
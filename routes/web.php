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



Route::get('welcome.blade.php',function(){
	return view('admin.index.welcome');
});



































//添加类别子分类
Route::get('/admin/cate/create/{id}','Admin\CateController@create');
Route::resource('/admin/cate','Admin\CateController');

//商品属性展示
Route::resource('/admin/goodval','Admin\GoodvalController');


//轮播图管理
Route::resource('/admin/slid','Admin\SlidController');
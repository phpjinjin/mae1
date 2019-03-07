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
//前台首页路由
Route::resource('home/index','Home\HomeController');
//前台登录页面
Route::resource('home/login','Home\LoginController');
//前台注册页面
Route::resource('home/register','Home\RegisterController');








































Route::get('welcome.blade.php',function(){
	return view('admin.index.welcome');
});



















//后台 广告表删除路由
Route::get('/admin/adver/adver/{id}','Admin\AdverController@delete');
//后台 广告表
Route::resource('/admin/adver','Admin\AdverController');
//后台文章管理上架下架
Route::get('/admin/works/putaway/{id}','Admin\WorksController@putaway');
//后台文章管理删除
Route::get('/admin/works/works/{id}','Admin\WorksController@delete');
//后台文章管理
Route::resource('/admin/works','Admin\WorksController');
//后台浏览订单发货
Route::get('/admin/orders/orderr/{id}','Admin\OrdersController@orderr');
//后台浏览订单删除
Route::get('/admin/orders/orders/{id}','Admin\OrdersController@delete');
//后台浏览订单发货
Route::resource('/admin/orders','Admin\OrdersController');








































 // 网站管理
Route::get('admin/web','Admin\Webcontroller@index');
Route::get('admin/web/edit','Admin\Webcontroller@edit');
Route::post('admin/web/update','Admin\Webcontroller@update');
// 友情链接
 Route::resource('admin/link','Admin\linkcontroller');
















//添加类别子分类
Route::get('/admin/cate/create/{id}','Admin\CateController@create');
//类别管理
Route::resource('/admin/cate','Admin\CateController');

//属性管理 
Route::get('/admin/goodval/dele/{id}','Admin\GoodvalController@dele');
Route::resource('/admin/goodval','Admin\GoodvalController');

//商品管理
Route::get('/admin/goods/dele/{id}','Admin\GoodsController@dele');
Route::resource('/admin/goods','Admin\GoodsController');

//轮播图管理
Route::resource('/admin/slid','Admin\SlidController');

//前台商品展示
Route::resource('/home/goods','Home\GoodsController');

//加入购物车
Route::get('/home/carts/add/{cnt}/{gid}','Home\CartsController@add');
//减商品数量
Route::get('/home/carts/jian/{cid}','Home\CartsController@jian');
//加商品数量
Route::get('/home/carts/jia/{cid}','Home\CartsController@jia');
//删除购物车条目
Route::get('/home/carts/dele/{id}','Home\CartsController@dele');

Route::resource('/home/carts','Home\CartsController');


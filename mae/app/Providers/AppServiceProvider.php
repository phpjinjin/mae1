<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Home\GoodsController;
use App\Http\Controllers\Home\CartsController;
use App\Http\Controllers\Admin\ColumnController;
use App\Http\Controllers\Admin\SlidController;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //商品类别
         View::share('cate_data',GoodsController::getCate());
         //商品热度
         View::share('good_hot',GoodsController::good_Hot());
         //购物车数量
         View::share('carts_count',CartsController::carts_count());
         //栏目
         View::share('getColumn',ColumnController::getColumn());
         //轮播图
         View::share('getSlid',SlidController::getSlid());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

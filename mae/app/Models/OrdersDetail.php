<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    //订单详情
     //订单详情表
    public $table = 'orders_detail';
    //订单详情表id
    public $primaryKey='odid';
    //不验证时间
    public $timestamps = false; 

       

	    // 设置详情表(ordersdetail)与商品表(Goods)的关联(多对一)
	   public function goods()
	   {
	   		return $this->belongsTo('App\Models\Goods','gid');
	   }

}

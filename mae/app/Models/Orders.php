<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //订单主表
    public $table = 'orders';
    //订单详情表id
    public $primaryKey='oid';

    protected $casts = [
                'oid' =>'string'
            ];



    //一对一、订单主表与订单详情
    public function ordersdetail()
    {
        return $this->hasOne('App\Models\OrdersDetail','oid');
    }

     // 订单主表(Orders)与用户表(Users)的关联:多对一
    public function  usersss()
    {
    	return $this->belongsTo('App\Models\Users','uid');


    }

   



    
}

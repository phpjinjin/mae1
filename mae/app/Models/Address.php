<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //收货地址
    public $table = 'address';
    //收货地址表id
    public $primaryKey='addid';

     // 收货地址(address)与用户表(Users)的关联:多对一
    public function  useraddress()
    {
    	return $this->belongsTo('App\Models\Users','uid');
    }




}

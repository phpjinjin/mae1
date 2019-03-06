<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    
    
     //商品表
    public $table = 'goods';
    //商品表id
    public $primaryKey='gid';
    //不验证时间
    public $timestamps = false; 
    
    //建立对商品图片表的一对多
    public function goodspic()
    {
        return $this->hasMany('App\Models\GoodsPic','gid');
    }
    //建立对属性的关联 一对一
    public function goodsval()
    {
        return $this->hasOne('App\Models\Goodval','gid');
    }
}

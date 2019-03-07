<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsPic extends Model
{
    //商品图片表
    public $table = 'goods_pic';
    //商品图片表id
    public $primaryKey='id';
    //不验证时间
    public $timestamps = false; 

}

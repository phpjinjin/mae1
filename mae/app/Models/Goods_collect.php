<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods_collect extends Model
{
    //
    //收藏表
    public $table = 'goods_collect';
    //收藏表id
    public $primaryKey='gcid';
    //不验证时间
    public $timestamps = false; 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    public $table = "goods_cart";

    public $primaryKey = 'cid';

    public $timestamps = true;

    protected $dateFormat = 'U';

    //建立对商品表的关联 
    
    public function cart_good()
    {
        return $this->hasMany('App\Models\Goods','gid','gid');
    }
}

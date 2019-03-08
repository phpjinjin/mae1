<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{

    //关联数据表
    public $table =  'works';
    //设置字段
    public $primaryKey = 'woid';
    //不验证时间
    public $timestamps = false; 
    
    
    // 建立与商品一对一关系
     public function goodss()
    {
        return $this->hasOne('App\Models\Goods','gid');
    }
    

}

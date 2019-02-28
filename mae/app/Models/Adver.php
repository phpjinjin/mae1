<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adver extends Model
{
    //广告表名
    public $table = 'adver';

    //广告表id
    public $primaryKey = 'advid';

    //禁止时间
    public $timestamps = false; 
}

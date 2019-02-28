<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $table = "goods_type";

    public $primaryKey = 'ggid';

    public $timestamps = false;
}

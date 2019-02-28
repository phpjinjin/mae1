<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goodval extends Model
{
    public $table = "goods_value";

    public $primaryKey = 'gvid';

    public $timestamps = false;
}

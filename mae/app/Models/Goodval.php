<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goodval extends Model
{
    public $table = "goods_value";

    public $primaryKey = 'vid';

    public $timestamps = false;
}

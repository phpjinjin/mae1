<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    public $table = "column";

    public $primaryKey = 'id';

    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //前台用户主表
    public $table = 'users';
    //前台用户主表id
    public $primaryKey='uid';

      //用户主表users和用户详情表一对一
    public function userinfo()
    {
        return $this->hasOne('App\Models\UsersDetail','udid');
    }

}

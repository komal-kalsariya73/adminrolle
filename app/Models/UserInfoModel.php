<?php

namespace App\Models;

use CodeIgniter\Model;

class UserInfoModel extends Model
{
    protected $table = 'userinfo';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','name','phone', 'gender','city','address','image','created_at'];
}

?>
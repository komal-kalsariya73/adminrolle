<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name','last_name','email', 'address','phone','company_name','gender','pincode','city','image','created_at'];
}

?>
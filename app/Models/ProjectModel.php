<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id','user_id','project_name', 'description','status','message','start_date','end_date','image','price','created_at'];
}

?>
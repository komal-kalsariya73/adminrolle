<?php

namespace App\Models;

use CodeIgniter\Model;

class FollowupModel extends Model
{
    protected $table = 'followup';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id','project_id','followup_date', 'message','status','created_at','user_id'];
}

?>
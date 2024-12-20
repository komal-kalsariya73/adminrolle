<?php
namespace App\Models;

use CodeIgniter\Model;

class ResetPasswordModel extends Model
{
    protected $table = 'password_resets';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'token', 'user_id', 'created_at'];
}

?>
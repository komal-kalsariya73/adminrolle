<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username','email', 'password','role','created_at'];

    public function validateUser($email, $password)
    {
        return $this->where('email', $email)
            ->where('password', md5($password))
            ->first();
    }
    public function updatePassword($user_id, $new_password)
    {
        $data = [
            'password' => md5($new_password) // MD5 hash for new password
        ];

        return $this->update($user_id, $data);
    }
}

?>
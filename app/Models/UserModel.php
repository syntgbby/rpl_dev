<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['email', 'password', 'role', 'status', 'pict', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getUser()
    {
        return $this->findAll();
    }

    public function getAplikanByRole($role)
    {
        return $this->where('role', $role)->findAll();
    }

    public function updateUser($email, $data)
    {
        return $this->where('email', $email)->set($data)->update();
    }
}
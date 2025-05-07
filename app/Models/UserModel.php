<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username', 'email', 'password', 'role', 'status', 'created_at', 'updated_at', 'pertanyaan_id', 'jawaban'];
    protected $useTimestamps = true;
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class CapaianRPL extends Model
{
    protected $table = 'capaian_rpl';
    protected $primaryKey = 'id';
    protected $allowedFields = ['deskripsi', 'kurikulum_id'];

}
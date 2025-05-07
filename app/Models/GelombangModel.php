<?php

namespace App\Models;

use CodeIgniter\Model;

class GelombangModel extends Model
{
    protected $table = 'gelombang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_gelombang', 'tanggal_mulai', 'tanggal_selesai'];
}
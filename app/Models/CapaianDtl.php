<?php

namespace App\Models;

use CodeIgniter\Model;

class CapaianDtl extends Model
{
    protected $table = 'capaian_rpl_dtl';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pendaftaran_id', 'capaian_id', 'status'];

}
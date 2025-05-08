<?php

namespace App\Models;

use CodeIgniter\Model;

class BuktiPendukungModel extends Model
{
    protected $table = 'bukti_lain';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pendaftaran_id', 'file_ktp', 'file_kk', 'file_skl'
    ];

    public function getBuktiPendukung()
    {
        return $this->findAll();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class PiagamModel extends Model
{
    protected $table = 'piagam';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pendaftaran_id',
        'bentuk_penghargaan',
        'pemberi',
        'tahun',
        'file_bukti'
    ];
}

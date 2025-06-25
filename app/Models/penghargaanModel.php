<?php

namespace App\Models;

use CodeIgniter\Model;

class PenghargaanModel extends Model
{
    protected $table      = 'penghargaan';
    protected $primaryKey = 'id';

    protected $allowedFields = ['pendaftaran_id', 'nama_penghargaan', 'tahun', 'penyelenggara', 'bukti'];
}

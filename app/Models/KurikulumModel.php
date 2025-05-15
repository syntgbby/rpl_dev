<?php

namespace App\Models;

use CodeIgniter\Model;

class KurikulumModel extends Model
{
    protected $table = 'kurikulum';
    protected $primaryKey = 'id';
    protected $allowedFields = ['prodi_id', 'tahun_ajar_id', 'kode_matkul', 'status'];

}

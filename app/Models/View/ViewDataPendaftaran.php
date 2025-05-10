<?php

namespace App\Models\View;

use CodeIgniter\Model;

class ViewDataPendaftaran extends Model
{
    protected $table = 'view_data_pendaftaran';
    protected $primaryKey = 'id';

    public function getDataPendaftaran()
    {
        return $this->findAll();
    }
}

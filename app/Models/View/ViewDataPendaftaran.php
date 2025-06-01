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

    public function getDataPendaftaranById($id)
    {
        return $this->where('pendaftaran_id', $id)->first();
    }

    public function getDataByFilter($startDate, $endDate)
    {
        return $this->where('updated_at >=', $startDate)
                    ->where('updated_at <=', $endDate)
                    ->findAll();
    }
}

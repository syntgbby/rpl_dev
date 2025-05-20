<?php

namespace App\Models\View;

use CodeIgniter\Model;

class ViewDataApproval extends Model
{
    protected $table = 'view_data_approval';
    protected $primaryKey = 'id';

    public function getDataApproval()
    {
        return $this->findAll();
    }

    public function getDataApprovalById($id)
    {
        return $this->where('pendaftaran_id', $id)->first();
    }
}

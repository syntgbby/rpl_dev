<?php

namespace App\Models\View;

use CodeIgniter\Model;

class ViewApproval extends Model
{
    protected $table = 'view_approval';
    protected $primaryKey = 'id';

    public function getViewApproval()
    {
        return $this->findAll();
    }
}
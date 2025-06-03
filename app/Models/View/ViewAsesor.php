<?php

namespace App\Models\View;

use CodeIgniter\Model;

class ViewAsesor extends Model
{
    protected $table = 'view_asesor';
    protected $primaryKey = 'id';

    public function getViewAsesor()
    {
        return $this->findAll();
    }
}
<?php

namespace App\Models\View;

use CodeIgniter\Model;

class ViewCapaian extends Model
{
    protected $table = 'view_capaian';
    protected $primaryKey = 'id';

    public function getViewCapaian()
    {
        return $this->findAll();
    }
}
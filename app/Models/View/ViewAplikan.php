<?php

namespace App\Models\View;

use CodeIgniter\Model;

class ViewAplikan extends Model
{
    protected $table = 'view_aplikan';
    protected $primaryKey = 'id';

    public function getViewAplikan()
    {
        return $this->findAll();
    }
}
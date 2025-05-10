<?php

namespace App\Models\View;

use CodeIgniter\Model;

class ViewMataKuliah extends Model
{
    protected $table = 'view_mata_kuliah';
    protected $primaryKey = 'id';

    public function getViewMataKuliah()
    {
        return $this->findAll();
    }
}

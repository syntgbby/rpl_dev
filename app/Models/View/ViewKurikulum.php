<?php

namespace App\Models\View;

use CodeIgniter\Model;

class ViewKurikulum extends Model
{
    protected $table = 'view_kurikulum';
    protected $primaryKey = 'id';

    public function getViewKurikulum()
    {
        return $this->findAll();
    }
}

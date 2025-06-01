<?php

namespace App\Models\View;

use CodeIgniter\Model;

class ViewAsesmenKurikulum extends Model
{
    protected $table = 'view_asesmen_kurikulum';
    protected $primaryKey = 'id';

    public function getViewAsesmenKurikulum()
    {
        return $this->findAll();
    }
}
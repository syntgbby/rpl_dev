<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranRplMatkulModel extends Model
{
    protected $table = 'pendaftaran_rpl_matkul';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pendaftaran_id', 'kurikulum_id', 'penilaian_asesor'];
    protected $useTimestamps = true;

    // Optional: Insert or Update (upsert)
    public function saveOrUpdate($pendaftaran_id, $kurikulum_id, $penilaian)
    {
        $existing = $this->where([
            'pendaftaran_id' => $pendaftaran_id,
            'kurikulum_id' => $kurikulum_id,
        ])->first();

        if ($existing) {
            return $this->update($existing['id'], ['penilaian_asesor' => $penilaian]);
        } else {
            return $this->insert([
                'pendaftaran_id' => $pendaftaran_id,
                'kurikulum_id' => $kurikulum_id,
                'penilaian_asesor' => $penilaian
            ]);
        }
    }

}

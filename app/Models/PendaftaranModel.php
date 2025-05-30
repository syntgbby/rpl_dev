<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran_rpl';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pendaftaran_id',
        'asesor_id',
        'user_id',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'email',
        'status_pendaftaran',
        'type_rpl',
        'program_study_id',
        'tahun_angkatan',
        'tahun_ajar_id',
        'alasan_penolakan',
        'surat_pernyataan'
    ];

    public function getPendaftaran()
    {
        return $this->findAll();
    }

    public function getDataPendaftaranById($id)
    {
        return $this->where('pendaftaran_id', $id)->first();
    }

    public function updateStatusPendaftaran($pendaftaranId, $status)
    {
        $pendaftaran = $this->where('pendaftaran_id', $pendaftaranId)->first();
        $id = $pendaftaran['id'];
        $this->update($id, ['status_pendaftaran' => $status]);
    }

    public function assignAsesor($pendaftaranId, $asesorId)
    {
        $pendaftaran = $this->where('pendaftaran_id', $pendaftaranId)->first();
        $id = $pendaftaran['id'];

        $this->update($id, ['asesor_id' => $asesorId]);
    }

    public function updateSuratPernyataan($pendaftaranId, $surat)
    {
        $pendaftaran = $this->where('pendaftaran_id', $pendaftaranId)->first();
        $id = $pendaftaran['id'];
        $this->update($id, ['surat_pernyataan' => $surat]);
    }

    public function updateAlasanPernyataan($pendaftaranId, $alasan)
    {
        $pendaftaran = $this->where('pendaftaran_id', $pendaftaranId)->first();
        $id = $pendaftaran['id'];
        $this->update($id, ['alasan_penolakan' => $alasan]);
    }

    public function updateType($pendaftaranId, $type)
    {
        $pendaftaran = $this->where('pendaftaran_id', $pendaftaranId)->first();
        $id = $pendaftaran['id'];
        $this->update($id, ['type_rpl' => $type]);
    }
}

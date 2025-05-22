<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailAplikanModel extends Model
{
    protected $table = 'detail_aplikan';
    protected $allowedFields = ['email', 'nama_lengkap', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tanggal_lahir', 'telepon', 'alamat', 'prodi_id', 'pendidikan_terakhir', 'nama_asal_sekolah', 'tahun_lulus', 'asal_informasi', 'asal_informasi_lainnya', 'pertanyaan_id', 'jawaban'];

    public function getDetailAplikan($email)
    {
        return $this->where('email', $email)->first();
    }
}
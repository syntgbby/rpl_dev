<?php

namespace App\Controllers\Aplikan;

use App\Models\PendaftaranModel;
use App\Models\PelatihanModel;
use App\Models\PengalamanKerjaModel;
use App\Models\BuktiPendukungModel;
use App\Models\TimelineModel;
use App\Models\ProdiModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

helper('text');

class PendaftaranController extends BaseController
{
    protected $pendaftaranModel;
    protected $pelatihanModel;
    protected $userModel;
    protected $pengalamanKerjaModel;
    protected $buktiPendukungModel;
    protected $timelineModel;
    protected $prodiModel;

    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
        $this->pelatihanModel = new PelatihanModel();
        $this->userModel = new UserModel();
        $this->pengalamanKerjaModel = new PengalamanKerjaModel();
        $this->buktiPendukungModel = new BuktiPendukungModel();
        $this->timelineModel = new TimelineModel();
        $this->prodiModel = new ProdiModel();
    }

    public function statusPendaftaran()
    {
        return $this->render('Dash/status-pendaftaran');
    }

    public function step1()
    {
        $email = session()->get('email'); // pastikan user sudah login

        $dataUser = $this->userModel->where('email', $email)->first();
        $prodi = $this->prodiModel->where('id !=', 1)->findAll();
        
        return $this->render('pendaftaran/step1', ['data' => $dataUser, 'prodi' => $prodi]);
    }

    public function saveStep1()
    {
        $email = session()->get('email');
        $tahunAngkatan = date('Y');

        $pendaftaranId = 'FRPL-' . $tahunAngkatan . random_string('numeric', 2);

        $getUser = $this->userModel->where('email', $email)->first();

        $data = [
            'pendaftaran_id' => $pendaftaranId,
            'tahun_angkatan' => $tahunAngkatan,
            'nama_lengkap'  => $getUser['username'],
            'nik'           => $this->request->getPost('nik'),
            'tempat_lahir'  => $getUser['tempat_lahir'],
            'tanggal_lahir' => $getUser['tanggal_lahir'],
            'jenis_kelamin' => $getUser['jenis_kelamin'],
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $getUser['telepon'],
            'email'         => $email,
        ];

        $existing = $this->pendaftaranModel->where('email', $email)->first();

        if ($existing) {
            return redirect()->to('/aplikan/pendaftaran/step2')->with('alert', 'Anda sudah melakukan pendaftaran');
        } else {
            $this->pendaftaranModel->insert($data);
        }

        return redirect()->to('/aplikan/pendaftaran/step2');
    }

    public function step2()
    {
        $email = session()->get('email');
        $pendaftaran = $this->pendaftaranModel->where('email', $email)->first();
        $pelatihans = $this->pelatihanModel->where('pendaftaran_id', $pendaftaran['pendaftaran_id'])->get()->getResultArray();

        if ($pelatihans) {
            return $this->render('pendaftaran/step2', ['pelatihan' => $pelatihans]);
        } else {
            return $this->render('pendaftaran/step2');
        }
    }

    public function saveStep2()
    {
        $email = session()->get('email');

        $getPendaftaran = $this->pendaftaranModel->where('email', $email)->first();
        $nama = $getPendaftaran['nama_lengkap'];
        $formatNama = str_replace(' ', '-', $nama);

        // Update validasi untuk hanya menerima PDF, JPG, JPEG, PNG
        $validationRule = [
            'file_bukti' => [
                'label' => 'File Bukti',
                'rules' => 'uploaded[file_bukti]|ext_in[file_bukti,pdf,jpg,jpeg,png]|max_size[file_bukti,2048]',
            ],
        ];

        // Validasi input
        if (!$this->validate($validationRule)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Ambil file yang diupload
        $file = $this->request->getFile('file_bukti');

        if ($file->isValid() && !$file->hasMoved()) {
            // Generate nama acak untuk file
            $fileName = $file->getRandomName();
            $path = FCPATH . 'uploads/bukti-pelatihan/' . $formatNama;

            // Pastikan direktori sudah ada
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            try {
                // Pindahkan file ke folder tujuan
                $file->move($path, $fileName);

                // Buat URL file
                $fileUrl = base_url('uploads/bukti-pelatihan/' . $formatNama . '/' . $fileName);

                // Insert data pelatihan ke database
                $this->pelatihanModel->insert([
                    'pendaftaran_id' => $getPendaftaran['pendaftaran_id'],
                    'nama_pelatihan' => $this->request->getPost('nama_pelatihan'),
                    'penyelenggara' => $this->request->getPost('penyelenggara'),
                    'tahun' => $this->request->getPost('tahun'),
                    'file_bukti' => $fileUrl, // Simpan URL file
                ]);

                // Redirect ke halaman step 2 dengan pesan sukses
                return redirect()->to('/aplikan/pendaftaran/step2')->with('success', 'Data pelatihan berhasil disimpan');
            } catch (\Exception $e) {
                // Tangani error jika gagal mengupload file
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload file: ' . $e->getMessage());
            }
        }

        // Jika file tidak valid atau gagal diupload
        return redirect()->back()->withInput()->with('error', 'File tidak valid atau gagal diupload');
    }

    public function deletePelatihan($id)
    {
        $this->pelatihanModel->delete($id);
        return redirect()->to('/aplikan/pendaftaran/step2');
    }

    public function step3()
    {
        return $this->render('pendaftaran/step3');
    }

    public function saveStep3()
    {
        $email = session()->get('email');

        $getPendaftaran = $this->pendaftaranModel->where('email', $email)->first();
        $nama = $getPendaftaran['nama_lengkap'];
        $formatNama = str_replace(' ', '-', $nama);

        // Update validasi untuk hanya menerima PDF, JPG, JPEG, PNG
        $validationRule = [
            'file_bukti' => [
                'label' => 'File Bukti',
                'rules' => 'uploaded[file_bukti]|ext_in[file_bukti,pdf,jpg,jpeg,png]|max_size[file_bukti,2048]',
            ],
        ];

        // Validasi input
        if (!$this->validate($validationRule)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Ambil file yang diupload
        $file = $this->request->getFile('file_bukti');

        if ($file->isValid() && !$file->hasMoved()) {
            // Generate nama acak untuk file
            $fileName = $file->getRandomName();
            $path = FCPATH . 'uploads/bukti-pengalaman-kerja/' . $formatNama;

            // Pastikan direktori sudah ada
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            try {
                // Pindahkan file ke folder tujuan
                $file->move($path, $fileName);

                // Buat URL file
                $fileUrl = base_url('uploads/bukti-pengalaman-kerja/' . $formatNama . '/' . $fileName);

                // Insert data pelatihan ke database
                $this->pengalamanKerjaModel->insert([
                    'pendaftaran_id' => $getPendaftaran['pendaftaran_id'],
                    'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
                    'deskripsi_pekerjaan' => $this->request->getPost('deskripsi_pekerjaan'),
                    'posisi' => $this->request->getPost('posisi'),
                    'tahun_mulai' => $this->request->getPost('tahun_mulai'),
                    'tahun_selesai' => $this->request->getPost('tahun_selesai'),
                    'file_bukti' => $fileUrl, // Simpan URL file
                ]);

                // Redirect ke halaman step 2 dengan pesan sukses
                return redirect()->to('/aplikan/pendaftaran/step3')->with('success', 'Data pengalaman kerja berhasil disimpan');
            } catch (\Exception $e) {
                // Tangani error jika gagal mengupload file
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload file: ' . $e->getMessage());
            }
        }

        // Jika file tidak valid atau gagal diupload
        return redirect()->back()->withInput()->with('error', 'File tidak valid atau gagal diupload');
    }

    public function step4()
    {
        return $this->render('pendaftaran/step4');
    }

    public function saveStep4()
    {
        $email = session()->get('email');

        $getPendaftaran = $this->pendaftaranModel->where('email', $email)->first();
        $nama = $getPendaftaran['nama_lengkap'];
        $formatNama = str_replace(' ', '-', $nama);

        // Update validasi untuk hanya menerima PDF, JPG, JPEG, PNG
        $validationRule = [
            'file_ktp' => [
                'label' => 'File KTP',
                'rules' => 'uploaded[file_ktp]|ext_in[file_ktp,pdf,jpg,jpeg,png]|max_size[file_ktp,2048]',
            ],
            'file_kk' => [
                'label' => 'File KK',
                'rules' => 'uploaded[file_kk]|ext_in[file_kk,pdf,jpg,jpeg,png]|max_size[file_kk,2048]',
            ],
            'file_ijazah' => [
                'label' => 'File SKL',
                'rules' => 'uploaded[file_ijazah]|ext_in[file_ijazah,pdf,jpg,jpeg,png]|max_size[file_ijazah,2048]',
            ],

        ];

        // Validasi input
        if (!$this->validate($validationRule)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Ambil file yang diupload
        $fileKtp = $this->request->getFile('file_ktp');
        $fileKk = $this->request->getFile('file_kk');
        $fileIjazah = $this->request->getFile('file_ijazah');

        if ($fileKtp->isValid() && !$fileKtp->hasMoved() && $fileKk->isValid() && !$fileKk->hasMoved() && $fileIjazah->isValid() && !$fileIjazah->hasMoved()) {
            // Generate nama acak untuk file
            $fileNameKtp = $fileKtp->getRandomName();
            $fileNameKk = $fileKk->getRandomName();
            $fileNameIjazah = $fileIjazah->getRandomName();
            $path = FCPATH . 'uploads/bukti-pendukung/' . $formatNama;

            // Pastikan direktori sudah ada
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            try {
                // Pindahkan file ke folder tujuan
                $fileKtp->move($path, $fileNameKtp);
                $fileKk->move($path, $fileNameKk);
                $fileIjazah->move($path, $fileNameIjazah);

                // Buat URL file
                $fileUrlKtp = base_url('uploads/bukti-pendukung/' . $formatNama . '/' . $fileNameKtp);
                $fileUrlKk = base_url('uploads/bukti-pendukung/' . $formatNama . '/' . $fileNameKk);
                $fileUrlIjazah = base_url('uploads/bukti-pendukung/' . $formatNama . '/' . $fileNameIjazah);

                // Insert data pelatihan ke database
                $this->buktiPendukungModel->insert([
                    'pendaftaran_id' => $getPendaftaran['pendaftaran_id'],
                    'file_ktp' => $fileUrlKtp,
                    'file_kk' => $fileUrlKk,
                    'file_ijazah' => $fileUrlIjazah,
                ]);

                $this->pendaftaranModel->update($getPendaftaran['pendaftaran_id'], [
                    'status_pendaftaran' => 'submitted',
                ]);

                // Redirect ke halaman step 2 dengan pesan sukses
                return redirect()->to('/aplikan/pendaftaran/step3')->with('success', 'Data pengalaman kerja berhasil disimpan');
            } catch (\Exception $e) {
                // Tangani error jika gagal mengupload file
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload file: ' . $e->getMessage());
            }
        }

        // Jika file tidak valid atau gagal diupload
        return redirect()->back()->withInput()->with('error', 'File tidak valid atau gagal diupload');
    }
}

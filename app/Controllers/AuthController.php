<?php
namespace App\Controllers;

use App\Models\{UserModel, DetailAplikanModel, DetailAsesorModel, PertanyaanModel, ProdiModel, AsesorModel};
use CodeIgniter\I18n\Time;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        $pertanyaanModel = new PertanyaanModel();
        $prodiModel = new ProdiModel();
        $data['pertanyaan'] = $pertanyaanModel->findAll();
        $data['prodi'] = $prodiModel->findAll();

        return view('Auth/register', $data);
    }

    public function registerProcess()
    {
        $users = new UserModel();
        $detailAplikan = new DetailAplikanModel();

        $email = trim(strtolower($this->request->getPost('email')));

        //proses cek email (1 akun hanya bisa 1 email)
        $checkEmail = $users->where('email', $email)->first();
        if ($checkEmail) {
            return redirect()->to('/register')->with('error', 'Email sudah terdaftar!');
        }

        $password = $this->request->getPost('password');
        $passHash = strtoupper(md5(strtoupper(md5($email)) . 'P@ssw0rd' . $password));

        if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->to('/register')->with('error', 'Email tidak valid');
        }

        //save ke tabel users
        $users->save([
            'email' => $email,
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'password' => $passHash,
            'role' => 'aplikan',
            'status' => 'Y',
        ]);

        //save ke tabel detail_aplikan
        $insertDetailAplikan = $detailAplikan->save([
            'email' => $email,
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => '+62' . $this->request->getPost('telepon'),
            'prodi_id' => $this->request->getPost('prodi_id'),
            'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
            'nama_asal_sekolah' => $this->request->getPost('nama_asal_sekolah'),
            'tahun_lulus' => $this->request->getPost('tahun_lulus'),
            'asal_informasi' => $this->request->getPost('asal_informasi'),
            'asal_informasi_lainnya' => $this->request->getPost('asal_informasi_lainnya'),
            'pertanyaan_id' => $this->request->getPost('pertanyaan_id'),
            'jawaban' => $this->request->getPost('jawaban')
        ]);

        //proses kirim email
        if ($insertDetailAplikan) {
            $attributes = [
                'to' => $email,
                'subject' => 'Registrasi Berhasil',
                'message' => 'Registrasi berhasil, silahkan login ke Web RPL'
            ];

            try {
                $sendEmail = kirimEmail($attributes);

                if ($sendEmail) {
                    return redirect()->to('/login')->with('success', 'Registrasi berhasil');
                } else {
                    return redirect()->to('/register')->with('error', 'Registrasi gagal!');
                }
            } catch (\Exception $e) {
                return redirect()->to('/register')->with('error', 'Error: ' . $e->getMessage());
            }
        } else {
            return redirect()->to('/register')->with('error', 'Registrasi gagal dikirim!');
        }
    }

    public function login()
    {
        return view('Auth/login');
    }

    public function loginProcess()
    {
        $users = new UserModel();
        $email = trim(strtolower($this->request->getPost('email')));
        $password = $this->request->getPost('password');

        $user = $users->where('email', $email)->first();

        if ($user) {
            $hashed = strtoupper(md5(strtoupper(md5($email)) . 'P@ssw0rd' . $password));
            if ($user['password'] === $hashed) {
                session()->set([
                    'user_id' => $user['id'],
                    'email' => $user['email'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'role' => $user['role'],
                    // 'pict' => $user['pict'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/dashboard');
            }
        }

        return redirect()->back()->with('error', 'Login gagal, email atau password salah!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah logout!');
    }

    public function viewForgotPassword()
    {
        $pertanyaanModel = new PertanyaanModel();
        $data['pertanyaan'] = $pertanyaanModel->findAll();
        return view('Auth/forgot-password', $data);
    }

    public function forgotPassword()
    {
        $users = new UserModel();
        $aplikan = new DetailAplikanModel();
        $asesor = new DetailAsesorModel();

        $email = $this->request->getPost('email');
        $pertanyaan = $this->request->getPost('question');
        $jawaban = $this->request->getPost('answer');

        $user = $users->where('email', $email)->first();
        if (!$user) {
            return redirect()->to('/forgot-password')->with('error', 'Email tidak terdaftar!');
        }

        if ($user['role'] == 'aplikan') {
            $dtl = $aplikan->where('email', $email)->first();
            if (!$dtl) {
                return redirect()->to('/forgot-password')->with('error', 'Data aplikan tidak ditemukan!');
            }

            if ($dtl['pertanyaan_id'] != $pertanyaan || strtolower($dtl['jawaban']) != strtolower($jawaban)) {
                return redirect()->to('/forgot-password')->with('error', 'Pertanyaan atau jawaban salah!');
            }
        }

        // Untuk role asesor, langsung lanjut tanpa cek pertanyaan
        return redirect()->to('/forgot-password')->with('show_reset_modal', true)->with('success', 'Verifikasi berhasil, silakan buat password baru.');
    }

    public function cekRoleByEmail()
    {
        $email = $this->request->getPost('email');
        $user = (new UserModel())->where('email', $email)->first();
        return $this->response->setJSON([
            'role' => $user['role'] ?? null
        ]);
    }

    public function resetPassword()
    {
        $email = $this->request->getPost('email');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($newPassword !== $confirmPassword) {
            return redirect()->to('/forgot-password')->with('error', 'Password tidak cocok!')->with('show_reset_modal', true);
        }

        $users = new UserModel();
        $user = $users->where('email', $email)->first();

        if (!$user) {
            return redirect()->to('/forgot-password')->with('error', 'User tidak ditemukan!');
        }

        $hashed = strtoupper(md5(strtoupper(md5($email)) . 'P@ssw0rd' . $newPassword));

        $users->update($user['id'], [
            'password' => $hashed
        ]);

        return redirect()->to('/login')->with('success', 'Password berhasil diubah! Silakan login.');
    }

}
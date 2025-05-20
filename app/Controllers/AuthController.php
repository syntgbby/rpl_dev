<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PertanyaanModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Controller;
use App\Helpers\send_email;

class AuthController extends Controller
{
    public function register()
    {
        $pertanyaanModel = new PertanyaanModel();
        $data['pertanyaan'] = $pertanyaanModel->findAll();

        return view('Auth/register', $data);
    }

    public function registerProcess()
    {
        $users = new UserModel();

        $email = strtolower($this->request->getPost('email'));
        $password = $this->request->getPost('password');
        $passHash = strtoupper(md5(strtoupper(md5($email)) . 'P@ssw0rd' . $password));

        $addUser = $users->save([
            'username' => ucwords($this->request->getPost('username')),
            'email' => $email,
            'password' => $passHash,
            'role' => 'aplikan',
            'status' => 'Y',
            'pertanyaan_id' => $this->request->getPost('pertanyaan_id'),
            'jawaban' => $this->request->getPost('jawaban')
        ]);

        $attributes = [
            'from' => 'noreply@example.com',
            'fromName' => 'Example',
            'to' => $email,
            'subject' => 'Registrasi Berhasil',
            'message' => 'Registrasi berhasil, silahkan login ke aplikasi'
        ];
        
        kirimEmail($attributes);

        if ($addUser) {
            return redirect()->to('/login')->with('success', 'Registrasi berhasil');
        } else {
            return redirect()->to('/register')->with('error', 'Registrasi gagal');
        }
    }

    public function login()
    {
        return view('Auth/login');
    }

    public function loginProcess()
    {
        $users = new UserModel();
        $email = strtolower($this->request->getPost('email'));
        $password = $this->request->getPost('password');

        $user = $users->where('email', $email)->first();

        if ($user) {
            $hashed = strtoupper(md5(strtoupper(md5($email)) . 'P@ssw0rd' . $password));
            if ($user['password'] === $hashed) {
                session()->set([
                    'user_id' => $user['id'],
                    'name' => $user['username'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'pict' => $user['pict'],
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
        return redirect()->to('/')->with('success', 'Logout berhasil');
    }
}
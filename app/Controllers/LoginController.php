<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $session = session();
        $login = $session->get('is_login');

        if ($login == TRUE) {
            return redirect()->to('/dashboard');
        } else {
            return view('Auth/login');
        }
    }

    public function authenticate()
    {
        $session = session();
        $data = $this->request->getPost();
        $email = strtolower($data['email']);
        $password = strtoupper(md5($data['password']));

        // Fetch user data from database
        $db = \Config\Database::connect();
        $builder = $db->table('v_users');
        $user = $builder->where(['email' => $email, 'status' => 'Y'])->get()->getRowArray();

        if ($user) {
            $passHash = strtoupper(md5(strtoupper(md5($email)) . 'P@ssw0rd' . $password));
            if ($passHash == $user['password']) {
                $session->set([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'group_cd' => $user['group_cd'],
                    'pict' => $user['pict'],
                    'rowid' => $user['rowid'],
                    'is_login' => TRUE,
                ]);

                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/')->with('alert', 'Wrong Password!');
            }
        } else {
            return redirect()->to('/')->with('alert', 'User is not valid!');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('is_login');
        $session->destroy();
        return redirect()->to('/')->with('alert', 'Already logged out!');
    }
}

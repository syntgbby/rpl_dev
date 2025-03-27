<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Auth/register');
    }

    public function register()
    {
        $data = $this->request->getVar();

        $name = $data['name'];
        $email = strtolower($data['email']);
        $password = strtoupper(md5($data['password']));
        $question = $data['question'];
        $answer = $data['answer'];

        $passHash = strtoupper(md5(strtoupper(md5($email)) . 'P@ssw0rd' . $password));
        
        date_default_timezone_set('Asia/Jakarta');
        $data_date = date('Y-m-d H:i:s');

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $passHash,
            'question' => $question,
            'answer' => $answer,
            'is_reset' => 0,
            'group_cd' => 'APL',
            'status' => 'Y',
            'data_date' => $data_date
        ];

        // Fetch user data from database
        $db = \Config\Database::connect();
        $builder = $db->table('v_users');
        $user = $builder->where(['email' => $email, 'status' => 'Y'])->get()->getRowArray();

        if ($user) {
            $response = [
                'status' => 'error',
                'message' => 'User is already registered!'
            ];
            return $this->response->setJSON($response);
        } else {
            $query = $db->table("users")->insert($data);

            if ($query) {
                $response = [
                    'status' => 'success',
                    'message' => 'User Successfully Registered!'
                ];
                return $this->response->setJSON($response);
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'User Registration Failed!'
                ];
                return $this->response->setJSON($response);
            }
        }
    }

    public function viewFPass()
    {
        return view('Auth/f_pass');
    }

    public function indexAddPelatihan()
    {
        return view('RegisterUsers/AddPelatihan');
    }
}

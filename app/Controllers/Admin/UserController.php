<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();

        return $this->render('Admin/Users/index', $data);
    }

    public function create()
    {
        return $this->render('Admin/Users/form');
    }

    public function store()
    {
        $model = new UserModel();

        $datas = $this->request->getPost();

        $email = strtolower($datas['email']);
        $username = ucwords($datas['username']);
        $passHash = strtoupper(md5(strtoupper(md5($email)) . 'P@ssw0rd' . $datas['password']));
        $role = $datas['role'];
        $status = $datas['status'];

        $data = [
            'email' => $email,
            'username' => $username,
            'password' => $passHash,
            'role' => $role,
            'status' => $status,
        ];

        $model->save($data);

        return redirect()->to('/admin/users');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['dtuser'] = $model->find($id);

        return $this->render('Admin/Users/form', $data);
    }

    public function update($id)
    {
        $model = new UserModel();

        $datas = $this->request->getPost();

        $email = strtolower($datas['email']);
        $username = ucwords($datas['username']);
        $role = $datas['role'];
        $status = $datas['status'];

        $data = [
            'username' => $username,
            'email' => $email,
            'role' => $role,
            'status' => $status,
        ];

        $model->update($id, $data);

        return redirect()->to('/admin/users');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);

        return redirect()->to('/admin/users');
    }
}
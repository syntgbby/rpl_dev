<?php

namespace App\Controllers\Admin;

use App\Models\{UserModel};
use App\Controllers\BaseController;

class ValidasiAplikanController extends BaseController
{
    public function index()
    {
        return $this->render('Admin/ValidasiAplikan/index');
    }

    public function getTable()
    {
        $request = service('request');
        $db = \Config\Database::connect();
        $builder = $db->table('view_aplikan'); // view dari ViewCapaian.php

        // Total data sebelum filter
        $total = $builder->countAllResults(false);

        // Search
        $search = $request->getGet('search')['value'];
        if (!empty($search)) {
            $builder->groupStart()
                ->like('nama_lengkap', $search)
                ->orLike('email', $search)
                ->groupEnd();
        }

        $filtered = $builder->countAllResults(false);

        // Pagination & ordering
        $start = $request->getGet('start');
        $length = $request->getGet('length');
        $builder->limit($length, $start);

        $orderColumnIndex = $request->getGet('order')[0]['column'];
        $orderDirection = $request->getGet('order')[0]['dir'];
        $columns = ['id', 'nama_lengkap', 'email', 'bukti_pembayaran', 'status'];
        $builder->orderBy($columns[$orderColumnIndex] ?? 'id', $orderDirection);

        // Get data
        $data = $builder->get()->getResultArray();

        // Response sesuai format DataTables
        return $this->response->setJSON([
            'draw' => intval($request->getGet('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data
        ]);
    }
    public function approveAplikan($id)
    {
        $model = new UserModel();
        $cekdata = $model->where('id', $id)->first();
        $email = $cekdata['email'];
        $nama = $cekdata['nama_lengkap'];

        $approval = $model->update($id, ['status' => 'Y']);

        if ($approval) {
            $dataEmail = [
                'email' => $email,
                'nama' => $nama
            ];

            helper('url');
            $htmlEmail = view('ContentEmail/approval_aplikan', $dataEmail);

            $attributes = [
                'to' => $email,
                'subject' => 'Registrasi Berhasil!',
                'message' => $htmlEmail
            ];

            try {
                $sendEmail = kirimEmail($attributes);

                if ($sendEmail) {
                    return redirect()->to('/admin/validasi-aplikan')->with('success', 'Validasi bukti pembayaran berhasil');
                } else {
                    return redirect()->to('/admin/validasi-aplikan')->with('error', 'Validasi bukti pembayaran gagal!');
                }
            } catch (\Exception $e) {
                return redirect()->to('/admin/validasi-aplikan')->with('error', 'Error: ' . $e->getMessage());
            }
        } else {
            return redirect()->to('/admin/validasi-aplikan')->with('error', 'User gagal divalidasi!');
        }
    }
}
<?php

namespace App\Controllers\Admin;

use App\Models\View\ViewKurikulum;
use App\Models\MataKuliahModel;
use App\Models\KurikulumModel;
use App\Models\ProdiModel;
use App\Models\TahunAjarModel;
use App\Controllers\BaseController;

class KurikulumController extends BaseController
{
    // Tampilan Index
    public function index()
    {
        return $this->render('Admin/Kurikulum/index');
    }

    // Get Table 
    public function getTable()
    {
        $request = service('request');
        $db = \Config\Database::connect();
        $builder = $db->table('view_kurikulum'); // view dari ViewCapaian.php

        // Total data sebelum filter
        $total = $builder->countAllResults(false);

        // Search
        $search = $request->getGet('search')['value'];
        if (!empty($search)) {
            $builder->groupStart()
                ->like('nama_prodi', $search)
                ->orLike('kode_matkul', $search)
                ->orLike('tahun', $search)
                ->orLike('nama_matkul', $search)
                ->orLike('sks', $search)
                ->groupEnd();
        }

        $filtered = $builder->countAllResults(false);

        // Pagination & ordering
        $start = $request->getGet('start');
        $length = $request->getGet('length');
        $builder->limit($length, $start);

        $orderColumnIndex = $request->getGet('order')[0]['column'];
        $orderDirection = $request->getGet('order')[0]['dir'];
        $columns = ['id', 'nama_prodi', 'kode_matkul', 'nama_matkul', 'tahun', 'sks', 'status'];
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

    // Tampilan Form Tambah Kurikulum
    public function create()
    {
        $prodi = new ProdiModel();
        $tahunAjar = new TahunAjarModel();
        $mataKuliah = new MataKuliahModel();

        $data['prodi'] = $prodi->orderBy('nama_prodi', 'ASC')->findAll();
        $data['tahun_ajar'] = $tahunAjar->findAll();
        $data['mata_kuliah'] = $mataKuliah->where('status', 'Y')->orderBy('nama_matkul', 'ASC')->findAll();

        return $this->render('Admin/Kurikulum/form', $data);
    }

    // Proses Tambah Kurikulum
    public function store()
    {
        $model = new KurikulumModel();

        $checkKurikulum = $model->where('tahun_ajar_id', $this->request->getPost('tahun_ajar_id'))
            ->where('prodi_id', $this->request->getPost('prodi_id'))
            ->where('kode_matkul', $this->request->getPost('kode_matkul'))
            ->findAll();

        if ($checkKurikulum) {
            return redirect()->to('/admin/kurikulum')->with('error', 'Kurikulum sudah ada!');
        }

        $data = [
            'prodi_id' => $this->request->getPost('prodi_id'),
            'tahun_ajar_id' => $this->request->getPost('tahun_ajar_id'),
            'kode_matkul' => $this->request->getPost('kode_matkul'),
            'status' => $this->request->getPost('status'),
        ];

        $insert = $model->save($data);

        if ($insert) {
            return redirect()->to('/admin/kurikulum')->with('success', 'Kurikulum berhasil ditambahkan!');
        } else {
            return redirect()->to('/admin/kurikulum')->with('error', 'Kurikulum gagal ditambahkan!');
        }
    }

    // Tampilan Form Edit Kurikulum
    public function edit($id)
    {
        $model = new KurikulumModel();
        $data['dtkurikulum'] = $model->find($id);

        $prodi = new ProdiModel();
        $tahunAjar = new TahunAjarModel();
        $mataKuliah = new MataKuliahModel();

        $data['prodi'] = $prodi->findAll();
        $data['tahun_ajar'] = $tahunAjar->findAll();
        $data['mata_kuliah'] = $mataKuliah->where('status', 'Y')->findAll();

        return $this->render('Admin/Kurikulum/form', $data);
    }

    // Proses Edit Kurikulum
    public function update($id)
    {
        $model = new KurikulumModel();

        $checkKurikulum = $model->where('tahun_ajar_id', $this->request->getPost('tahun_ajar_id'))
            ->where('prodi_id', $this->request->getPost('prodi_id'))
            ->where('kode_matkul', $this->request->getPost('kode_matkul'))
            ->findAll();

        if ($checkKurikulum) {
            return redirect()->to('/admin/kurikulum')->with('error', 'Kurikulum sudah ada!');
        }

        $data = [
            'prodi_id' => $this->request->getPost('prodi_id'),
            'tahun_ajar_id' => $this->request->getPost('tahun_ajar_id'),
            'kode_matkul' => $this->request->getPost('kode_matkul'),
            'status' => $this->request->getPost('status'),
        ];

        $update = $model->update($id, $data);

        if ($update) {
            return redirect()->to('/admin/kurikulum')->with('success', 'Kurikulum berhasil diubah!');
        } else {
            return redirect()->to('/admin/kurikulum')->with('error', 'Kurikulum gagal diubah!');
        }
    }

    // Proses Hapus Kurikulum
    public function delete($id)
    {
        $model = new KurikulumModel();

        $delete = $model->delete($id);

        if ($delete) {
            return redirect()->to('/admin/kurikulum')->with('success', 'Kurikulum berhasil dihapus!');
        } else {
            return redirect()->to('/admin/kurikulum')->with('error', 'Kurikulum gagal dihapus!');
        }
    }
}
<?php

namespace App\Controllers;

class MasterMenuController extends BaseController
{
    public function index(): string
    {
        $db = \Config\Database::connect();
        $query = $db->table("master_menu")->get()->getResultArray();

        $data = [
            'data' => $query
        ];

        return $this->render('MasterMenu/master_menu', $data);
    }

    public function indexAdd()
    {
        return $this->render('MasterMenu/add_menu');
    }

    public function getById($rowid)
    {
        $db = \Config\Database::connect();
        $query = $db->table("master_menu")->where("rowid", $rowid)->get()->getResultArray();

        if ($query) {
            return $this->response->setJSON($query);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Menu not found']);
        }
    }

    public function store()
    {
        $data = $this->request->getVar();
        $db = \Config\Database::connect();

        $rowid = $data['rowid'];
        $menu_cd = $data['menu_cd'];
        $title = $data['title'];
        $url = $data['url'];
        $parent_menucd = $data['parent_menucd'];
        $icon = $data['icon'];
        $order_seq = $data['order_seq'];
        $status = $data['status'];

        date_default_timezone_set('Asia/Jakarta');
        $data_date = date('Y-m-d H:i:s');

        $data_insert = [
            'menu_cd' => $menu_cd,
            'title' => $title,
            'url' => $url,
            'parent_menucd' => $parent_menucd,
            'icon' => $icon,
            'order_seq' => $order_seq,
            'status' => $status,
            'data_date' => $data_date
        ];

        if ($rowid == 0) {
            $query = $db->table("master_menu")->insert($data_insert);

            if ($query) {
                $response = [
                    'status' => 'success',
                    'message' => 'Menu added successfully'
                ];
                return $this->response->setJSON($response);
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Menu added failed'
                ];
                return $this->response->setJSON($response);
            }
        } else {
            $query = $db->table("master_menu")->where("rowid", $rowid)->update($data_insert);

            if ($query) {
                $response = [
                    'status' => 'success',
                    'message' => 'Menu updated successfully'
                ];
                return $this->response->setJSON($response);
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Menu updated failed'
                ];
                return $this->response->setJSON($response);
            }
        }

        return redirect()->to('/master-menu');
    }

    public function delete()
    {
        $data = $this->request->getVar();
        $rowid = $data['rowid'];

        $db = \Config\Database::connect();
        
        $query = $db->table("master_menu")->where("rowid", $rowid)->delete();

        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Menu deleted successfully'
            ];
            return $this->response->setJSON($response);
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Menu deleted failed'
            ];
            return $this->response->setJSON($response);
        }

        return redirect()->to('/master-menu');
    }

}

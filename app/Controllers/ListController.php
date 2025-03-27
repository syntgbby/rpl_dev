<?php

namespace App\Controllers;

class ListController extends BaseController
{
    public function index()
    {
        return $this->render('list/v_list_pendaftaran');
    }
}

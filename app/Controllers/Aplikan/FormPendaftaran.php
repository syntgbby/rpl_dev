<?php

namespace App\Controllers\Aplikan;

use App\Controllers\BaseController;

class FormPendaftaran extends BaseController
{
    public function index(): string
    {
        return $this->render('Aplikan/FormPendaftaran/form_regist');
    }

    public function addPK()
    {
        return $this->render('Aplikan/FormPendaftaran/Steps/add-pk');
    }

    public function store()
    {
        $data = $this->request->getVar();
        dd($data);
    }
}

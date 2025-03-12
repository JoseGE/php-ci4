<?php

namespace App\Controllers;

use App\Models\AyuntamientoModel;

class Ayuntamiento extends BaseController
{
    public function index()
    {
        $ayuntamientoModal = new AyuntamientoModel();
        $data = [
            "ayuntamientos" => $ayuntamientoModal->findAll(),
        ];
        var_dump($data);
    }
}

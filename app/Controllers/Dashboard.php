<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        var_dump($session->get("gestor"));
        $facturaModel = model("FacturaModel");
        $facturas = $facturaModel->findAll();
        // var_dump($facturas);

        return view("dashboard/dashboard", ["facturas" => $facturas]);
    }
}

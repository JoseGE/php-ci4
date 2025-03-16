<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        $facturaModel = model("Factura");
        $facturas = $facturaModel->findAll();
        // var_dump($facturas);

        return view("dashboard", ["facturas" => $facturas]);
    }
}

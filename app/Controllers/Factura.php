<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Factura extends BaseController
{
    public function index()
    {
        return view("factura/crear_factura");
    }

    public function listar()
    {
        $facturas = \App\Models\FacturaModel::findAll();
        return view("factura/listar_facturas", ["facturas" => $facturas]);
    }

    public function crear()
    {
        $validations = \Config\Services::validation();
        $validations->setRules([
            "contribuyente" => "required|numeric",
            "monto" => "required|decimal",
            "nota" => "string",
        ]);

        $factura = new \App\Models\FacturaModel();
        $factura->insert([
            "contribuyenteId" => $this->request->getPost("contribuyente"),
            "monto" => $this->request->getPost("monto"),
            "nota" => $this->request->getPost("nota"),
        ]);
        var_dump($factura);
        // return redirect()->to("/dashboard");
    }
}

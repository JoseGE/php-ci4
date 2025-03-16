<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        return view("auth/login");
    }

    public function login()
    {
        $validations = \Config\Services::validation();
        $validations->setRules([
            "telefono" => "required|numeric|min_length[10]|max_length[10]",
            "clave" => "required|min_length[6]|max_length[20]",
        ]);
        if ($validations->run($_POST)) {
            $gestorModel = new \App\Models\Gestor();
            $gestor = $gestorModel
                ->where("telefono", $_POST["telefono"])
                ->where("clave", $_POST["clave"])
                ->first();
            $session = \Config\Services::session();
            $session->set("gestor", $gestor);
            return redirect()->to("/dashboard");
        } else {
            var_dump($validations->getErrors());
        }
    }
}

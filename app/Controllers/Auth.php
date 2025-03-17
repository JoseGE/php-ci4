<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function index()
    {
        return view("auth/login");
    }

    public function login()
    {
        $validations = \Config\Services::validation();

        $input = $this->getRequestInput();
        if ($validations->run($input, "auth")) {
            $gestorModel = new \App\Models\Gestor();
            $gestor = $gestorModel
                ->where("telefono", $input["telefono"])
                ->where("clave", $input["clave"])
                ->first();

            $iat = time();
            $payload = [
                "id" => $gestor->id,
                "iat" => $iat,
                "exp" => $iat + 60,
            ];
            $token = \Firebase\JWT\JWT::encode($payload, "municipia", "HS256");

            return $this->setResponse(["user" => $gestor, "token" => $token]);
        } else {
            return $this->setResponse(
                ["errors" => $validations->getErrors()],
                ResponseInterface::HTTP_BAD_REQUEST
            );
        }
    }
}

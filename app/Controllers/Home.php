<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view("welcome_message");
    }

    public function about(): string
    {
        return "Sobre nosotros";
    }

    public function ayuntamiento($cod): string
    {
        return "Soy el ayuntamiento $cod";
    }
}

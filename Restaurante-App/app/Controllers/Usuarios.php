<?php

namespace App\Controllers;

class Usuarios extends BaseController
{
    public function index()
    {
        return view('pages/usuarios'); // Carga la vista correcta
    }
}

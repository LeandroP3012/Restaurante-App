<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('index'); // Carga la vista 'index.php' en app/Views/
    }
}

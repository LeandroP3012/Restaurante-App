<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class PruebaDB extends Controller
{
    public function index()
    {
        $db = Database::connect();
        if ($db->connect()) {
            echo "Conexión exitosa a la base de datos.";
        } else {
            echo "Error en la conexión.";
        }
    }
}
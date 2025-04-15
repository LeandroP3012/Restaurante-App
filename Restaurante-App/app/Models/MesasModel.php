<?php

namespace App\Models;

use CodeIgniter\Model;

class MesasModel extends Model
{
    protected $table      = 'Mesas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['numero_mesa', 'capacidad', 'estado', 'personas_ocupando'];
}

<?php
namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model {
    protected $table = 'pedidos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['mesa_id', 'adultos', 'ninos', 'estado', 'detalles'];
}


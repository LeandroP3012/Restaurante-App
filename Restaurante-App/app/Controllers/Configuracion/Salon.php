<?php

namespace App\Controllers\Configuracion;

use App\Controllers\BaseController;
use App\Models\MesasModel;
use CodeIgniter\HTTP\ResponseInterface;

class Salon extends BaseController
{
    public function index()
    {
        $model = new MesasModel();
        $data['mesas'] = $model->findAll(); // Obtiene todas las mesas almacenadas

        return view('pages/configuracion/salon', $data);
    }

    public function store()
    {
        $model = new MesasModel();
    
        $data = [
            'numero_mesa' => $this->request->getPost('numero_mesa'),
            'capacidad'    => $this->request->getPost('capacidad'),
        ];
    
        if ($model->insert($data)) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Error al guardar la mesa']);
        }
    }
    
    public function getMesas()
    {
        $model = new MesasModel();
        return $this->response->setJSON($model->findAll()); // Devuelve todas las mesas en JSON
    }
    
}

<?php

namespace App\Controllers\Atencion;

use App\Controllers\BaseController;
use App\Models\MesasModel;
use CodeIgniter\HTTP\ResponseInterface;

class Salon extends BaseController
{
    public function index()
    {
        return view('pages/atencion/salon');
    }

    public function getMesas()
    {
        $model = new MesasModel();
        return $this->response->setJSON($model->findAll()); // Devuelve todas las mesas con su estado
    }

    public function asignarMesa()
    {
        $model = new MesasModel();
        $mesaId = $this->request->getPost('mesa_id');
        $personas = $this->request->getPost('cantidad_personas');

        $mesa = $model->find($mesaId);
        if ($mesa && $mesa['estado'] == 'disponible') {
            $model->update($mesaId, ['estado' => 'ocupada', 'personas_ocupando' => $personas]);
            return $this->response->setJSON(['status' => 'success']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Mesa no disponible']);
    }

    public function liberarMesa()
    {
        $model = new MesasModel();
        $mesaId = $this->request->getPost('mesa_id');

        $mesa = $model->find($mesaId);
        if ($mesa && $mesa['estado'] == 'ocupada') {
            $model->update($mesaId, ['estado' => 'disponible', 'personas_ocupando' => 0]);
            return $this->response->setJSON(['status' => 'success']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al liberar la mesa']);
    }
    public function guardarPedido()
    {
        $request = service('request');
        $data = json_decode($request->getBody(), true);
    
        if (!$data || !isset($data['mesa_id']) || empty($data['pedido'])) {
            return $this->response->setJSON(['success' => false, 'message' => 'Datos incompletos']);
        }
    
        $pedidoModel = new \App\Models\PedidoModel();
        $mesaModel = new \App\Models\MesasModel(); // Modelo de mesas
    
        $pedidoData = [
            'mesa_id'  => $data['mesa_id'],
            'adultos'  => $data['adultos'],
            'ninos'    => $data['ninos'],
            'estado'   => 'pendiente',
            'detalles' => json_encode($data['pedido'])
        ];
    
        if ($pedidoModel->insert($pedidoData)) {
            // 🔴 Actualizar el estado de la mesa a "ocupada"
            $mesaModel->update($data['mesa_id'], ['estado' => 'ocupada']);
            
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'No se pudo guardar']);
        }
    }
    

}

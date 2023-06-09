<?php

namespace App\Controllers;

use App\Models\CabeceraCompraModel;
use \App\Models\UserModel;

class CabeceraCompraController extends BaseController
{
    public function index()
    {
        $cabeceraCompraModel = new CabeceraCompraModel();

        // Obtener los usuarios
        $usuarioModel = new UserModel();
        $usuarios = $usuarioModel->getUsers();

        $data = [
            'title' => 'Smart Home Corrientes | Lista de ventas',
            'compras' => $cabeceraCompraModel->findAll(),
            'usuarios' => $usuarios,
        ];

        echo view('header',  $data);
        echo view('cabecera_compra', $data);
        //echo view('footer');
    }
}

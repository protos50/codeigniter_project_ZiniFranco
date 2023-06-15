<?php

namespace App\Controllers;

use App\Models\CabeceraCompraModel;
use CodeIgniter\Controller;

class ConfirmationController extends Controller
{
    public function index($compraId)
    {
        $cabeceraCompraModel = new CabeceraCompraModel();
        $compra = $cabeceraCompraModel->getCompraById($compraId);
    
        $data = [
            'title' => 'Confirmación de compra',
        ];
        // Cargar la vista de confirmación
        return view('header', $data) . view('confirmation_view', ['compra' => $compra]) . view('footer');
    }
}

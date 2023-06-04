<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ConfirmationController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Confirmación de compra',
        ];
        // Cargar la vista de confirmación
        return view('header', $data) . view('confirmation_view') . view('footer');
    }
}

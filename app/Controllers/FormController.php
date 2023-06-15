<?php

namespace App\Controllers;

use App\Models\FormModel;

class FormController extends BaseController
{
    public function guardarDatos()
    {

        // Obtener los valores del formulario
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $message = $this->request->getPost('message');

        // Crear una instancia del modelo
        $formModel = new FormModel();

        // Guardar los datos en la base de datos
        $data = [
            'nombre' => $name,
            'email' => $email,
            'telefono' => $phone,
            'mensaje' => $message,
            'usuario' => session()->has('id_usuario') ? 'si' : 'no',
        ];

        $formModel->insert($data);

        $data2 = [
            'title' => 'Smart Home Corrientes | Confirmacion envio de formulario',

        ];
        echo view('header',  $data2);
        echo view('confirmation_form');
        echo view('footer');
    }
}

<?php

namespace App\Controllers;

use App\Models\RegisterModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        // Carga vista del registro 
        $data = ['title' => 'Smart Home Corrientes | Login'];
        echo view('header',  $data);
        echo view('register_view');
        echo view('footer');
    }

    public function process_registration()
    {
        // Get user input
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'usuario' => $this->request->getPost('usuario'),
            'pass' => $this->request->getPost('pass'),
            'perfil_id' => 2, // Default profile ID
            'baja' => 'no' // valor por defecto para el compo "baja" 
        ];

        // Validate user input if needed

        // Save user data to the database
        $registerModel = new RegisterModel();
        $registerModel->save($data);

        // Redirect to the login page or any other page
        return redirect()->to(base_url('/login'));
    }
}

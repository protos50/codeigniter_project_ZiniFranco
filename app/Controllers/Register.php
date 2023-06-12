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
        echo view('register_view', $data);
        echo view('footer');
    }

    public function process_registration()
    {
        $direccion = $this->request->getPost('direccion');
        $telefono = $this->request->getPost('telefono');

        if ($direccion == '') {
            $direccion = "NO REGISTRADO";
        }

        if ($telefono == '') {
            $telefono = "NO REGISTRADO";
        }

        // Validate user input if needed
        $rules = [
            'nombre' => 'required|min_length[2]|max_length[50]',
            'apellido' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario' => 'required|min_length[2]|max_length[50]|is_unique[usuarios.usuario]',
            'pass' => 'required|min_length[4]|max_length[50]'
        ];

        if ($this->validate($rules)) {
            // Get user input
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'direccion' => $direccion,
                'telefono' => $telefono,
                'email' => $this->request->getPost('email'),
                'usuario' => $this->request->getPost('usuario'),
                'pass' => $this->request->getPost('pass'),
                'perfil_id' => 2, // Default profile ID
                'baja' => 'no' // valor por defecto para el compo "baja" 
            ];

            // Save user data to the database
            $registerModel = new RegisterModel();
            $registerModel->save($data);

            // Redirect to the login page or any other page
            return redirect()->to(base_url('/login'));
        } else {
            // Carga vista del registro 

            $data = ['title' => 'Smart Home Corrientes | Login'];
            $data['validation'] = $this->validator;

            echo view('header', $data);
            echo view('register_view', $data);
            echo view('footer');
        }
    }
}

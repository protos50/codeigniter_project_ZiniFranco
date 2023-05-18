<?php
namespace App\Controllers;

use App\Models\RegisterModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        // Load the registration view
        return view('register_view');
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
            'baja' => 'no' // Default value for the "baja" field
        ];

        // Validate user input if needed

        // Save user data to the database
        $registerModel = new RegisterModel();
        $registerModel->save($data);

        // Redirect to the login page or any other page
        return redirect()->to('login');
    }
}

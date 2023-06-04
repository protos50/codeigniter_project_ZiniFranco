<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->getUsers();

        $data = ['title' => 'Smart Home Corrientes | Usuarios'];
        echo view('header',  $data);
        echo view('user_list', ['users' => $users]);
        echo view('footer');
    }

    public function toggleBaja($userId)
    {
        $userModel = new UserModel();
        $user = $userModel->getUserById($userId);

        if ($user) {
            // Cambiar el estado de baja
            $baja = ($user['baja'] == 'si') ? 'no' : 'si';

            // Actualizar el estado en la base de datos
            $userModel->updateUserBaja($userId, $baja);
        }

        // Redirigir a la página de la lista de usuarios
        return redirect()->to(base_url('/admin'));
    }
    
}

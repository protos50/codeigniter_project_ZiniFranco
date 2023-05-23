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

        // Vista login
        $data = ['title' => 'Smart Home Corrientes | Usuarios'];
        echo view('header',  $data);
        echo view('user_list', ['users' => $users]);
        echo view('footer');
    }
}

<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        // verifica si el usuario se encuentra logeado
        if ($this->isLoggedIn()) {
            // en caso estar logeado redirecciono al dashboard
            return redirect()->to(base_url('/dashboard'));
        }

        // Vista login
        $data = ['title' => 'Smart Home Corrientes | Login'];
        echo view('header',  $data);
        echo view('login_view');
        echo view('footer');
    }

    // funcion que verifica si el usuario se encuentra en sesion
    private function isLoggedIn()
    {
        $session = session();
        return $session->has('user_id');
    }

    public function process_login()
    {
        // obtener los datos del usuario
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // validar credenciales del ususario
        $loginModel = new LoginModel();
        $user = $loginModel->validateUser($username, $password);

        if ($user) {
            // establece los datos de la sesion del usuario
            $session = session();
            $session->set([
                'user_id' => $user->perfil_id,
                'username' => $user->usuario
            ]);

            // redirije al dashboard
            return redirect()->to(base_url('/dashboard'));
        } else {
            // en caso de login invalido, muestra mensaje de error(arreglar esto)
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        // destruye la sesion de usuario
        $session = session();
        $session->destroy();

        // redirige a la pagina del login
        return redirect()->to(base_url('/login'));
    }
}

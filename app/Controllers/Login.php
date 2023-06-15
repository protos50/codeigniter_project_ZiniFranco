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
        $session = session();

        // obtener los datos del usuario
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // validar credenciales del ususario
        $loginModel = new LoginModel();
        //$user = $loginModel->validateUser($username, $password);
        $data = $loginModel->where('usuario', $username)->first();



        if ($data) {
            // Verificar si el usuario está dado de baja
            if ($data->baja == 'si') {
                $session->setFlashdata('msg', 'El usuario está dado de baja.');
                return redirect()->to(base_url('/login'));
            }

            $pass = $data->pass;
            $authenticatePassword = password_verify($password, $pass);

            if ($authenticatePassword ) {
                // establece los datos de la sesion del usuario
                $session->set([
                    'user_id' => $data->perfil_id,
                    'id_usuario' => $data->id,
                    'username' => $data->usuario,
                    'nombre' => $data->nombre,
                    'apellido' => $data->apellido,
                    'email' => $data->email,
                ]);

                $session->setFlashdata('success', 'La Sesión se ha iniciada con éxito');

                if ($data->perfil_id == 1) {
                    return redirect()->to(base_url('/cabecera_compra'));
                } else {
                    return redirect()->to(base_url('/bienvenido'));
                }
            } else {
                $session->setFlashdata('msg', 'Contraseña Incorrecta.');
                return redirect()->to(base_url('/login'));
            }
        } else {
            // en caso de login invalido, muestra mensaje de error(arreglar esto)
            $session->setFlashdata('msg', 'Usuario Inexistente.');
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

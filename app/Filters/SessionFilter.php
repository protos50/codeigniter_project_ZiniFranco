<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SessionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Verificar si el valor 'id' existe en la sesión
        if (!$session->has('user_id')) {
            return redirect()->to('/');
        }

        // Obtener el valor del 'perfil_id' en la sesión
        $perfil_id = $session->get('user_id');

        // Verificar si el valor 'perfil_id' es igual a 1 (administrador)
        if ($perfil_id != 1) {
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}

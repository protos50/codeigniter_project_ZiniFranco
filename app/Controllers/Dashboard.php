<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // Check if the user is logged in
        if (!$this->isLoggedIn()) {
            // Redirect to the login page
            return redirect()->to(base_url('/login'));
        }

        // Carga la vista del dashboard
        $data = ['title' => 'Smart Home Corrientes | Dashboard'];
        echo view('header',  $data);
        echo view('dashboard_view');
        echo view('footer');
    }

    private function isLoggedIn()
    {
        $session = session();
        return $session->has('user_id');
    }
}

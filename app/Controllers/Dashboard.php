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
            return redirect()->to('login');
        }

        // Load the dashboard view
        return view('dashboard_view');
    }

    private function isLoggedIn()
    {
        $session = session();
        return $session->has('user_id');
    }
}

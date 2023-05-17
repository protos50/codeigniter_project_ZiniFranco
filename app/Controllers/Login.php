<?php
namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        // Load the login view
        return view('login_view');
    }

    public function process_login()
    {
        // Get user input
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validate user credentials
        $loginModel = new LoginModel();
        $user = $loginModel->validateUser($username, $password);

        if ($user) {
            // Set user session data
            $session = session();
            $session->set([
                'user_id' => $user->id,
                'username' => $user->usuario
            ]);

            // Redirect to the dashboard or any other authorized page
            return redirect()->to('dashboard');
        } else {
            // Invalid login, show error message
            $data['error'] = 'Invalid username or password.';
            return view('login_view', $data);
        }
    }

    public function logout()
    {
        // Destroy the user session
        $session = session();
        $session->destroy();

        // Redirect to the login page
        return redirect()->to('login');
    }
}

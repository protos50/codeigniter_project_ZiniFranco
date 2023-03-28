<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function principal() 
    {
        return view('principal.html');
    }

    public function plantilla() 
    {
        return view('plantilla.php');
    }
}

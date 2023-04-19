<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('header');
        echo view('principal');
        echo view('footer');
    }

    public function nosotros()
    {
        echo view('header');
        echo view('nosotros');
        echo view('footer');
    }

    public function comercializacion()
    {
        echo view('header');
        echo view('comercializacion');
        echo view('footer');
    }

    public function terminos()
    {
        echo view('header');
        echo view('terminos');
        echo view('footer');
    }

    public function contacto()
    {
        echo view('header');
        echo view('contacto');
        echo view('footer');
    }

    public function underConstruction()
    {
        echo view('header');
        echo view('under-construction');
        echo view('footer');
    }
}

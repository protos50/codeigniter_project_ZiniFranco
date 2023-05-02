<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Smart Home Corrientes | Principal'];
        echo view('header',  $data);
        echo view('principal');
        echo view('footer');
    }

    public function nosotros()
    {
        $data = ['title' => 'Smart Home Corrientes | Quienes Somos'];
        echo view('header',  $data);
        echo view('nosotros');
        echo view('footer');
    }

    public function comercializacion()
    {
        $data = ['title' => 'Smart Home Corrientes | Comercializacion'];
        echo view('header',  $data);
        echo view('comercializacion');
        echo view('footer');
    }

    public function terminos()
    {
        $data = ['title' => 'Smart Home Corrientes | Terminos y Condiciones'];
        echo view('header',  $data);
        echo view('terminos');
        echo view('footer');
    }

    public function contacto()
    {
        $data = ['title' => 'Smart Home Corrientes | Contacto'];
        echo view('header',  $data);
        echo view('contacto');
        echo view('footer');
    }

    public function underConstruction()
    {
        $data = ['title' => 'Smart Home Corrientes | Pagina en Construcion'];
        echo view('header',  $data);
        echo view('under-construction');
        echo view('footer');
    }
}

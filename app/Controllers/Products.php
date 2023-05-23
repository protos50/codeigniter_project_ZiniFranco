<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class Products extends Controller
{
    public function index()
    {
        // carga la vista del catalogo de productos
        $productModel = new ProductModel();
        $data_products['products'] = $productModel->getAllProducts();

        $data = ['title' => 'Smart Home Corrientes | Catalogo'];
        echo view('header',  $data);
        echo view('product_catalog_view', $data_products);
        echo view('footer');
    }
}

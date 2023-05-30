<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class Products extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();

        // Obtener el carrito de la sesión actual
        $cart = session()->get('cart');

        $data = [
            'products' => $productModel->getAllProducts(),
            'title' => 'Smart Home Corrientes | Catalogo',
        ];

         // Verificar si el carrito no está vacío
        if (isset($cart)) {
            $data['cart'] = $cart; // Pasar el carrito a la vista
        }

        echo view('header', $data);
        echo view('product_catalog_view', $data);
        echo view('footer');
    }
}

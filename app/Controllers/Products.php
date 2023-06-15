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
            'title' => 'Smart Home Corrientes | Catálogo',
        ];

        // Verificar si el carrito no está vacío
        if (isset($cart)) {
            $data['cart'] = $cart; // Pasar el carrito a la vista
        }

        echo view('header', $data);
        echo view('product_catalog_view', $data);
        echo view('footer');
    }

    public function toggleProductStatus($productId)
    {
        $productModel = new ProductModel();

        // Obtener el producto por su ID
        $product = $productModel->getProductById($productId);

        // Verificar si el producto existe
        if ($product) {
            // Verificar el estado actual del producto
            $currentStatus = $product['baja'];

            // Actualizar el estado del producto
            $newStatus = $currentStatus === 'no' ? 'si' : 'no';
            $productModel->update($productId, ['baja' => $newStatus]);

            // Redireccionar a la página de catálogo
            return redirect()->to(base_url('products'));
        }

        // Redireccionar a la página de catálogo con mensaje de error y el ID erróneo
        return redirect()->to(base_url('products'))->with('error', sprintf('El producto seleccionado tiene ID: %s el cual no existe. Seleccione otro producto.', $productId));
    }
}

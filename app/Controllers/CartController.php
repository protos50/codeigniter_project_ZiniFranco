<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class CartController extends Controller
{
    public function addToCart($productId)
    {
        // Cargar el modelo del catálogo de productos
        $productModel = new ProductModel();

        // Obtener detalles del producto por su ID
        $product = $productModel->getProductById($productId);

        // Verificar si el producto existe
        if ($product) {
            // Obtener el carrito de la sesión actual
            $cart = session()->get('cart');

            // Verificar si el carrito está vacío
            if (!$cart) {
                // Inicializar el carrito como un array vacío
                $cart = [];
            }

            // Verificar si el producto ya está en el carrito
            if (isset($cart[$productId])) {
                // Incrementar la cantidad del producto en el carrito
                $cart[$productId]['quantity']++;
            } else {
                // Agregar el producto al carrito con una cantidad inicial de 1
                $cart[$productId] = [
                    'product' => $product,
                    'quantity' => 1
                ];
            }

            // Actualizar el carrito en la sesión
            session()->set('cart', $cart);
        }

        // Redirigir a la página del carrito
        return redirect()->to('/cart');
    }

    public function viewCart()
    {
        // Obtener el carrito de la sesión actual
        $cart = session()->get('cart');

        // Cargar la vista del carrito y pasar los datos del carrito
        $data = [
            'title' => 'Smart Home Corrientes | Carrito',
            'cart' => $cart
        ];
        echo view('header', $data);
        echo view('cart_view', $data);
        echo view('footer');
    }
}

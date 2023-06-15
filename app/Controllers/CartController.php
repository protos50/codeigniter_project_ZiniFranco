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

                // Verificar si la cantidad supera el stock disponible
                if ($cart[$productId]['quantity'] > $product['stock']) {
                    // Restringir la cantidad al stock disponible
                    $cart[$productId]['quantity'] = $product['stock'];
                }
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
        //return redirect()->to(base_url('/cart'));
        return redirect()->back();
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

    public function increaseQuantity($productId)
    {
        // Cargar el modelo del catálogo de productos
        $productModel = new ProductModel();

        // Obtener detalles del producto por su ID
        $product = $productModel->getProductById($productId);

        // Verificar si el producto existe y el carrito no está vacío
        if ($product) {
            $cart = session()->get('cart');

            if ($cart && isset($cart[$productId])) {
                // Incrementar la cantidad del producto en el carrito
                $cart[$productId]['quantity']++;

                // Verificar si la cantidad supera el stock disponible
                if ($cart[$productId]['quantity'] > $product['stock']) {
                    // Restringir la cantidad al stock disponible
                    $cart[$productId]['quantity'] = $product['stock'];

                    // Establecer una alerta en la sesión
                    session()->setFlashdata('alert', "No se puede agregar más unidades de '{$product['nombre']}' al carrito. Stock agotado.");
                }

                // Actualizar el carrito en la sesión
                session()->set('cart', $cart);
            }
        }

        // Redirigir a la página del carrito
        return redirect()->to(base_url('/cart'));
    }

    public function decreaseQuantity($productId)
    {
        $cart = session()->get('cart');

        if ($cart && isset($cart[$productId])) {
            if ($cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity']--;
            } else {
                unset($cart[$productId]);
            }
            session()->set('cart', $cart);
        }

        return redirect()->to(base_url('/cart'));
    }

    public function removeProduct($productId)
    {
        $cart = session()->get('cart');

        if ($cart && isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->set('cart', $cart);
        }

        return redirect()->to(base_url('/cart'));
    }

    public function clearCart()
    {
        session()->remove('cart');

        return redirect()->to(base_url('/cart'));
    }
}

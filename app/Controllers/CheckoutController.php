<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CabeceraCompraModel;
use App\Models\CabeceraDetalleModel;
use App\Models\ProductModel;
use CodeIgniter\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        // Obtén los datos del carrito y el total de la compra
        $cart = session()->get('cart');

        // Carga la vista del checkout
        $data = [
            'title' => 'Confirmación de compra',
        ];

        // Verificar si el carrito no está vacío
        if (isset($cart)) {
            $data['cart'] = $cart; // Pasar el carrito a la vista
            $data['total'] = $this->calculateTotal($cart); // Calcular el total de la compra
        }

        // Cargar la vista de finalización de compra
        echo view('header', $data);
        echo view('checkout_view', $data);
        echo view('footer');
    }

    public function confirmPurchase()
    {
        // Obtener el carrito de la sesión actual
        $cart = session()->get('cart');

        // Verifica si el usuario está logueado
        if (!$this->isLoggedIn()) {
            // Si no está logueado, redirecciona al login
            return $this->response->setJSON(['redirectUrl' => base_url('/login')]);
        }

        // Obtener los datos del formulario
        $membership = $this->request->getPost('membership');
        $cardNumber = $this->request->getPost('cardNumber');
        $installments = $this->request->getPost('installments');

        // Crea un registro en la tabla cabecera_compra
        $cabeceraCompraModel = new CabeceraCompraModel();
        $cabeceraDetalleModel = new CabeceraDetalleModel();

        // Se verifica si el pago es con alguna de las tarjetas. Si es así, se guarda el número de tarjeta; de lo contrario, se guarda null
        $numeroTarjeta = null;
        if ($membership === 'tCredito' || $membership === 'tDebito') {
            $numeroTarjeta = $cardNumber;
            if ($membership === 'tDebito') {
                $installments = 1;
            }
        }

        $cabeceraCompraData = [
            'total' => $this->calculateTotal($cart),
            'id_usuario' => session()->get('id_usuario'),
            'metodo_pago' => $membership,
            'numero_tarjeta' => $numeroTarjeta,
            'cuotas' => $installments,
            'envio' => null,
            'direccion' => null,
            'fecha_alta' => date('Y-m-d H:i:s')
        ];

        $cabeceraCompraId = $cabeceraCompraModel->insert($cabeceraCompraData);

        // Actualizar el stock de los productos y crear registros en la tabla cabecera_detalle
        $productModel = new ProductModel();
        foreach ($cart as $productId => $item) {
            $quantity = $item['quantity'];

            // Obtener la cantidad actual del producto
            $product = $productModel->getProductById($productId);
            $currentStock = $product['stock'];

            // Calcular la nueva cantidad de stock
            $newStock = $currentStock - $quantity;

            $data = [
                'stock' => $newStock
            ];

            // Actualizar el stock del producto en la tabla
            $productModel->update($productId, $data);

            $cabeceraDetalleData = [
                'id_compra' => $cabeceraCompraId,
                'id_producto' => $productId,
                'nombre' => $item['product']['nombre'],
                'cantidad' => $quantity,
                'importe_unitario' => $item['product']['precio'],
                'importe_total' => $quantity * $item['product']['precio'],
                'fecha' => date('Y-m-d H:i:s')
            ];

            $cabeceraDetalleModel->insert($cabeceraDetalleData);
        }

        // Elimina el carrito de la sesión
        session()->remove('cart');


        $compraId = $cabeceraCompraModel->insertID(); // Obtener el ID de la compra guardada

        // Redirigir a la vista de confirmación de compra con el ID de la compra
        //return redirect()->to('/confirmation/' . $compraId);
        //return $this->response->setJSON(['redirectUrl' => base_url('/confirmation/' . $compraId)]);
        // Crear el array con la URL de redirección

        // Obtener el ID de la compra guardada
        $compraId = $cabeceraCompraModel->getInsertID();

        // Redireccionar a la página de confirmación con el ID de la compra
        return $this->response->setJSON(['redirectUrl' => base_url('/confirmation/' . $compraId)]);
    }

    // Calcula el total de la compra a partir de los datos del carrito
    private function calculateTotal($cart)
    {
        $total = 0;

        foreach ($cart as $item) {
            $subtotal = $item['quantity'] * $item['product']['precio'];
            $total += $subtotal;
        }

        return $total;
    }

    // Verifica si el usuario está logueado
    private function isLoggedIn()
    {
        return session()->has('user_id');
    }
}

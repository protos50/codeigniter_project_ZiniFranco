<?php

namespace App\Controllers;

use App\Models\CabeceraCompraModel;
use App\Models\CabeceraDetalleModel;
use CodeIgniter\CLI\Console;
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
            //return redirect()->to(base_url('/login'));
            return $this->response->setJSON(['redirectUrl' => base_url('/login')]);
        }

        // Obtener los datos del formulario
        $membership = $this->request->getPost('membership');
        //$total = $this->request->getPost('total');
        $total = $this->calculateTotal($cart);
        $cardNumber = $this->request->getPost('cardNumber');
        //$expirationDate = $this->request->getPost('expirationDate');
        //$cvv = $this->request->getPost('cvv');
        $installments = $this->request->getPost('installments');
        //$cardholderName = $this->request->getPost('cardholderName');
        //$dniNumber = $this->request->getPost('dniNumber');


        // Crea un registro en la tabla cabecera_compra
        $cabeceraCompraModel = new CabeceraCompraModel();
        $cabeceraDetalleModel = new CabeceraDetalleModel();

        // se verifica si el pago es con alguna de las tarjetas. si es asi se manda el número, sino se manda null
        $numero_tarjeta = null;
        if ($membership === 'tCredito' || $membership === 'tDebito') {
            $numero_tarjeta = $cardNumber;
            if($membership === 'tDebito'){
                $installments = 1;
            }
        }


        $cabeceraCompraData = [
            'total' => $total,
            'id_usuario' => session()->get('id_usuario'),
            'metodo_pago' => $membership,
            'numero_tarjeta' => $numero_tarjeta,
            'cuotas' => $installments,
            'envio' => null,
            'direccion' => null,
            'fecha_alta' => date('Y-m-d H:i:s')
        ];

        $cabeceraCompraId = $cabeceraCompraModel->insert($cabeceraCompraData);


        // Crea registros en la tabla cabecera_detalle
        foreach ($cart as $productId => $item) {
            $cabeceraDetalleData = [
                'id_compra' => $cabeceraCompraId,
                'id_producto' => $productId,
                'nombre' => $item['product']['nombre'],
                'cantidad' => $item['quantity'],
                'importe_unitario' => $item['product']['precio'],
                'importe_total' => $item['quantity'] * $item['product']['precio'],
                'fecha' => date('Y-m-d H:i:s')
            ];

            $cabeceraDetalleModel->insert($cabeceraDetalleData);
        }

        // Elimina el carrito de la sesión
        session()->remove('cart');


        //session()->setFlashdata('confirmationData', $data);
        return $this->response->setJSON(['redirectUrl' => base_url('/confirmation')]);
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

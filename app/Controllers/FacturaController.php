<?php

namespace App\Controllers;

use App\Models\CabeceraCompraModel;
use App\Models\CabeceraDetalleModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class FacturaController extends Controller
{
    public function showFactura($compraId)
    {
        // Obtener los datos necesarios para la factura desde los modelos
        $cabeceraCompraModel = new CabeceraCompraModel();
        $cabeceraDetalleModel = new CabeceraDetalleModel();
        //$productModel = new ProductModel();   sin utilizar la tabla de productos
        $userModel = new UserModel();

        // Obtener los datos de la cabecera de la compra
        $cabeceraCompra = $cabeceraCompraModel->getCompraById($compraId);

        // Obtener el usuario que realizó la compra
        if (isset($cabeceraCompra)) {
            $usuario = $userModel->getUserById($cabeceraCompra['id_usuario']);
        } else {
            $usuario = null;
        }
        
        
        // Obtener los detalles de la compra
        $detallesCompra = $cabeceraDetalleModel->getDetallesByCompraId($compraId);

        // Obtener los productos relacionados a los detalles de la compra
        $productos = [];
        foreach ($detallesCompra as $detalle) {
            //$productId = $detalle['id_producto'];
            //$product = $productModel->getProductById($productId);
            $productos[] = [
                'detalle' => $detalle,
                //'producto' => $product,    no necesito de hecho llamar a los productos
            ];
        }

        // Pasar los datos a la vista
        return view('factura', [
            'cabeceraCompra' => $cabeceraCompra,
            'usuario' => $usuario,
            //'detallesCompra' => $detallesCompra,
            'productos' => $productos,
        ]);
    }
}

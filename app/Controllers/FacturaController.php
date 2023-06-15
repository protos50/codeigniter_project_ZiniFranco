<?php

namespace App\Controllers;

use App\Models\CabeceraCompraModel;
use App\Models\CabeceraDetalleModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

class FacturaController extends BaseController
{
    public function showFactura($compraId)
    {
        // Obtener los datos necesarios para la factura desde los modelos
        $cabeceraCompraModel = new CabeceraCompraModel();
        $cabeceraDetalleModel = new CabeceraDetalleModel();
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
            $productos[] = [
                'detalle' => $detalle,
            ];
        }

        // Pasar los datos a la vista
        return view('factura', [
            'cabeceraCompra' => $cabeceraCompra,
            'usuario' => $usuario,
            'productos' => $productos,
        ]);
    }

    public function downloadPDF($compraId)
    {
        // Cargar la biblioteca Dompdf
        require_once APPPATH . 'ThirdParty/dompdf/autoload.inc.php';

        // Obtener los datos necesarios para el PDF
        $cabeceraCompraModel = new CabeceraCompraModel();
        $cabeceraDetalleModel = new CabeceraDetalleModel();
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
            $productos[] = [
                'detalle' => $detalle,
            ];
        }

        // Limpiar el almacenamiento en búfer actual
        ob_end_clean();

        // Cargar la vista y convertirla a HTML
        $html = view('factura_pdf', [
            'cabeceraCompra' => $cabeceraCompra,
            'usuario' => $usuario,
            'productos' => $productos,
        ]);

        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Generar el nombre del archivo
        $fileName = 'factura.pdf';

        // Descargar el archivo PDF
        $dompdf->stream($fileName);
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class CabeceraCompraModel extends Model
{
    protected $table = 'cabecera_compra';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'total',
        'id_usuario',
        'metodo_pago',
        'numero_tarjeta',
        'cuotas',
        'envio',
        'direccion',
        'fecha_alta'
    ];

    // public function getCompraById($compraId)
    // {
    //     // Obtiene una compra por su ID
    //     return $this->find($compraId);  
    // }

    public function getCompraById($compraId)
    {
        // Obtiene una compra por su ID
        $compra = $this->find($compraId);

        if ($compra) {
            $compra['compraId'] = $compraId; // Agrega el ID de la compra al arreglo
        }

        return $compra;
    }
}

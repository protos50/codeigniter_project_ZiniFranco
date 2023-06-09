<?php

namespace App\Models;

use CodeIgniter\Model;

class CabeceraDetalleModel extends Model
{
    protected $table = 'cabecera_detalle';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_compra',
        'id_producto',
        'nombre',
        'cantidad',
        'importe_unitario',
        'importe_total',
        'fecha'
    ];

    public function getDetallesByCompraId($compraId)
    {
        // Obtiene los detalles de una compra por su ID
        return $this->where('id_compra', $compraId)->findAll();
    }
}

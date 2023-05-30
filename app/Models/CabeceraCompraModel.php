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
}

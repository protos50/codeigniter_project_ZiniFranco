<?php
namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = 'usuarios';
    protected $allowedFields = ['nombre', 'apellido', 'direccion', 'telefono', 'email', 'usuario', 'pass', 'perfil_id', 'baja'];
}

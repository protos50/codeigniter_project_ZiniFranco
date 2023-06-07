<?php

namespace App\Models;

use CodeIgniter\Model;

class FormModel extends Model
{
    protected $table = 'formulario';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'telefono', 'mensaje', 'usuario'];
}

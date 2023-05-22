<?php
namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'usuarios';
    protected $returnType = 'object'; // Establece el tipo de retorno como un objeto
    
    public function validateUser($username, $password)
    {
        // Consulta la base de datos para comprobar si el nombre de usuario y la contraseña son válidos
        return $this->where('usuario', $username)
                    ->where('pass', $password)
                    ->first();
    }
}

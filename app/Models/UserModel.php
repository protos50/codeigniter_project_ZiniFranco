<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellido', 'email', 'usuario', 'pass', 'perfil_id', 'baja'];

    public function getUsers()
    {
        return $this->findAll();
    }

    public function getUserById($userId)
    {
        // Obtiene un usuario por su ID
        return $this->find($userId);
    }

    public function updateUserBaja($userId, $baja)
    {
        $data = [
            'baja' => $baja
        ];

        // Actualizar el registro en la base de datos
        $this->update($userId, $data);
    }
}

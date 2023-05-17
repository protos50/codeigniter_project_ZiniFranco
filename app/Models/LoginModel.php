<?php
namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'usuarios';
    protected $returnType = 'object'; // Set the return type to object
    
    public function validateUser($username, $password)
    {
        // Query the database to check if the username and password are valid
        return $this->where('usuario', $username)
                    ->where('pass', $password)
                    ->first();
    }
}

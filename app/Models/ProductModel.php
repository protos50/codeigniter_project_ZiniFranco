<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'precio', 'imagen', 'stock'];
    
    public function getAllProducts()
    {
        // Obtiene todos los productos de la base de datos
        return $this->findAll();
    }
    
    public function getProductById($productId)
    {
        // Obtiene un producto por su ID
        return $this->find($productId);
    }
}


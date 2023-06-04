<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductEditController extends Controller
{
    public function edit($id)
    {
        // Cargar los datos del producto con el ID proporcionado
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (empty($product)) {
            // Manejar el caso cuando el producto no se encuentra
            // Redireccionar o mostrar un mensaje de error
        }

        $data = ['title' => 'Smart Home Corrientes | Editar Producto'];
        // Pasar los datos del producto a la vista de edición
        echo view('header', $data);
        echo view('edit_product_view', ['product' => $product]);
        echo view('footer');
    }

    public function update($id)
    {
        // Validar los datos del formulario
        // Realizar las validaciones necesarias antes de actualizar el producto

        // Obtener los datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'stock' => $this->request->getPost('stock'),
            // Manejar la carga de imágenes y establecer el campo 'imagen' en consecuencia
            //'imagen' => $this->handleImageUpload()
        ];

        // Actualizar el producto en la base de datos
        $productModel = new ProductModel();
        $productModel->update($id, $data);

        // Redireccionar al catálogo de productos o a cualquier otra página deseada
        return redirect()->to(base_url('/products'));
    }
}

<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductADDController extends Controller
{
    public function index()
    {
        $data = ['title' => 'Smart Home Corrientes | Pagina en Construcion'];
        // Ir a la vista de confirmaciond de producto agregado exitosamente
        echo view('header',  $data);
        echo view('add_product_view');
        echo view('footer');
    }

    public function add($productId = null)
    {
        // Load the form helper
        //helper('form');

        // Create an instance of the ProductModel
        $productModel = new ProductModel();

        // Get the form input values
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'stock' => $this->request->getPost('stock'),
            // Handle image upload and set the 'imagen' field accordingly
            'imagen' => $this->handleImageUpload()
        ];


        if (empty($productId)) {
            // Insert the new product into the database
            $productModel->insert($data);
        } else {
            // Update the existing product in the database
            $productModel->update($productId, $data);
        }

        // Ir a la vista de confirmaciond de producto agregado exitosamente
        echo view('header', ['title' => 'Editado Exitoso']);
        echo view('productoAgregado_confirmacion');
        echo view('footer');
    }

    // Method to handle image upload and return the filename
    private function handleImageUpload()
    {
        // Check if a file was uploaded
        if ($this->request->getFile('imagen')->isValid()) {
            $image = $this->request->getFile('imagen');

            // Generate a unique filename for the uploaded image
            $newName = $image->getRandomName();

            // Move the uploaded file to the designated directory
            $image->move(ROOTPATH . 'public/assets/product_images', $newName);

            return $newName; // Return the filename to be saved in the 'imagen' field
        }

        return null; // If no image uploaded, return null or handle accordingly
    }
}

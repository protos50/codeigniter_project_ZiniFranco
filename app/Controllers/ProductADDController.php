<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductADDController extends Controller
{
    public function add()
    {
        // Load the form helper
        helper('form');

        // If the form is submitted
        if ($this->request->getPost()) {
            // Get the form input values
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion'),
                'precio' => $this->request->getPost('precio'),
                'stock' => $this->request->getPost('stock'),
                // Handle image upload and set the 'imagen' field accordingly
                'imagen' => $this->handleImageUpload()
            ];

            // Create an instance of the ProductModel
            $productModel = new ProductModel();

            // Insert the new product into the database
            $productModel->insert($data);

            // Redirect to the product catalog or any other desired page
            return redirect()->to(base_url('/products'));
        }

        // If the form is not submitted, load the add product view
        // Vista login
        $data = ['title' => 'Smart Home Corrientes | Agregar Producto'];
        echo view('header',  $data);
        echo view('add_product_view');
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

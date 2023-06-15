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
        // Obtener los datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'stock' => $this->request->getPost('stock')
        ];

        // Obtener la imagen actual del producto
        $productModel = new ProductModel();
        $product = $productModel->find($id);
        $imagenActual = $product['imagen'];

        // Manejar la carga de imágenes solo si se seleccionó una nueva imagen
        $imagenFile = $this->request->getFile('imagen');
        if ($imagenFile && $imagenFile->isValid()) {
            // Eliminar la imagen actual si existe
            if (!empty($imagenActual)) {
                $this->deleteImage($imagenActual);
            }

            // Procesar la carga de la nueva imagen
            $data['imagen'] = $this->handleImageUpload();
        } else {
            // Si no se seleccionó una nueva imagen, conservar la imagen actual
            $data['imagen'] = $imagenActual;
        }

        // Actualizar el producto en la base de datos
        $productModel->update($id, $data);

        // Ir a vista de confirmación
        echo view('header', ['title' => 'Editado Exitoso']);
        echo view('productoEditado_confirmacion');
        echo view('footer');
    }

    // Método para eliminar una imagen
    private function deleteImage($imageName)
    {
        $imagePath = ROOTPATH . 'public/assets/product_images/' . $imageName;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }


    // Method to handle image upload and return the filename
    private function handleImageUpload()
    {
        $imagenFile = $this->request->getFile('imagen');

        // Check if a file was uploaded
        if ($imagenFile && $imagenFile->isValid()) {
            $image = $imagenFile;

            // Generate a unique filename for the uploaded image
            $newName = $image->getRandomName();

            // Move the uploaded file to the designated directory
            $image->move(ROOTPATH . 'public/assets/product_images', $newName);

            return $newName; // Return the filename to be saved in the 'imagen' field
        }

        return null; // If no image uploaded, return null or handle accordingly
    }

}

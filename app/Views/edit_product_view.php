
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Producto</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('update/' . $product['id']); ?>" method="post">

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo isset($product['nombre']) ? $product['nombre'] : ''; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción:</label>
                            <textarea name="descripcion" class="form-control" required><?php echo isset($product['descripcion']) ? $product['descripcion'] : ''; ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="text" name="precio" class="form-control" value="<?php echo isset($product['precio']) ? $product['precio'] : ''; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock:</label>
                            <input type="number" name="stock" class="form-control" value="<?php echo isset($product['stock']) ? $product['stock'] : ''; ?>" required>
                        </div>


                        <!-- <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen:</label>
                            <input type="file" name="imagen" class="form-control">
                        </div> -->

                        <button type="submit" class="btn btn-primary">Actualizar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
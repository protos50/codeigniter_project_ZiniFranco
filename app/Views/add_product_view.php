
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Agregar Producto</h3>
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('product/add'); ?>
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea name="descripcion" class="form-control" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="text" name="precio" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock:</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen:</label>
                        <input type="file" name="imagen" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                    
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container my-5">
    <div id="errorContainer"></div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Agregar Producto</h3>
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('/product/add', ['id' => 'productForm']); ?>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input id="nombre" type="text" name="nombre" class="form-control" value="<?php echo isset($product['nombre']) ? $product['nombre'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea id="descripcion" name="descripcion" class="form-control"><?php echo isset($product['descripcion']) ? $product['descripcion'] : ''; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <input id="precio" type="text" name="precio" class="form-control" value="<?php echo isset($product['precio']) ? $product['precio'] : ''; ?>">
                        <small class="text-muted">Formato: xxxxxxxxxx.xx</small>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock:</label>
                        <input id="stock" type="number" name="stock" class="form-control" value="<?php echo isset($product['stock']) ? $product['stock'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen:</label>
                        <input id="imagen" type="file" name="imagen" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Agregar Producto</button>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#productForm').submit(function(event) {
            event.preventDefault(); // Evita el envío del formulario por defecto

            // Lógica de validación
            var nombre = $('#nombre').val();
            var descripcion = $('#descripcion').val();
            var precio = $('#precio').val();
            var stock = $('#stock').val();
            var imagen = $('#imagen').val();

            // Variable para almacenar el mensaje de error
            var errorMessage = '';

            if (nombre.trim().length === 0) {
                errorMessage += 'Por favor, complete el campo Nombre.<br>';
            }

            if (descripcion.trim().length === 0) {
                errorMessage += 'Por favor, complete el campo Descripción.<br>';
            }

            // Validar que el campo Precio contenga un máximo de 10 dígitos enteros y 2 dígitos decimales
            var precioRegex = /^\d{1,10}(\.\d{1,2})?$/; // Expresión regular para validar el formato del precio
            if (!precioRegex.test(precio)) {
                errorMessage += 'Por favor, ingrese un precio válido (Formato: MAX 10 Digitos enteros . MAX 2 Digitos decimales).<br>';
            }

            if (stock.trim().length === 0) {
                errorMessage += 'Por favor, complete el campo Stock.<br>';
            }

            if (imagen.trim().length === 0) {
                errorMessage += 'Por favor, seleccione una imagen.<br>';
            }

            // Verificar si hay errores y mostrar el mensaje
            if (errorMessage !== '') {
                $('#errorContainer').html('<div class="alert alert-danger">' + errorMessage + '</div>');
                return;
            }

            // Si la validación pasa, se envía el formulario manualmente
            this.submit();
        });
    });
</script>
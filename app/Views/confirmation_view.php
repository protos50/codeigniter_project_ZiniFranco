<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Confirmación de compra</h1>
            <h5>La compra con ID <?php echo $compra['compraId']; ?> se ha guardado en la base de datos exitosamente.</p>


                <!-- Agregar el botón de descarga y el formulario -->
                <div class="text-center">
                    <h3>Para ver su factura y/o descargarla:</h3>
                    <a href="<?php echo base_url('/factura/' . $compra['compraId']); ?>" class="btn btn-success">Haz Click Aquí</a>
                </div>


        </div>
    </div>
</div>
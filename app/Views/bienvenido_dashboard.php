<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Bienvenido</h1>
            <h5>Bienvenido nuevamente a Smart Home Corrientes ususario <?php echo session()->get('nombre') ?> <?php echo session()->get('apellido') ?></h5>


                <div class="text-center pt-5">
                    <h3>Ir al catalogo de productos</h3>
                    <a href="<?php echo base_url('products'); ?>" class="btn btn-success">Catálogo</a>
                </div>

        </div>
    </div>
</div>
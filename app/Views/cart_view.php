<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Carrito de Compras</h1>
        <?php if (!empty($cart)) : ?>
            <a class="btn btn-dark mt-4" href="<?php echo base_url('products'); ?>">Seguir Comprando</a>

        <?php endif; ?>

    </div>

    <?php if (session()->has('alert')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session('alert') ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($cart)) : ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Precio total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $productId => $item) : ?>
                    <tr>
                        <td><?php echo $item['product']['nombre']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>$<?php echo $item['product']['precio']; ?></td>
                        <td>$<?php echo $item['quantity'] * $item['product']['precio']; ?></td>
                        <td>
                            <a href="<?php echo base_url('/cart/increase_quantity/' . $productId); ?>" class="btn btn-primary">+</a>
                            <a href="<?php echo base_url('/cart/decrease_quantity/' . $productId); ?>" class="btn btn-primary">-</a>
                        </td>
                        <td><a href="<?php echo base_url('/cart/remove_product/' . $productId); ?>" class="btn btn-danger">Eliminar</a></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-center py-1">
            <a href="<?php echo base_url('/cart/clear_cart'); ?>" class="btn btn-danger">Vaciar Carrito</a>
        </div>

        <div class="text-center">
            <a href="<?php echo base_url('checkout'); ?>" class="btn btn-primary">Concretar compra</a>
        </div>

    <?php else : ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3>No hay productos agregados al carrito</h3>
                    <h5>Diríjase al catálogo para agregar productos al carrito de compras</5>


                        <!-- Agregar el botón de descarga y el formulario -->
                        <div class="text-center py-3">
                            <h3>Para ir al catalogo:</h3>
                            <a href="<?php echo base_url('/products'); ?>" class="btn btn-success">Haz Click Aquí</a>
                        </div>


                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
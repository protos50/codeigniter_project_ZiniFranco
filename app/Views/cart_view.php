<div class="container py-4">
    <h1>Carrito de Compras</h1>

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
            <a href="/checkout" class="btn btn-primary">Concretar compra</a>
        </div>

    <?php else : ?>
        <p>No hay productos en el carrito.</p>
    <?php endif; ?>
</div>
<div class="container">
    <h1>Carrito de Compras</h1>

    <?php if (!empty($cart)) : ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Precio total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $productId => $item) : ?>
                    <tr>
                        <td><?php echo $item['product']['nombre']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>$<?php echo $item['product']['precio']; ?></td>
                        <td>$<?php echo $item['quantity'] * $item['product']['precio']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No hay productos en el carrito.</p>
    <?php endif; ?>
</div>

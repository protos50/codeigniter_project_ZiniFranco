
    <style>
        .product-card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .product-card .card-body {
            padding: 20px;
        }

        .product-card h5 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .product-card p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .product-card .price {
            font-size: 18px;
            font-weight: bold;
        }
    </style>

<div class="container">
    <h1 class="mt-4">Catalogo de Productos</h1>
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col">
                    <div class="card product-card">
                        <?php if (!empty($product['imagen'])): ?>
                            <img src="<?php echo base_url('/assets/product_images/' . $product['imagen']); ?>" alt="Product Image">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['nombre']; ?></h5>
                            <p class="card-text"><?php echo $product['descripcion']; ?></p>
                            <p class="card-text price">Precio: $<?php echo $product['precio']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>
</div>


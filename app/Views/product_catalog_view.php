<style>
    /* estilos para las cards de los productos */
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

    .product-card .stock {
        font-size: 14px;
        color: #888;
    }

    /* estilos para el mensaje modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.35);
        /* Ajusta el valor alfa para controlar la transparencia */
    }

    .modal-content {
        background-color: rgba(0, 128, 0, 0.8);
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 300px;
    }

    .modal-content.error {
        background-color: rgba(200, 0, 0, 0.8);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-title {
        margin-top: 0;
    }

    .close {
        color: #aaa;
        cursor: pointer;
    }

    .close:hover {
        color: #000;
    }

    .modal-body {
        margin-top: 20px;
    }
</style>


<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Catálogo de Productos</h1>
        <?php if (session()->user_id == 1) : ?>
            <a class="btn btn-primary mt-4" href="<?php echo base_url('add'); ?>">Añadir un Producto</a>

        <?php endif; ?>

    </div>

    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger">
            <?php echo session('error'); ?>
        </div>
    <?php endif; ?>


    <?php if (!session()->has('user_id')) : ?>
        <div class="alert alert-warning">
            <?php echo ('Para poder realizar compras primero deberá ingresar con su cuenta de usuario.'); ?>
        </div>

        <div class="alert alert-info" role="alert">
            Registrarse haciendo
            <a href="<?php echo base_url('register'); ?>">¡Click Aqui!</a>
        </div>
    <?php endif; ?>

    <?php if (!empty($cart)) : ?>
        <div class="alert alert-primary" role="alert">
            Productos en el carrito:
            <ul>
                <?php foreach ($cart as $productId => $item) : ?>
                    <li><?php echo $item['product']['nombre']; ?> (Cantidad: <?php echo $item['quantity']; ?>)</li>
                <?php endforeach; ?>
            </ul>


        </div>
    <?php endif; ?>



    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php $hayAlgunProducto = false; ?>
        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $product) : ?>

                <!-- A los usuarios solo se muestran las cards de productos que hay en stock -->
                <?php if ($product['stock'] > 0) : ?>
                    <?php $hayAlgunProducto = true; ?>
                    <div class="col">
                        <div class="card product-card">
                            <?php if (!empty($product['imagen'])) : ?>
                                <img src="<?php echo base_url('/assets/product_images/' . $product['imagen']); ?>" alt="Product Image">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['nombre']; ?></h5>
                                <p class="card-text"><?php echo $product['descripcion']; ?></p>
                                <p class="card-text price">Precio: $<?php echo $product['precio']; ?></p>
                                <p class="card-text stock">Stock: <?php echo $product['stock']; ?></p>
                                <?php if ($product['stock'] > 0) : ?>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <?php if (session()->has('user_id') && session()->user_id == 2) { ?>
                                            <a href="#" class="btn btn-primary add-to-cart" onclick="addToCart(<?php echo $product['id']; ?>)">Agregar al carrito</a>
                                        <?php } ?>


                                        <?php if (session()->user_id == 1) { ?>
                                            <a class="btn btn-primary" href="<?php echo base_url('edit/' . $product['id']); ?>">Editar</a>
                                        <?php } ?>


                                        <!-- Mostrar botón "Dar de Baja" o "Dar de Alta" si el usuario es Administrador-->
                                        <?php if (session()->user_id == 1) { ?>
                                            <?php if ($product['baja'] === 'no') : ?>
                                                <a href="<?php echo base_url('/products/toggleProductStatus/' . $product['id']); ?>" class="btn btn-danger">Dar de Baja</a>
                                            <?php else : ?>
                                                <a href="<?php echo base_url('/products/toggleProductStatus/' . $product['id']); ?>" class="btn btn-success">Dar de Alta</a>
                                            <?php endif; ?>
                                        <?php } ?>

                                    </div>

                                <?php else : ?>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button class="btn btn-primary" disabled>No disponible</button>

                                        <?php if (session()->user_id == 1) { ?>
                                            <a class="btn btn-primary" href="<?php echo base_url('edit/' . $product['id']); ?>">Editar</a>
                                        <?php } ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Adicional a las otras cards con este condicional tambien se muestrarán las cards con stock 0 a los administradores  -->
                <?php if ($product['stock'] == 0 && session()->user_id == 1) : ?>
                    <div class="card product-card">
                        <?php if (!empty($product['imagen'])) : ?>
                            <img src="<?php echo base_url('/assets/product_images/' . $product['imagen']); ?>" alt="Product Image">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['nombre']; ?></h5>
                            <p class="card-text"><?php echo $product['descripcion']; ?></p>
                            <p class="card-text price">Precio: $<?php echo $product['precio']; ?></p>
                            <p class="card-text stock">Stock: <?php echo $product['stock']; ?></p>
                            <?php if ($product['stock'] > 0) : ?>

                                <div class="d-flex justify-content-between align-items-center">

                                    <?php if (session()->user_id == 1) { ?>
                                        <a class="btn btn-primary" href="<?php echo base_url('edit/' . $product['id']); ?>">Editar</a>

                                        <!-- Mostrar botón "Dar de Baja" o "Dar de Alta" -->

                                        <?php if ($product['baja'] === 'no') : ?>
                                            <a href="<?php echo base_url('/products/toggleProductStatus/' . $product['id']); ?>" class="btn btn-danger">Dar de Baja</a>
                                        <?php else : ?>
                                            <a href="<?php echo base_url('/products/toggleProductStatus/' . $product['id']); ?>" class="btn btn-success">Dar de Alta</a>
                                        <?php endif; ?>
                                    <?php } ?>

                                </div>

                            <?php else : ?>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-primary" disabled>Sin Stock</button>

                                    <?php if (session()->user_id == 1) { ?>
                                        <a class="btn btn-primary" href="<?php echo base_url('edit/' . $product['id']); ?>">Editar</a>

                                        <!-- Mostrar botón "Dar de Baja" o "Dar de Alta"-->
                                        <?php if ($product['baja'] === 'no') : ?>
                                            <a href="<?php echo base_url('/products/toggleProductStatus/' . $product['id']); ?>" class="btn btn-danger">Dar de Baja</a>
                                        <?php else : ?>
                                            <a href="<?php echo base_url('/products/toggleProductStatus/' . $product['id']); ?>" class="btn btn-success">Dar de Alta</a>
                                        <?php endif; ?>
                                    <?php } ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endif; ?>

            <?php endforeach; ?>

            <?php if (!$hayAlgunProducto) { ?>
                <p>No se encontraron productos.</p>
            <?php } ?>
        <?php else : ?>
            <p>No se encontraron productos.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Mensaje modal para indicar que el producto se agregó al carrito -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Producto Agregado al Carrito</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <p>El producto fue agregado al carrito exitosamente. Haz clic en cualquier lugar para cerrar el mensaje.</p>
        </div>
    </div>
</div>

<script>
    // script para cerrar el mensaje modal

    // Get the modal element
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var closeBtn = document.getElementsByClassName("close")[0];

    // Function to show the modal with a custom message
    function showModal(message) {
        var modalContent = document.querySelector(".modal-content");
        var modalTitle = modalContent.querySelector(".modal-title");
        var modalBody = modalContent.querySelector(".modal-body");

        // Update the modal title and body with the custom message
        modalTitle.textContent = message;
        modalBody.textContent = "Click en cualquier parte para continuar";

        // Check the message and apply the corresponding class
        if (message === "No se pueden agregar más unidades de este producto al carrito.") {
            modalContent.classList.add("error");
        } else {
            modalContent.classList.remove("error");
        }

        modal.style.display = "block";


    }



    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener("click", function(event) {
        if (event.target === modal || modal.contains(event.target)) {
            modal.style.display = "none";
            location.reload();
        }

    });

    // // When the user clicks on the close button, close the modal
    // closeBtn.onclick = function() {
    //     modal.style.display = "none";
    // };


    // When the user clicks on the close button, close the modal and reload the page
    closeBtn.onclick = function() {
        modal.style.display = "none";
        location.reload(); // Recargar la página
    };

    // ...


    function addToCart(productId) {
        var cart = <?php echo isset($cart) ? json_encode($cart) : '{}'; ?>;
        var products = <?php echo json_encode($products); ?>;

        var quantity = 0;

        // Buscar el producto en el arreglo products por su ID
        var product = products.find(function(p) {
            return p.id == productId;
        });

        // Verificar si el producto existe
        if (product) {
            // Obtener el stock disponible del producto
            var stock = product.stock;

            // Verificar si el producto ya está en el carrito
            if (typeof cart[productId] != 'undefined' && typeof cart[productId]['quantity'] != 'undefined') {
                quantity = cart[productId]['quantity'];
            }
            // Verificar si la cantidad excede el stock disponible
            if (quantity >= stock) {
                // Mostrar modal indicando que no se puede agregar más unidades al carrito
                showModal("No se pueden agregar más unidades de este producto al carrito.");
            } else {
                // Realizar la solicitud AJAX utilizando una promesa
                makeAjaxRequest("<?php echo base_url('cart/add/'); ?>" + productId)
                    .then(function() {
                        // Verificar nuevamente si la cantidad excede el stock disponible
                        if (quantity >= stock) {
                            // Mostrar modal indicando que no se puede agregar más unidades al carrito
                            showModal("No se pueden agregar más unidades de este producto al carrito.");
                        } else {
                            // Mostrar modal de éxito
                            showModal("El producto ha sido agregado al carrito.");

                        }

                    })
                    .catch(function() {
                        // Mostrar modal de error en caso de fallo en la solicitud AJAX
                        showModal("Ha ocurrido un error al agregar el producto al carrito. Por favor, intenta nuevamente.");
                    });
            }
        } else {
            // Mostrar modal de error en caso de que el producto no exista
            showModal("El producto seleccionado no existe.");
        }
        event.preventDefault();
    }

    function makeAjaxRequest(url) {
        return new Promise(function(resolve, reject) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onload = function() {
                if (xhr.status == 200) {
                    resolve();
                } else {
                    reject();
                }
            };
            xhr.onerror = function() {
                reject();
            };
            xhr.send();
        });
    }
</script>
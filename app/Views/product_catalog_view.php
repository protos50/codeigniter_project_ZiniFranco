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
    <h1 class="mt-4">Catálogo de Productos</h1>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $product) : ?>
                <div class="col">
                    <div class="card product-card">
                        <?php if (!empty($product['imagen'])) : ?>
                            <img src="<?php echo base_url('/assets/product_images/' . $product['imagen']); ?>" alt="Product Image">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['nombre']; ?></h5>
                            <p class="card-text"><?php echo $product['descripcion']; ?></p>
                            <p class="card-text price">Precio: $<?php echo $product['precio']; ?></p>
                            <a href="#" class="btn btn-primary add-to-cart" onclick="addToCart(<?php echo $product['id']; ?>)">Agregar al carrito</a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No se encontraron productos.</p>
        <?php endif; ?>
    </div>

    <!-- Mensaje modal para indicar que el producto se agrego al carrito -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Producto Agregago al Carrito</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <p>El producto fué agregado al carrito exitosamente. Click en cualquier lugar para cerrar el mensaje.</p>
            </div>
        </div>
    </div>
</div>

<script>

    // script para cerrar el mensaje modal

    // Get the modal element
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var closeBtn = document.getElementsByClassName("close")[0];

    // Function to show the modal
    function showModal() {
        modal.style.display = "block";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener("click", function(event) {
        if (event.target === modal || modal.contains(event.target)) {
            modal.style.display = "none";
        }
    });

    // When the user clicks on the close button, close the modal
    closeBtn.onclick = function() {
        modal.style.display = "none";
    };

    // Add an event listener to the document for "Add to Cart" button clicks
    document.addEventListener("click", function(event) {
        if (event.target.classList.contains("add-to-cart")) {
            showModal();
        }
    });


    // script que me permite agregar productos al carrito sin necesidad de que se rederidija a la vista del carrito automaticamente

    function addToCart(productId) {
        // Crear una nueva instancia de XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Configurar la solicitud AJAX
        xhr.open("GET", "<?php echo base_url('cart/add/'); ?>" + productId, true);

        // Configurar la función de devolución de llamada para manejar la respuesta
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // La solicitud se completó con éxito, puedes realizar acciones adicionales si es necesario
                    console.log("Producto agregado al carrito");
                } else {
                    // Ocurrió un error en la solicitud AJAX, manejarlo según tus necesidades
                    console.error("Error al agregar el producto al carrito");
                }
            }
        };

        // Enviar la solicitud AJAX
        xhr.send();

        // Evitar el desplazamiento de la página
        event.preventDefault();
    }



</script>
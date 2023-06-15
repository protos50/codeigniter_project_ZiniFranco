<div class="container py-5">
    <h1>Confirmación de compra</h1>

    <?php if (!empty($cart)) : ?>

        <div class="container-fluid box-shadow py-3">
            <div class="container row g-0">

                <div class="col-lg-12 col-xl-6 pb-5 px-3">

                    <!-- Menu forma de pago -->
                    <form id="membershipForm">
                        <div class="mb-3">
                            <label for="membership" class="form-label">Elegir un método de pago:</label>
                            <select class="form-control" id="membership" name="membership">
                                <option value="efectivo" selected>Efectivo</option>
                                <option value="tCredito">Tarjeta Crédito</option>
                                <option value="tDebito">Tarjeta Débito</option>
                                <option value="mPago">Mercado Pago</option>
                            </select>
                        </div>
                    </form>


                    <div id="cardFormContainer" class="mt-4">
                        <!-- Formulario de tarjeta -->
                        <form id="cardForm" style="display: none;">
                            <!-- Campo: Número de tarjeta -->
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Número de tarjeta</label>
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Número" required>
                            </div>

                            <!-- Campo: Fecha de vencimiento -->
                            <div class="mb-3">
                                <label for="expirationDate" class="form-label">Fecha de vencimiento</label>
                                <input type="text" class="form-control" id="expirationDate" name="expirationDate" placeholder="mm/yy" required>
                            </div>

                            <!-- Campo: CVV -->
                            <div class="mb-3">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="Clave de verificación" required>
                            </div>

                            <!-- Campo: Cantidad de cuotas -->
                            <div class="mb-3">
                                <label for="installments" class="form-label">Cantidad de cuotas</label>
                                <select class="form-control" id="installments" name="installments" required>
                                    <option value="1">1 cuota</option>
                                    <option value="3">3 cuotas</option>
                                    <option value="6">6 cuotas</option>
                                    <option value="9">9 cuotas</option>
                                    <option value="12">12 cuotas</option>
                                </select>
                            </div>

                            <!-- Campo: Nombre -->
                            <div class="mb-3">
                                <label for="cardholderName" class="form-label">Nombre (como se indica en la tarjeta)</label>
                                <input type="text" class="form-control" id="cardholderName" name="cardholderName" placeholder="Nombre" required>
                            </div>

                            <!-- Campo: Número de DNI -->
                            <div class="mb-3">
                                <label for="dniNumber" class="form-label">Número de DNI (sin puntos)</label>
                                <input type="text" class="form-control" id="dniNumber" name="dniNumber" placeholder="DNI" required>
                            </div>


                        </form>

                    </div>

                    <h3>Total de la compra: $<?php echo $total; ?></h3>

                    <div class="text-center">
                        <a class="btn btn-secondary" href="<?php echo base_url('cart'); ?>">Volver al Carrito</a>
                        <a class="btn btn-info" href="<?php echo base_url('products'); ?>">Seguir comprando</a>
                        <button class="btn btn-success" id="confirmButton">Finalizar Compra</button>
                    </div>

                </div>

                <div class="my-auto col-lg-12 col-xl-6">
                    <!-- Acordeon que contiene la lista de productos a comprar -->
                    <div class="accordion" id="checkoutAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="checkoutHeading">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#checkoutCollapse" aria-expanded="true" aria-controls="checkoutCollapse">
                                    Detalle de productos en el Carrito
                                </button>
                            </h2>
                            <div id="checkoutCollapse" class="accordion-collapse collapse show" aria-labelledby="checkoutHeading" data-bs-parent="#checkoutAccordion">
                                <div class="accordion-body">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <?php else : ?>
        <p>No hay productos en el carrito.</p>
    <?php endif; ?>
</div>

<script>
    const membershipSelect = document.getElementById("membership");
    const cardFormContainer = document.getElementById("cardFormContainer");
    const cardForm = document.getElementById("cardForm");

    membershipSelect.addEventListener("change", function() {
        const selectedOption = membershipSelect.value;

        if (selectedOption == "tCredito" || selectedOption == "tDebito") {
            cardForm.style.display = "block";
        } else {
            cardForm.style.display = "none";
        }
    });

    // Obtener el elemento select de cuotas
    const installmentsSelect = document.getElementById('installments');

    // Función para bloquear el menú de cuotas para Tarjeta Débito
    function blockInstallmentsForDebitCard() {
        // Obtener el valor seleccionado en el select de formas de pago
        const paymentMethod = document.getElementById('membership').value;

        // Bloquear o desbloquear el menú de cuotas en función de la selección
        if (paymentMethod == 'tDebito') {
            installmentsSelect.disabled = true;
            installmentsSelect.value = '1'; // Establecer la opción de 1 cuota como seleccionada
        } else {
            installmentsSelect.disabled = false;
        }
    }

    // Escuchar el evento change en el select de formas de pago
    document.getElementById('membership').addEventListener('change', blockInstallmentsForDebitCard);

    // Llamar a la función inicialmente para reflejar el estado inicial
    blockInstallmentsForDebitCard();

    // Manejar el evento click en el botón de confirmar compra
    document.getElementById('confirmButton').addEventListener('click', function(event) {
        event.preventDefault(); // Evita el envío del formulario por defecto

        const membershipSelect = document.getElementById('membership');
        const selectedOption = membershipSelect.value;

        // Verificar si se seleccionó "Tarjeta Crédito" o "Tarjeta Débito"
        if (selectedOption == 'tCredito' || selectedOption == 'tDebito') {
            // Obtener los campos del formulario de la tarjeta
            const cardNumber = document.getElementById('cardNumber');
            const expirationDate = document.getElementById('expirationDate');
            const cvv = document.getElementById('cvv');
            const cardholderName = document.getElementById('cardholderName');
            const dniNumber = document.getElementById('dniNumber');

            // Validar la longitud de los campos de entrada
            if (cardNumber.value.length !== 16) {
                alert('El número de tarjeta debe tener 16 dígitos.');
                return; // Detener la ejecución si la longitud es incorrecta
            }

            if (expirationDate.value.length !== 5) {
                alert('La fecha de vencimiento debe tener el formato mm/yy.');
                return; // Detener la ejecución si la longitud es incorrecta
            }

            if (cvv.value.length !== 3) {
                alert('El CVV debe tener 3 dígitos.');
                return; // Detener la ejecución si la longitud es incorrecta
            }

            if (dniNumber.value.length > 8) {
                alert('El número de DNI debe tener máximo 8 dígitos.');
                return; // Detener la ejecución si la longitud es incorrecta
            }
        }

        // Obtener los datos de ambos formularios
        const cardFormData = new FormData(document.getElementById('cardForm'));
        const membershipFormData = new FormData(document.getElementById('membershipForm'));

        // Combinar los datos de ambos formularios en uno solo
        const combinedFormData = new FormData();
        for (const entry of cardFormData.entries()) {
            combinedFormData.append(entry[0], entry[1]);
        }
        for (const entry of membershipFormData.entries()) {
            combinedFormData.append(entry[0], entry[1]);
        }

        // Enviar la solicitud con el formulario combinado
        fetch('<?php echo base_url('checkout/confirmPurchase'); ?>', {
                method: 'POST',
                body: combinedFormData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data); // Verificar los datos recibidos
                window.location.href = data.redirectUrl; // Redireccionar a la URL devuelta
            })
            .catch(error => {
                // Manejar los errores
                console.log(error);
                alert("Error al intentar hacer la compra. Comuniquese con un Administrador");
            });
    });
</script>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Register</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo site_url('register/process_registration'); ?>">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección para Envíos(opcional):</label>
                            <input type="text" name="direccion" id="direccion" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono(opcional):</label>
                            <input type="text" name="telefono" id="telefono" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario:</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="pass" class="form-label">Contraseña:</label>
                            <input type="password" name="pass" id="pass" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
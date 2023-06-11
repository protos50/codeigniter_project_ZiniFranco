<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ingrese con su cuenta</h3>
                </div>
                <div class="card-body">
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php } ?>
                    <form method="post" action="<?php echo site_url('login/process_login'); ?>">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de Usuario:</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </form>
                </div>
            </div>

            <div class="alert alert-info mt-3" role="alert">
                Registrarse haciendo
                <b><a href="<?php echo base_url('register'); ?>">¡Click Aqui!</a></b>
            </div>
        </div>
    </div>
</div>
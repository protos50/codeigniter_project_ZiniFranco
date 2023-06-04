<div class="container my-4">
    <h1 class="mb-4">Lista de Usuarios</h1>

    <?php if (!empty($users)) : ?>
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>Perfil ID</th>
                    <th>Baja</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['nombre']; ?></td>
                        <td><?php echo $user['apellido']; ?></td>
                        <td><?php echo $user['direccion'];?></td>
                        <td><?php echo $user['telefono'];?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['usuario']; ?></td>
                        <td><?php if ($user['perfil_id'] == 1) {
                                echo "Administrador";
                            } else {
                                echo "Usuario";
                            } ?></td>
                        <td><?php echo $user['baja']; ?></td>
                        <td>
                            <?php if ($user['baja'] == 'si') : ?>
                                <a href="<?php echo base_url('/admin/toggle_baja/' . $user['id']); ?>" class="btn btn-primary">Dar de Alta</a>
                            <?php else : ?>
                                <a href="<?php echo base_url('/admin/toggle_baja/' . $user['id']); ?>" class="btn btn-danger">Dar de Baja</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No se encontraron usuarios registrados.</p>
    <?php endif; ?>
</div>
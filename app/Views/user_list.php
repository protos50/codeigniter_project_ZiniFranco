<div class="container">
    <h1 class="mb-4">Lista de Usuarios</h1>

    <?php if (!empty($users)) : ?>
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>Perfil ID</th>
                    <th>Baja</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['nombre']; ?></td>
                        <td><?php echo $user['apellido']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['usuario']; ?></td>
                        <td><?php echo $user['perfil_id']; ?></td>
                        <td><?php echo $user['baja']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No users found.</p>
    <?php endif; ?>
</div>

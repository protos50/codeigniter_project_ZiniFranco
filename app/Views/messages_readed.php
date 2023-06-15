<style>
    .btn-detail:hover {
        background-color: #20c997 !important;
    }
</style>

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Mensajes leídos</h1>

        <a href="<?php echo base_url('messages'); ?>" class="btn btn-primary mt-4">ir a Mensajes no leídos</a>

    </div>

    <!-- Mostrar mensajes leídos donde usuario = 'no' -->
    <div>
        <h2>Usuarios Visitantes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Mensaje</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($readedMessagesNoUser as $message) : ?>
                    <tr id="mensaje-<?php echo $message['id']; ?>">
                        <td><?php echo $message['nombre']; ?></td>
                        <td><?php echo $message['email']; ?></td>
                        <td><?php echo $message['telefono']; ?></td>
                        <td><?php echo $message['mensaje']; ?></td>
                        <td>
                            <button class="btn btn-detail bg-warning text-body" onclick="markAsUnread(<?php echo $message['id']; ?>)">Marcar como no leído</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Mostrar mensajes leídos donde usuario = 'si' -->
    <div>
        <h2>Usuarios Registrados</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Mensaje</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($readedMessagesWithUser as $message) : ?>
                    <tr id="mensaje-<?php echo $message['id']; ?>">
                        <td><?php echo $message['nombre']; ?></td>
                        <td><?php echo $message['email']; ?></td>
                        <td><?php echo $message['telefono']; ?></td>
                        <td><?php echo $message['mensaje']; ?></td>
                        <td>
                            <button class="btn btn-detail bg-warning text-body" onclick="markAsUnread(<?php echo $message['id']; ?>)">Marcar como no leído</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    function markAsUnread(messageId) {
        // Enviar solicitud AJAX para marcar el mensaje como leído
        $.post(`<?php echo base_url('markAsRead'); ?>/${messageId}`)
            .done(function(response) {
                // Mostrar el mensaje de éxito
                alert('Mensaje marcado como leído');

                // Quitar el mensaje de la vista
                $('#mensaje-' + messageId).remove();
            })
            .fail(function(error) {
                // Manejar cualquier error en la solicitud AJAX
                console.error(error);
                alert('Error al marcar el mensaje como leído');
            });
    }
</script>
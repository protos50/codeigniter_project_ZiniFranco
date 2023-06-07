<style>
    .btn-detail:hover {
        background-color: #20c997 !important;
    }
</style>


<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-4">Mensajes no leído</h1>

        <a href="/messages_readed" class="btn btn-primary mt-4">ir a Mensajes leídos</a>

    </div>


    <!-- Mostrar mensajes no leídos donde usuario = 'no' -->
    <div>
        <h2>Usuarios Visitantes</h2>
        <?php foreach ($unreadMessagesNoUser as $message) : ?>
            <div id="mensaje-<?php echo $message['id']; ?>">
                <p><?php echo $message['nombre']; ?></p>
                <p><?php echo $message['email']; ?></p>
                <p><?php echo $message['telefono']; ?></p>
                <p><?php echo $message['mensaje']; ?></p>
                <button class="btn btn-detail bg-success" onclick="markAsRead(<?php echo $message['id']; ?>)">Marcar como leído</button>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Mostrar mensajes no leídos donde usuario = 'si' -->
    <div>
        <h2>Usuarios Registrados</h2>
        <?php foreach ($unreadMessagesWithUser as $message) : ?>
            <div id="mensaje-<?php echo $message['id']; ?>">
                <p><?php echo $message['nombre']; ?></p>
                <p><?php echo $message['email']; ?></p>
                <p><?php echo $message['telefono']; ?></p>
                <p><?php echo $message['mensaje']; ?></p>
                <button class="btn btn-detail bg-success" onclick="markAsRead(<?php echo $message['id']; ?>)">Marcar como leído</button>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<script>
    function markAsRead(messageId) {
        // Enviar solicitud AJAX para marcar el mensaje como leído
        $.post(`/markAsRead/${messageId}`)
            .done(function(response) {
                // Mostrar el mensaje de éxito

                alert('¡Mensaje marcado exitosamente!');

                // Quitar el mensaje de la vista
                $('#mensaje-' + messageId).remove();
            })
            .fail(function(error) {
                // Manejar cualquier error en la solicitud AJAX
                console.error(error);
                alert('Error al marcar el mensaje.');
            });
    }
</script>
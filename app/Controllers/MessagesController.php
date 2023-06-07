<?php

namespace App\Controllers;

use App\Models\Message;
use CodeIgniter\Controller;

class MessagesController extends Controller
{
    public function index()
    {
        // Obtener el modelo de mensajes
        $messageModel = model(Message::class);

        // Obtener mensajes no leídos para usuarios 'no'
        $unreadMessagesNoUser = $messageModel->where('leido', 'no')->where('usuario', 'no')->findAll();

        // Obtener mensajes no leídos para usuarios 'si'
        $unreadMessagesWithUser = $messageModel->where('leido', 'no')->where('usuario', 'si')->findAll();

        // Mostrar la vista del encabezado
        echo view('header', ['title' => 'Mensajes']);

        // Mostrar la vista de los mensajes, pasando los datos de los mensajes no leídos
        echo view('messages', compact('unreadMessagesNoUser', 'unreadMessagesWithUser'));

        // Mostrar la vista del pie de página
        echo view('footer');
    }

    public function mensajesLeidos()
    {
        // Obtener el modelo de mensajes
        $messageModel = model(Message::class);

        // Obtener mensajes no leídos para usuarios 'no'
        $readedMessagesNoUser = $messageModel->where('leido', 'si')->where('usuario', 'no')->findAll();

        // Obtener mensajes no leídos para usuarios 'si'
        $readedMessagesWithUser = $messageModel->where('leido', 'si')->where('usuario', 'si')->findAll();

        // Mostrar la vista del encabezado
        echo view('header', ['title' => 'Mensajes']);

        // Mostrar la vista de los mensajes, pasando los datos de los mensajes no leídos
        echo view('messages_readed', compact('readedMessagesNoUser', 'readedMessagesWithUser'));

        // Mostrar la vista del pie de página
        echo view('footer');
    }


    public function toggleReadStatus($id)
    {
        // Obtener el modelo de mensajes
        $messageModel = model(Message::class);

        // Buscar el mensaje por su ID
        $message = $messageModel->find($id);

        if ($message) {
            if ($message['leido'] === 'si') {
                $message['leido'] = 'no';
            } else {
                // Marcar el mensaje como leído
                $message['leido'] = 'si';
            }

            // Guardar el mensaje actualizado en la base de datos
            $messageModel->save($message);
        }

        // Redireccionar al usuario a la página anterior
        return redirect()->back();
    }
}

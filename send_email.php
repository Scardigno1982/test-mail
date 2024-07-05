<?php
// send_email.php

require_once __DIR__ . '/vendor/autoload.php'; // Cargar el autoloader de Composer
require __DIR__ . '/bootstrap.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\MyMailer;

// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    try {
        // Crear una instancia de PHPMailer
        $phpMailer = new PHPMailer(true); // Lanza excepciones en caso de error

        // Configurar el servidor SMTP (usando variables de entorno o configuración directa)
        $phpMailer->isSMTP();
        $phpMailer->Host = $_ENV['MAILTRAP_HOST'];
        $phpMailer->Port = $_ENV['MAILTRAP_PORT'];
        $phpMailer->SMTPAuth = true;
        $phpMailer->Username = $_ENV['MAILTRAP_USERNAME'];
        $phpMailer->Password = $_ENV['MAILTRAP_PASSWORD'];
        $phpMailer->setFrom($_ENV['MAILTRAP_FROM_EMAIL'], $_ENV['MAILTRAP_FROM_NAME']);

        // Crear una instancia de MyMailer
        $myMailer = new MyMailer($phpMailer);

        // Enviar el correo electrónico
        $result = $myMailer->sendEmail($to, $subject, $body);

        if ($result) {
            echo "Correo enviado correctamente a $to";
        } else {
            echo "Hubo un problema al enviar el correo.";
        }
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$e->getMessage()}";
    }
} else {
    echo "Acceso no autorizado.";
}
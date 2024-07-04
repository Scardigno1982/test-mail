<?php
// MyMailer.php

namespace App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MyMailer
{
    protected $phpMailer;

    public function __construct(PHPMailer $phpMailer)
    {
        $this->phpMailer = $phpMailer;
    }

    public function sendEmail($to, $subject, $body)
    {
        try {
            // Configurar destinatario, asunto y cuerpo del correo
            $this->phpMailer->addAddress($to);
            $this->phpMailer->Subject = $subject;
            $this->phpMailer->Body = $body;

            // Enviar correo
            return $this->phpMailer->send();
        } catch (Exception $e) {
            // Manejar la excepción aquí si es necesario
            throw $e; // Lanza la excepción para que sea manejada en el código de prueba
        }
    }

    public function sendEmailWithAttachment($to, $subject, $body, $attachmentPath)
    {
        try {
            // Configurar destinatario, asunto y cuerpo del correo
            $this->phpMailer->addAddress($to);
            $this->phpMailer->Subject = $subject;
            $this->phpMailer->Body = $body;

            // Adjuntar archivo
            $this->phpMailer->addAttachment($attachmentPath);

            // Enviar correo
            return $this->phpMailer->send();
        } catch (Exception $e) {
            // Manejar la excepción aquí si es necesario
            throw $e; // Puedes lanzar la excepción para que sea manejada en el código de prueba
        }
    }
}



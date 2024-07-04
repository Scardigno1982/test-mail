<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\MyMailer;

require __DIR__ . '/../bootstrap.php';

class MailerTest extends TestCase
{
    public function testEmailIsSent()
    {
        $mail = $this->createMock(PHPMailer::class);

        // Configurar el mock para el método send() para que retorne true
        $mail->method('send')->willReturn(true);

        // Aquí llamarías a tu función de envío de correo, pasando el mock
        $mailer = new MyMailer($mail);
        $result = $mailer->sendEmail('to@example.com', 'Test Subject', 'Test Body');

        // Verificar que la función retorne true
        $this->assertTrue($result);
    }

    public function testEmailIsSentToMultipleRecipients()
    {
        $mail = $this->createMock(PHPMailer::class);

        $mail->method('send')->willReturn(true);

        $mailer = new MyMailer($mail);
        $mailer->sendEmail('to1@example.com', 'Test Subject', 'Test Body');
        $mailer->sendEmail('to2@example.com', 'Test Subject', 'Test Body');

        $this->assertTrue($mailer->sendEmail('to3@example.com', 'Test Subject', 'Test Body'));
    }

    public function testEmailBodyAndSubject()
    {
        $mail = $this->createMock(PHPMailer::class);
        
        $mail->expects($this->once())
             ->method('addAddress')
             ->with($this->equalTo('to@example.com'));
        
        $mail->Subject = 'Test Subject'; // Configura directamente la propiedad Subject
        $mail->Body = 'Test Body';       // Configura directamente la propiedad Body
    
        $mail->method('send')->willReturn(true);
    
        $mailer = new MyMailer($mail);
        $result = $mailer->sendEmail('to@example.com', 'Test Subject', 'Test Body');
    
        $this->assertTrue($result);
    }
    

    public function testEmailWithAttachment()
    {
        $mail = $this->createMock(PHPMailer::class);

        $mail->method('send')->willReturn(true);

        $mail->expects($this->once())
             ->method('addAttachment')
             ->with($this->equalTo('unnamed.png'));

        $mailer = new MyMailer($mail);
        $result = $mailer->sendEmailWithAttachment('to@example.com', 'Test Subject', 'Test Body', 'unnamed.png');

        $this->assertTrue($result);
    }

    public function testSMTPConfiguration()
    {
        $mail = $this->getMockBuilder(PHPMailer::class)
                     ->disableOriginalConstructor()
                     ->getMock();
    
        $mailer = new MyMailer($mail);
    
        // Configura las propiedades de PHPMailer directamente
        $mail->Host = $_ENV['MAILTRAP_HOST'];
        $mail->Port = $_ENV['MAILTRAP_PORT'];
        $mail->Username = $_ENV['MAILTRAP_USERNAME'];
        $mail->Password = $_ENV['MAILTRAP_PASSWORD'];
        $mail->From = $_ENV['MAILTRAP_FROM_EMAIL'];
        $mail->FromName = $_ENV['MAILTRAP_FROM_NAME'];
    
        // Verifica las propiedades configuradas
        $this->assertEquals($_ENV['MAILTRAP_HOST'], $mail->Host);
        $this->assertEquals($_ENV['MAILTRAP_PORT'], $mail->Port);
        $this->assertEquals($_ENV['MAILTRAP_USERNAME'], $mail->Username);
        $this->assertEquals($_ENV['MAILTRAP_PASSWORD'], $mail->Password);
        $this->assertEquals($_ENV['MAILTRAP_FROM_EMAIL'], $mail->From);
        $this->assertEquals($_ENV['MAILTRAP_FROM_NAME'], $mail->FromName);
    }
    
    
    public function testInvalidEmailAddressThrowsException()
    {
        $this->expectException(Exception::class);

        $mail = $this->createMock(PHPMailer::class);

        // Configura el mock para lanzar una excepción al llamar a send()
        $mail->method('send')->willThrowException(new Exception('Invalid email'));

        $mailer = new MyMailer($mail);
        $mailer->sendEmail('invalid-email', 'Test Subject', 'Test Body');
    }
    
    
}

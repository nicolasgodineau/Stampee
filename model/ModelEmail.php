<?php
require_once __DIR__ . '/vendor/phpmailer/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/phpmailer/src/PHPMailer.php';

require '../vendor/autoload.php';

class Email
{

    public function sendMail()
    {


        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp-mail.outlook.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = '2295324@cmaisonneuve.qc.ca';                 // SMTP username
            $mail->Password = '860928';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->addAddress('2295324@cmaisonneuve.qc.ca');     // Add a recipient              // Name is optional


            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Hey voici une nouvelle liste de noel';
            $mail->Body    = 'Cher papa noel!';

            $mail->send();
            echo 'Message envoyé';
        } catch (Exception $e) {
            echo 'Message non envoyé.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}
<?php

namespace Classes;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';
class Email {


    public function enviarConfirmacion() {
        // $mail = new PHPMailer();

        $res = true;
        try {
            $phpmailer = new PHPMailer();
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '73b00f76649c7a';
            $phpmailer->Password = '95b765dd122ca0';

            //Recipients
            $phpmailer->setFrom('from@example.com', 'Mailer');
            $phpmailer->addAddress('joe@example.net', 'Joe User'); //Add a recipient
            $phpmailer->addAddress('ellen@example.com'); //Name is optional
            $phpmailer->addReplyTo('info@example.com', 'Information');
            $phpmailer->addCC('cc@example.com');
            $phpmailer->addBCC('bcc@example.com');

            //Attachments
            $phpmailer->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
            $phpmailer->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

            //Content
            $phpmailer->isHTML(true); //Set email format to HTML
            $phpmailer->Subject = 'Here is the subject';
            $phpmailer->Body = 'This is the HTML message body <b>in bold!</b>';
            $phpmailer->AltBody = 'This is the body in plain text for non-HTML phpmailer clients';

            $phpmailer->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
            $res = false;
        }

        return $res;
    }


}
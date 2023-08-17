<?php

require 'vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['recipient'])) {
    $recipientEmail = $_POST['recipient'];

    $mail = new PHPMailer(true); 

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'priyalchaudhari01@gmail.com';
        $mail->Password = 'aghgkrakdsylsgwp';
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587; 

        // Sender and recipient
        $mail->setFrom('priyalchaudhari01@gmail.com', 'Priyal');
        $mail->addAddress($recipientEmail, 'Recipient Name');

        
        $mail->isHTML(true);
        $mail->Subject = 'Test mail using PHPMailer';
        $mail->Body = 'Laravel';

        // Attachment 
        $mail->addAttachment('face.jpg');

        // CC
        $mail->addCC('isha.dadhania@gmail.com', 'CC Recipient');
        $mail->addCC('parth.suthar@brainvire.com', 'CC Recipient');

        // BCC
        $mail->addBCC('nihar.talaviya@brainvire.com', 'BCC Recipient');

        // simple mail
        $mail->send();
        echo 'Simple email sent successfully<br>';

        // Attachment 
        $mail->clearAllRecipients(); 
        $mail->addAddress($recipientEmail, 'Recipient Name');
        $mail->send();
        echo 'Attachment email sent successfully<br>';

        // CC 
        $mail->clearAllRecipients(); 
        $mail->addAddress($recipientEmail, 'Recipient Name');
        $mail->addCC('isha.dadhania@gmail.com', 'CC Recipient');
        $mail->addCC('parth.suthar@brainvire.com', 'CC Recipient');
        $mail->send();
        echo 'CC email sent successfully<br>';

        // BCC 
        $mail->clearAllRecipients();
        $mail->addAddress($recipientEmail, 'Recipient Name');
        $mail->addBCC('nihar.talaviya@brainvire.com', 'BCC Recipient');
        $mail->send();
        echo 'BCC email sent successfully<br>';
        
    } catch (Exception $e) {
        echo "Email sending failed. Error: {$mail->ErrorInfo}";
    }
}

?>

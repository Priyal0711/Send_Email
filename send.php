<?php


require 'vendor/autoload.php'; // Make sure this path points to the autoload.php file from your Composer installation


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['recipient'])) {
    $recipientEmail = $_POST['recipient'];

    $mail = new PHPMailer(true); // Passing `true` enables exceptions

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'priyalchaudhari01@gmail.com';
        $mail->Password = 'aghgkrakdsylsgwp';
        $mail->SMTPSecure = 'tls'; // Use `SMTPS` for SMTP over SSL
        $mail->Port = 587; // Your SMTP port

        // Sender and recipient
        $mail->setFrom('priyalchaudhari01@gmail.com', 'Priyal');
        $mail->addAddress($recipientEmail, 'Recipient Name');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Test mail using PHPMailer';
        $mail->Body = 'Laravel';

        // Attachment file
        $mail->addAttachment('face.jpg');

        // CC
        $mail->addCC('isha.dadhania@gmail.com', 'CC Recipient');
        // $mail->addCC('parth.suthar@brainvire.com', 'CC Recipient');

        // BCC
        $mail->addBCC('nihar.talaviya@brainvire.com', 'BCC Recipient');

        $mail->send();
        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo "Email sending failed. Error: {$mail->ErrorInfo}";
    }
}



?>

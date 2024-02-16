<?php
require 'includes/Exception.php';
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


$mail = new PHPMailer();

$mail->isSMTP();

$mail->Host = "smtp.gmail.com";

$mail->SMTPAuth = "true";

$mail->SMTPSecure = "tls";

$mail->Port = "587";

$mail->Username = "prestationsKiz@gmail.com";

$mail->Password = "chap wqxx ooqb oaql";

$mail->Subject = " Test Emailing Using PhpMailer";

$mail->setFrom("prestationsKiz@gmail.com");

$mail->Body = "this is plan texte email";

$mail->addAddress("prestationsKiz@gmail.com");



if ($mail->send()) {
    echo "Email send ...!";
} else {
    echo "Error...!";
}

$mail->smtpClose();

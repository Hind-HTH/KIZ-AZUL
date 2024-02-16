<?php
require 'includes/Exception.php';
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function sendEmail($nom, $prenom, $tel, $email_utilisateur, $texte ) {
$mail = new PHPMailer();

$mail->isSMTP();

$mail->Host = "smtp.gmail.com";

$mail->SMTPAuth = "true";

$mail->SMTPSecure = "tls";

$mail->Port = "587";

$mail->Username = "prestationsKiz@gmail.com"; // recois

$mail->Password = "chap wqxx ooqb oaql";

$mail->Subject = " Demande de contact depuis le formulaire";

$mail->setFrom($email_utilisateur); //envoie

$mail->Body =  "Nom: $nom\nPrénom: $prenom\nTéléphone: $tel\nAdresse e-mail: $email_utilisateur\n\n Sujet:$texte "; //envoit le body de mail

$mail->addAddress('prestationsKiz@gmail.com'); //recoit



if ($mail->send()) {
    echo "Email send ...!";
} else {
    echo "Error...!" . $mail->ErrorInfo;
}

$mail->smtpClose();
}
<?php 



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$mail = new PHPMailer(true);

try {
    // Configuration du serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'espoircompagnie0001@gmail.com';
    $mail->Password = 'ciqypbffltcqtvjp'; // ⚠️ mot de passe d'application SANS espaces
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    // Expéditeur et destinataire
    $mail->setFrom($_POST['email'], $_POST['nom']);
    $mail->addAddress('devmike0002@gmail.com', 'Dev Mike'); // Adresse du destinataire

    // Contenu
    $mail->isHTML(true);
    $mail->Subject = 'Colaboration avec Dev Mike';
    $mail->Body = $_POST['message'];

    // Envoi
    $mail->send();
    echo '✅ Merci d\'avoir envoyer un email.';
} catch (Exception $e) {
    echo '❌ Erreur lors de l\'envoi : ' . $mail->ErrorInfo;
}
?>

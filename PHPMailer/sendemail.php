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
    $mail->setFrom('espoircompagnie0001@gmail.com', 'Michee');
    $mail->addAddress($_POST['email'], $_POST['prenom'].' '.$_POST['nom']);

    // Contenu
    $mail->isHTML(true);
    $mail->Subject = 'Confirmation d\'email';
    $mail->Body = 'Afin de valider votre adresse email, merci de cliqquer sur le lien suivant : <a href="localhost/webcms/verification.php?token='.$token.'&email='.$_POST['email'].'">Confirmer votre email</a>';

    // Envoi
    $mail->send();
    echo '✅ Un mail vous a été envoyé pour la creation de votre compte.';
} catch (Exception $e) {
    echo '❌ Erreur lors de l\'envoi : ' . $mail->ErrorInfo;
}
?>

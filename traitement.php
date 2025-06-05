<?php
    if(isset($_POST['envoyer'])){
        if(empty($_POST['nom'])){
            echo "<script>alert('Veuillez saisir votre nom !');</script>";
        }
        elseif(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            echo "Veuillez saisir votre email !";
        }
        elseif(empty($_POST['message'])){
            echo "Veuillez saisir votre message !";
        }
        else{
            require_once 'PHPMailer/sendemail.php';

        }

    }
    else{
        echo "Il faut valider votre formulaire";
    }


?>
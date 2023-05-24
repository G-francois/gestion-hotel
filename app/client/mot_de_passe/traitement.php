<?php

use Random\Engine\Secure;

session_start();

include './app/commum/fonction.php';

$_SESSION['verification-erreurs'] = [];

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];


if (isset($_POST["email"]) && !empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $donnees["email"] = $_POST["email"];
} else {
    $erreurs["email"] = "Le champs email est requis. Veuillez le renseigné.";
}


$_SESSION['donnees-utilisateur'] = $donnees;

$_SESSION['validation2'] = "";

$_SESSION['verification'] = "";

$_SESSION['email-utilisateur'] = $id_utilisateur;

if ((!check_email_exist_in_db($_POST["email"]))) {
    $erreurs["email"] = "Vérifier l'adresse mail saisie";
}

if (empty($erreurs)) {

    if (check_email_exist_in_db($_POST["email"])) {
        $_token = uniqid("");
        $id_utilisateur = recuperer_id_utilisateur_par_son_mail($donnees['email'])[0]['id'];

        if (insertion_token($id_utilisateur, 'NOUVEAU_MOT_DE_PASSE', $_token)) {
            $_SESSION['modification_mot_passe'] = [];
            $_SESSION['modification_mot_passe']['id_utilisateur'] = $id_utilisateur;
            $_SESSION['modification_mot_passe']['token'] = $_token;
        }

        $objet = 'Modification de mot de passe';
        $message = buffer_html_file('..' . PATH_PROJECT . 'app/client/mot_de_passe/message_mail.php');
        if (send_email($donnees["email"], $objet, $message)) {

            $donnees = ($_POST["email"]);
            //Création du cookie
            setcookie(
                "mot_passe",
                json_encode($donnees['email']),
                [
                    'expires' => time() + 365 * 24 * 36000,
                    'path' => '/',
                    'secure' => 'true',
                    'httponly' => 'true',
                ]
            );

            $_SESSION['validation2'] = "Veuiller bien consulter votre adresse mail pour effectuer la modification ";
            header('location: ' . PATH_PROJECT . 'client/mot_de_passe/index');
        } else {
            $_SESSION['verification'] = "Oups une erreur s'est produite lors de la réinitialisation";
            header('location: ' . PATH_PROJECT . 'client/mot_de_passe/index');
        }
    }
} else {

    $_SESSION['verification-erreurs'] = $erreurs;

    header('location: ' . PATH_PROJECT . 'client/mot_de_passe/index');
}

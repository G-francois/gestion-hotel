<?php

$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];

if (isset($_POST["email-nom-utilisateur"]) && !empty($_POST["email-nom-utilisateur"])) {
    $donnees["email-nom-utilisateur"] = $_POST["email-nom-utilisateur"];
} else {
    $erreurs["email-nom-utilisateur"] = "Le champs email ou nom utilisateur est requis. Veuillez le renseigné.";
}

if (isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"])) {
    $donnees["mot-passe"] = $_POST["mot-passe"];
} else {
    $erreurs["mot-passe"] = "Le champs mot de passe est requis. Veuillez le renseigné.";
}

if (isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"]) && isset($_POST["email-nom-utilisateur"]) && !empty($_POST["email-nom-utilisateur"])) {

    if (check_if_user_exist($donnees["email-nom-utilisateur"], $donnees["mot-passe"], "Client",  1, 0)) {
        header('location: ' . PATH_PROJECT . 'client/dashboard/index');
    } else {
        header('location: ' . PATH_PROJECT . 'client/connexion/index');
        $message_erreur_global = "L'adresse email ou le mot de passe est incorrecte. Veuiller le reéssayer.";
    }
}

if (empty($erreurs)) {
    $_SESSION['donnees-utilisateur'] = $donnees;
} else {
    $_SESSION['donnees-utilisateur'] = $donnees;
    $_SESSION['connexion-erreurs'] = $erreurs;
    header('location: '.PATH_PROJECT .'client/connexion/index');
}

$_SESSION['connexion-message-erreur-global'] = $message_erreur_global;
$_SESSION['connexion-message-success-global'] = $message_success_global;

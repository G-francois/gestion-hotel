<?php
session_start();

include './app/commum/fonction.php';

$_SESSION['connexion-erreurs'] = [];

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];

$_SESSION['message-erreurs'] = "";

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
        header('location: '.PATH_PROJECT .'client/dashboard/index');
    }else {

        $_SESSION['connexion-erreurs'] = $erreurs;
        $erreurs["mot-passe"] = "L'adresse email ou le mot de passe est incorrecte. Veuiller le reéssayer.";
    }
}

if (empty($erreurs)) {
    $_SESSION['donnees-utilisateur'] = $donnees;
} else {
    $_SESSION['donnees-utilisateur'] = $donnees;
    $_SESSION['connexion-erreurs'] = $erreurs;
    header('location: '.PATH_PROJECT .'client/connexion/index');
}

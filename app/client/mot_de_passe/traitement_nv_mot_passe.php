<?php
session_start();

include './app/commum/fonction.php';

$_SESSION['enregistrer-erreurs'] = [];

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];

if (!isset($_POST["mot-passe"]) || empty($_POST["mot-passe"])) {
    $erreurs["mot-passe"] = "Le champs du nouveau mot de passe est vide. Veuillez le renseigné.";
}

if (isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"]) && strlen(($_POST["mot-passe"])) < 8) {
    $erreurs["mot-passe"] = "Le champs doit contenir minimum 8 caractères. Les espaces ne sont pas pris en compte.";
}

if (isset($_POST["mot-passe"]) && strlen(($_POST["mot-passe"])) >= 8) {
    $donnees["mot-passe"] = $_POST["mot-passe"];
}

if (isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"]) && strlen(($_POST["mot-passe"])) >= 8 && empty($_POST["retapez-mot-passe"])) {
    $erreurs["retapez-mot-passe"] = "Entrez votre mot de passe à nouveau.";
}

if ((isset($_POST["retapez-mot-passe"]) && !empty($_POST["retapez-mot-passe"]) && strlen(($_POST["mot-passe"])) >= 8 && $_POST["retapez-mot-passe"] != $_POST["mot-passe"])) {
    $erreurs["retapez-mot-passe"] = "Mot de passe erroné. Entrez le mot de passe du précédent champs";
}

if ((isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"]) && strlen(($_POST["mot-passe"])) >= 8 && $_POST["retapez-mot-passe"] == $_POST["mot-passe"])) {
    $donnees["mot-passe"] = $_POST['mot-passe'];
}


$_SESSION['donnees-utilisateur'] = $donnees;


if (empty($erreurs)) {
    if (maj_mot_passe($_SESSION['utilisateur_connecter'][0]['id'], $donnees["mot-passe"])) {
        header('location:/' . GESTION_HOTEL . '/client/connexion/index');
    } else {
        $_SESSION['enregistrer-erreurs'] = $erreurs;
        header('location: /'.GESTION_HOTEL .'/client/mot_de_passe/nv_mot_passe/');
    }
} else {
    $_SESSION['enregistrer-erreurs'] = $erreurs;
    header('location: /'.GESTION_HOTEL .'/client/mot_de_passe/nv_mot_passe/');
}
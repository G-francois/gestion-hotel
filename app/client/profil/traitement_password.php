<?php
session_start();

include './app/commum/fonction.php';

$_SESSION['changement-erreurs'] = [];

$donnees = [];

$erreurs = [];


if (isset($_POST['change_password'])) {

    if (!isset($_POST["newpassword"]) || empty($_POST["newpassword"])) {
        $erreurs["newpassword"] = "Le champs du nouveau mot de passe est vide. Veuillez le renseigné.";
    }

    if (isset($_POST["newpassword"]) && !empty($_POST["newpassword"]) && strlen(($_POST["newpassword"])) < 8) {
        $erreurs["newpassword"] = "Le champs doit contenir minimum 8 caractères. Les espaces ne sont pas pris en compte.";
    }

    if (isset($_POST["newpassword"]) && strlen(($_POST["newpassword"])) >= 8) {
        $donnees["newpassword"] = $_POST["newpassword"];
    }

    if (isset($_POST["newpassword"]) && !empty($_POST["newpassword"]) && strlen(($_POST["newpassword"])) >= 8 && empty($_POST["renewpassword"])) {
        $erreurs["renewpassword"] = "Entrez votre mot de passe à nouveau.";
    }

    if ((isset($_POST["renewpassword"]) && !empty($_POST["renewpassword"]) && strlen(($_POST["newpassword"])) >= 8 && $_POST["renewpassword"] != $_POST["newpassword"])) {
        $erreurs["renewpassword"] = "Mot de passe erroné. Entrez le mot de passe du précédent champs";
    }

    if ((isset($_POST["newpassword"]) && !empty($_POST["newpassword"]) && strlen(($_POST["newpassword"])) >= 8 && $_POST["renewpassword"] == $_POST["newpassword"])) {
        $donnees["newpassword"] = $_POST['newpassword'];
    }

    if (!check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter'][0]['id'])) {
        $erreurs["password"] = "Mot de passe incorrecte. Veuillez réessayez";
    }
}

//die (var_dump(($_SESSION['utilisateur_connecter'][0]['id'])));

if (empty($erreurs)) {

    if (maj_mot_passe($_SESSION['utilisateur_connecter'][0]['id'], $donnees["newpassword"])) {
        session_destroy();
        header('location:/' . GESTION_HOTEL . '/client/connexion/index');
    } else {
        $_SESSION['changement-erreurs'] = $erreurs;
        header('location:/' . GESTION_HOTEL . '/client/profil/profile');
    }
} else {
    $_SESSION['changement-erreurs'] = $erreurs;
    header('location:/' . GESTION_HOTEL . '/client/profil/profile');
}

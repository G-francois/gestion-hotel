<?php

$donnees = [];
$erreurs = [];


if (isset($_POST['change_password'])) {

    if (isset($_POST["newpassword"]) && !empty($_POST["newpassword"])) {
        $donnees["newpassword"] = $_POST["newpassword"];
    } else {
        $erreurs["newpassword"] = "Le champ du nouveau mot de passe est requis. Veuillez le renseigner.";
    }

    if (isset($_POST["newpassword"]) && !empty($_POST["newpassword"]) && strlen($_POST["newpassword"]) >= 8 && empty($_POST["renewpassword"])) {
        $erreurs["renewpassword"] = "Entrez votre mot de passe à nouveau.";
    }

    if ((isset($_POST["renewpassword"]) && !empty($_POST["renewpassword"]) && strlen($_POST["newpassword"]) >= 8 && $_POST["renewpassword"] != $_POST["newpassword"])) {
        $erreurs["renewpassword"] = "Mot de passe erroné. Entrez le mot de passe du précédent champs";
    }

    if ((isset($_POST["newpassword"]) && !empty($_POST["newpassword"]) && strlen($_POST["newpassword"]) >= 8 && $_POST["renewpassword"] == $_POST["newpassword"])) {
        $donnees["newpassword"] = $_POST['newpassword'];
    }

    if (!check_password_exist($_POST['password'], $_SESSION['utilisateur_connecter_client']['id'])) {
        $erreurs["password"] = "Mot de passe incorrecte. Veuillez réessayez";
    }
}


if (empty($erreurs)) {
    if (mise_a_jour_mot_passe($_SESSION['utilisateur_connecter_client']['id'], $donnees["newpassword"])) {
        session_destroy();
        header('location:' . PATH_PROJECT . 'client/connexion');
    } else {
        $_SESSION['changement-erreurs'] = $erreurs;
        header('location:' . PATH_PROJECT . 'client/profil');
    }
} else {
    $_SESSION['changement-erreurs'] = $erreurs;
    header('location:' . PATH_PROJECT . 'client/profil');
}
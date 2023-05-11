<?php
session_start();

include './app/commum/fonction.php';

$_SESSION['suppression-erreurs'] = "";

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];

if (isset($_POST['suppression'])) {

    if (check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter'][0]['id'])) {
        if (supprimer_utilisateur($_SESSION['utilisateur_connecter'][0]['id'])) {
            session_destroy();
            header('location:/' . GESTION_HOTEL . '/client/site/home');
        } else {
            $_SESSION['suppression-erreurs'] = "La suppression à echouer. Veuiller réessayez.";
            header('location:/' . GESTION_HOTEL . '/client/profil/profile');
        }
    } else {
        $_SESSION['suppression-erreurs'] = "La suppression à echouer. Vérifier votre mot de passe et réessayez.";
        header('location:/' . GESTION_HOTEL . '/client/profil/profile');
    }
} else {
    $_SESSION['desactivation-erreurs'] = "La desactivation à echouer. Veuiller réessayez.";
    header('location:/' . GESTION_HOTEL . '/client/profil/profile');
}

<?php
$_SESSION['suppression-erreurs'] = "";

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];

if (isset($_POST['suppression'])) {

    if (check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter_client']['id'])) {
        if (supprimer_utilisateur($_SESSION['utilisateur_connecter_client']['id'])) {
            session_destroy();
            header('location:' . PATH_PROJECT . 'client/site/home');
        } else {
            $_SESSION['suppression-erreurs'] = "La suppression à echouer. Veuiller réessayez.";
            header('location:' . PATH_PROJECT . 'client/profil/profile');
        }
    } else {
        $_SESSION['suppression-erreurs'] = "La suppression à echouer. Vérifier votre mot de passe et réessayez.";
        header('location:' . PATH_PROJECT . 'client/profil/profile');
    }
} else {
    $_SESSION['desactivation-erreurs'] = "La desactivation à echouer. Veuiller réessayez.";
    header('location:' . PATH_PROJECT . 'client/profil/profile');
}

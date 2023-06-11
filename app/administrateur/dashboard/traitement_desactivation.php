
<?php

$_SESSION['desactivation-erreurs-admin'] = "";

$_SESSION['donnees-utilisateur-admin'] = [];

$donnees = [];

$erreurs = [];

if (isset($_POST['desactivation'])) {

    if (check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter_admin']['id'])) {
        if (desactiver_utilisateur($_SESSION['utilisateur_connecter_admin']['id'])) {
            session_destroy();
            header('location:' . PATH_PROJECT . 'administrateur/connexion/index');
        } else {
            $_SESSION['desactivation-erreurs-admin'] = "La desactivation à echouer. Veuiller réessayez.";
        }
    } else {
        $_SESSION['desactivation-erreurs-admin'] = "La desactivation à echouer. Vérifier votre mot de passe et réessayez.";
    }
} else {
    $_SESSION['desactivation-erreurs-admin'] = "La desactivation à echouer. Veuiller réessayez.";
}

header('location:' . PATH_PROJECT . 'administrateur/dashboard/profil');
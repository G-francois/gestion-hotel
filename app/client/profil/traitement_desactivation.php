
<?php

$_SESSION['desactivation-erreurs'] = "";

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];

if (isset($_POST['desactivation'])) {

    if (check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter_client']['id'])) {
        if (desactiver_utilisateur($_SESSION['utilisateur_connecter_client']['id'])) {
            session_destroy();
            header('location:' . PATH_PROJECT . 'client/acceuil');
        } else {
            $_SESSION['desactivation-erreurs'] = "La desactivation à echouer. Veuiller réessayez.";
            header('location:' . PATH_PROJECT . 'client/profil');
        }
    } else {
        $_SESSION['desactivation-erreurs'] = "La desactivation à echouer. Vérifier votre mot de passe et réessayez.";
        header('location:' . PATH_PROJECT . 'client/profil');
    }
} else {
    $_SESSION['desactivation-erreurs'] = "La desactivation à echouer. Veuiller réessayez.";
    header('location:' . PATH_PROJECT . 'client/profil');
}

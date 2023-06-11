<?php
$_SESSION['sauvegarder-erreurs-admin'] = "";

$_SESSION['donnees-utilisateur-admin'] = [];

$donnees = [];

$erreurs = [];

if (isset($_POST['suppression'])) {

    if (check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter_admin']['id'])) {
        if (supprimer_utilisateur($_SESSION['utilisateur_connecter_admin']['id'])) {
            session_destroy();
            header('location:' . PATH_PROJECT . 'administrateur/connexion/index');
        } else {
            $_SESSION['sauvegarder-erreurs-admin'] = "La suppression à echouer. Veuiller réessayez.";  
        }
    } else {
        $_SESSION['sauvegarder-erreurs-admin'] = "La suppression à echouer. Vérifier votre mot de passe et réessayez.";
    }
} else {
    $_SESSION['sauvegarder-erreurs-admin'] = "La suppresion à echouer. Veuiller réessayez.";
}

$_SESSION['suppression-message-success-global'] = $message_success_global;
header('location:' . PATH_PROJECT . 'administrateur/dashboard/profil');


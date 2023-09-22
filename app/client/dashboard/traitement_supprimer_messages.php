<?php

$donnees = [];

$erreurs = [];

$messages = $_POST['message_id'];

if (isset($_POST['supprimer'])) {

    if (check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter_client']['id'])) {

        if (supprimer_messages($messages)) {
            // die(var_dump(supprimer_reservation($messages)));
            $message_success_global = "La suppression du message a été effectuer avec succès.";
        } else {
            $message_erreur_global  = "La suppression à echouer. Veuiller réessayez.";
        }
    } else {
        $message_erreur_global  = "La suppression à echouer. Vérifier votre mot de passe et réessayez.";
    }
} else {
    $message_erreur_global  = "La suppression à echouer. Veuiller réessayez.";
}

$_SESSION['message-erreur-global'] = $message_erreur_global;
$_SESSION['message-success-global'] = $message_success_global;
header('location: ' . PATH_PROJECT . 'client/dashboard/liste_des_messages');

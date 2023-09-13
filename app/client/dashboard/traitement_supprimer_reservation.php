<?php
$_SESSION['suppression-erreurs'] = "";

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];

$num_res = $_POST['reservation_id'];

$typeChambre = $_POST['type_chambre'];

if (isset($_POST['supprimer'])) {

    if (check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter_client']['id'])) {
        if (supprimer_reservation($num_res)) {
            $message_success_global = "La suppression de la réservation été effectuer avec succès.";
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
header('location: ' . PATH_PROJECT . 'client/dashboard/index');

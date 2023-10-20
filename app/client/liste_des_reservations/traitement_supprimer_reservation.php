<?php
$_SESSION['suppression-erreurs'] = "";
$_SESSION['donnees-utilisateur'] = [];

$donnees = [];
$erreurs = [];

// Récupération de l'ID de la réservation et du type de chambre
$num_res = $_POST['reservation_id'];
$typeChambre = $_POST['type_chambre'];

// Vérification de la demande de suppression
if (isset($_POST['supprimer'])) {

    // Vérification de l'existence du mot de passe
    if (check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter_client']['id'])) {
        // Suppression de la réservation
        if (supprimer_reservation($num_res)) {
            $message_success_global = "La suppression de la réservation a été effectuée avec succès.";
        } else {
            $message_erreur_global  = "La suppression a échoué. Veuillez réessayer.";
        }
    } else {
        $message_erreur_global  = "La suppression a échoué. Veuillez vérifier votre mot de passe et réessayer.";
    }
} else {
    $message_erreur_global  = "La suppression a échoué. Veuillez réessayer.";
}

// Stockage des messages dans les variables de session et redirection vers la page de liste des réservations
$_SESSION['message-erreur-global'] = $message_erreur_global;
$_SESSION['message-success-global'] = $message_success_global;
header('location: ' . PATH_PROJECT . 'client/liste_des_reservations');

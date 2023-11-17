<?php
$reservbationId = $params[3];

// Appeler la fonction de suppression de repas
if (supprimer_reservations_administrateur($reservbationId) && supprimer_accompagnateur_administrateur($reservbationId)) {
    $message_success_global = "La réservation a été supprimé avec succès !";
} else {
    $message_erreur_global = "Oups ! Une erreur s'est produite lors de la suppression de la réservbation.";
}

$_SESSION['message-erreur-global'] = $message_erreur_global;
$_SESSION['message-success-global'] = $message_success_global;
header('Location: ' . PATH_PROJECT . 'administrateur/reservations/liste-reservations');

<?php

$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];

if (check_password_exist($_POST['password'], $_SESSION['utilisateur_connecter_client']['id'])) {

    if (isset($_POST["subject"]) && !empty($_POST["subject"])) {
        $donnees["subject"] = $_POST["subject"];
    } else {
        $erreurs["subject"] = "Le champs sujet du message est requis. Veuillez le renseigné.";
    }

    if (isset($_POST["message"]) && !empty($_POST["message"])) {
        $donnees["message"] = $_POST["message"];
    } else {
        $erreurs["message"] = "Le champs message est requis. Veuillez le renseigné.";
    }

    if (empty($donnees['subject']) || empty($donnees['message'])) {
        $message_erreur_global = 'Une erreur est survenue. Il se peut que des informations manquent pour certains repas que vous avez soumis. Un repas soumis doit avoir un nom et un prix.';
    }

    if (!empty($donnees['subject']) && !empty($donnees['message']) && empty($message_erreur_global)) {

        $id = $_POST['message_id'];
        $type_sujet = $donnees["subject"];
        $messages = $donnees["message"];

        $mise_a_jour_message = modifier_messages($id, $type_sujet, $messages);

        // die(var_dump($mise_a_jour_message));

        if ($mise_a_jour_message) {
            // Le message a été effectuée avec succès
            $message_success_global = "Le message a été modifiée avec succès.";
        } else {
            // La mise à jour de la commande a échoué
            $message_erreur_global = "Désolé, une erreur s'est produite lors de la modification du message.";
        }
    }
} else {
    // Mot de passe incorrect
    $message_erreur_global  = "La modification a échoué. Vérifiez votre mot de passe et réessayez.";
}

$_SESSION['donnees-contact'] = $donnees;
$_SESSION['erreurs-contact'] = $erreurs;

// Redirection vers la page de liste des réservations avec un message de succès ou d'erreur
$_SESSION['message-erreur-global'] = $message_erreur_global;
$_SESSION['message-success-global'] = $message_success_global;
header('location: ' . PATH_PROJECT . 'client/liste_des_messages');

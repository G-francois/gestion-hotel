<?php

$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];

// Récupération de la date actuelle
$dateActuelle = date('d-m-Y');

if (isset($_POST['enregistrer'])) {

    if (isset($_POST["deb_occ"]) && !empty($_POST["deb_occ"])) {
        $donnees["deb_occ"] = $_POST["deb_occ"];
    } else {
        $erreurs["deb_occ"] = "Le champs date début de séjour est requis. Veuillez le renseigné.";
    }

    $dateDebut = $_POST['deb_occ'];

    // Vérification si la date de début est valide et supérieure ou égale à la date actuelle
    if (!empty($dateDebut) && $dateDebut >= $dateActuelle) {
        // La date de début est valide
        // Vous pouvez continuer le traitement de la réservation ici
    } else {
        $erreur = "La date de début doit être supérieure ou égale à la date actuelle.";
    }

    if (isset($_POST["fin_occ"]) && !empty($_POST["fin_occ"])) {
        $donnees["fin_occ"] = $_POST["fin_occ"];
    } else {
        $erreurs["fin_occ"] = "Le champs date fin de séjour est requis. Veuillez le renseigné.";
    }

    $_SESSION['donnees-reservation'] = $donnees;


    if (empty($erreurs)) {

        // Vérifiez d'abord si la clé 'num_chambre' existe dans $_POST
        if (!empty($params[3])) {
            // Récupérez la valeur de 'num_chambre' à l'aide de $_POST
            $numChambreDisponible = $params[3];

            $etat_chambre = verifier_chambre_actif_non_supprime($params[3]);
            // Vérifier si la chambre est active et non supprimée
            if ($etat_chambre) {

                $numClient = recuperer_id_utilisateur_par_son_mail($_SESSION['utilisateur_connecter_client']['email']);

                // Vérifier si les informations du client a réussi
                if (!empty($numClient)) {
                    // die(var_dump($numClient));

                    $debOcc = $donnees['deb_occ'];

                    $finOcc = $donnees['fin_occ'];

                    // Appeler la fonction pour insérer les informations de réservation dans la table "reservation"
                    $resultatInsertionReservation = enregistrer_reservation($numClient, $debOcc, $finOcc, $numChambreDisponible);

                    // Vérifier si l'insertion des informations de réservation a réussi
                    if ($resultatInsertionReservation) {
                        //Mettre à jour le statut de la chambre est actif à 0
                        $miseajour = mettre_a_jour_statut_chambre_reserver($numChambreDisponible);
                        // die(var_dump($miseajour));
                        if ($miseajour) {
                            $message_success_global = "Vous avez réservé la chambre numéro : " . $numChambreDisponible . " .";
                        }
                    } else {
                        // La réservation a échoué
                        $message_erreur_global =  "Désolé, une erreur s'est produite lors de la réservation de la chambre.";
                    }
                } else {
                    // La vérification des informations du client a échoué
                    $message_erreur_global = "Désolé, une erreur s'est produite lors de la  vérification de vos informations.";
                }
            } else {
                // La chambre n'est pas active ou a été supprimée
                $message_erreur_global = "Désolé, le numéro de chambre n'est pas disponible pour le moment.";
            }
        } else {
            // Aucune chambre disponible de type "Solo"
            $message_erreur_global = "Désolé, le numéro de chambre  n'est pas disponible pour le moment.";
        }
    }
}


$_SESSION['erreurs-reservation'] = $erreurs;
$_SESSION['reservation-message-erreur-global'] = $message_erreur_global;
$_SESSION['reservation-message-success-global'] = $message_success_global;
header('location: ' . PATH_PROJECT . 'client/chambres/details_chambre/' .  $params[3]);

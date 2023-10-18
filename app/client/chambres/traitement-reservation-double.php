<?php

$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];



if (isset($_POST['enregistrer'])) {

    if (!empty($_POST["nombre_accompagnateurs"])) {
        $donnees["nombre_accompagnateurs"] = $_POST["nombre_accompagnateurs"];
    }

    if (isset($_POST["nom_acc"])) {
        $donnees["nom_acc"] = $_POST["nom_acc"];
    }

    if (isset($_POST["contact_acc"])) {
        $donnees["contact_acc"] = $_POST["contact_acc"];
    }

    // Vérification si le champ "Nom Accompagnateur" est rempli, le champ "Contact Accompagnateur" doit être requis
    if (!empty($_POST["nom_acc"]) && empty($_POST["contact_acc"])) {
        $erreurs["contact_acc"] = "Le champ 'Contact Accompagnateur' est requis si le 'Nom Accompagnateur' est renseigné.";
    }

    if (empty($_POST["nom_acc"]) && !empty($_POST["contact_acc"])) {
        $erreurs["nom_acc"] = "Le champ 'Nom Accompagnateur' est requis si le 'Contact Accompagnateur' est renseigné.";
    }

    if (!empty($_POST["nom_acc"]) && !empty($_POST["contact_acc"])) {

        if (vérifier_nom_contact_accompagnateur_exist_in_db($_POST["nom_acc"], $_POST["contact_acc"])) {
            $numAccompagnateur = recuperer_num_acc_par_son_contact($_POST['contact_acc']);
        } elseif (vérifier_contact_accompagnateur_exist_in_db($_POST["contact_acc"])) {
            $erreurs["contact_acc"] = "Ce contact est déjà utilisé. Veuillez le changer.";
        } else {
            // Appeler la fonction pour insérer les informations de l'accompagnateur dans la table "accompagnateur"
            $resultatInsertionAccompagnateur = enregistrer_accompagnateur($_POST["nom_acc"], $_POST["contact_acc"]);
            $numAccompagnateur = recuperer_num_acc_par_son_contact($_POST['contact_acc']);
        }
    }

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

        if (!empty($params[3])) {
            
            $numChambreDisponible = $params[3];

            $etat_chambre = verifier_chambre_actif_non_supprime($params[3]);
            // Vérifier si la chambre est active et non supprimée
            if ($etat_chambre) {

                $numClient = recuperer_id_utilisateur_par_son_mail($_SESSION['utilisateur_connecter_client']['email']);

                // Vérifier si la recupération des informations du client a réussi
                if (!empty($numClient)) {

                    // die(var_dump($numClient));

                    $debOcc = $donnees['deb_occ'];

                    $finOcc = $donnees['fin_occ'];

                    // Appeler la fonction pour insérer les informations de réservation dans la table "reservation"
                    $resultatInsertionReservation = enregistrer_reservation($numClient, $debOcc, $finOcc, $numChambreDisponible);

                    // Vérifier si l'insertion des informations de réservation a réussi
                    if ($resultatInsertionReservation) {

                        //recupérer le numero de réservation
                        $numReservation = recuperer_num_res_par_num_chambre($numChambreDisponible);

                        if (!empty($_POST["nom_acc"]) && !empty($_POST["contact_acc"])) {

                            $insertionReservationAccompagnateur = enregistrer_accompagnateur_des_reservations($numReservation, $numAccompagnateur);
                        }

                        if ($insertionReservationAccompagnateur) {
                            //Mettre à jour le statut de la chambre est actif à 0
                            $miseajour = mettre_a_jour_statut_chambre_reserver($numChambreDisponible);
                            // die(var_dump($miseajour));
                            if ($miseajour) {
                                $message_success_global = "Réservation de la chambre " . $numChambreDisponible . " effectuée avec succès.";
                            } else {
                                // La  mise à jour du statut a échoué
                                $message_erreur_global =  "Désolé, une erreur s'est produite lors de la mise à jour du statut de la chambre reserver.";
                            }
                        } else {
                            // Linsertion de l'accompagnateur pour cette réservation a échoué
                            $message_erreur_global =  "Désolé, une erreur s'est produite lors de l'insertion de l'accompagnateur pour cette réservation.";
                        }

                    } else {
                        // La réservation a échoué
                        $message_erreur_global =  "Désolé, une erreur s'est produite lors de la réservation de la chambre.";
                    }
                } else {
                    // La recupération des informations du client a échoué
                    $message_erreur_global =  "Désolé, une erreur s'est produite lors de la recupération des informations du client.";
                }
            } else {
                // La chambre n'est pas active ou a été supprimée
                $message_erreur_global = "Désolé, le numéro de chambre n'est pas disponible pour le moment.";
            }
        } else {
            // Aucune chambre disponible de type "Doubles"
            $message_erreur_global = "Désolé, il n'y a pas de chambre disponible pour le moment.";
        }
    }
}


$_SESSION['erreurs-reservation'] = $erreurs;
$_SESSION['reservation-message-erreur-global'] = $message_erreur_global;
$_SESSION['reservation-message-success-global'] = $message_success_global;
header('location: ' . PATH_PROJECT . 'client/chambres/details_chambre/' .  $params[3]);

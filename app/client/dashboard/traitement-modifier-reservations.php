<?php
$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];

$num_res = $_POST['reservation_id'];

if (isset($_POST["deb_occ"]) && !empty($_POST["deb_occ"])) {
    $donnees["deb_occ"] = $_POST["deb_occ"];
} else {
    $erreurs["deb_occ"] = "Le champs date début de séjour est requis. Veuillez le renseigné.";
}

if (isset($_POST["fin_occ"]) && !empty($_POST["fin_occ"])) {
    $donnees["fin_occ"] = $_POST["fin_occ"];
} else {
    $erreurs["fin_occ"] = "Le champs date fin de séjour est requis. Veuillez le renseigné.";
}

if (is_array($_POST["nom_acc"])) {
    $donnees["nom_acc"] = $_POST["nom_acc"];
}

if (is_array($_POST["contact_acc"])) {
    $donnees["contact_acc"] = $_POST["contact_acc"];
}


$_SESSION['donnees-chambre-modifier'] = $donnees;
$_SESSION['erreurs-chambre-modifier'] = $erreurs;


// Effectuer les mises à jour nécessaires pour le type Doubles
if (empty($erreurs)) {

    $debOcc = $donnees['deb_occ'];

    $finOcc = $donnees['fin_occ'];

    // Appeler la fonction pour modifier les informations de réservation dans la table "reservations"
    $resultatmodifierReservationDoubles = modifier_reservation_chambre($_POST['num_chambre'],$num_res, $debOcc, $finOcc, $montantTotal);

    // Vérifier si la modification des informations de réservation a réussi

    if ($resultatmodifierReservationDoubles) {

        if (!empty($_POST["nom_acc"]) && !empty($_POST["contact_acc"])) {

            if (!vérifier_contact_accompagnateur_exist_in_db($_SESSION['donnees-chambre-modifier']["contact_acc"])) {
                // Appeler la fonction pour insérer les informations de l'accompagnateur dans la table "accompagnateur"
                $resultatInsertionAccompagnateur = enregistrer_accompagnateur($_SESSION['donnees-chambre-modifier']['nom_acc'], $_SESSION['donnees-chambre-modifier']['contact_acc']);
                $numAccompagnateur = recuperer_num_acc_par_son_contact($_SESSION['donnees-chambre-modifier']['contact_acc']);
                // Supprimer les entrées existantes d'accompagnateurs pour cette réservation
                $suppression_accompagnateurs = supprimer_accompagnateurs_reservation($num_res);
                $insertionReservationAccompagnateur = enregistrer_accompagnateur_des_reservations($num_res, $numAccompagnateur);
            } else {
                $numAccompagnateur = recuperer_num_acc_par_son_contact($_SESSION['donnees-chambre-modifier']['contact_acc']);
                // Supprimer les entrées existantes d'accompagnateurs pour cette réservation
                $suppression_accompagnateurs = supprimer_accompagnateurs_reservation($num_res);
                $insertionReservationAccompagnateur = enregistrer_accompagnateur_des_reservations($num_res, $numAccompagnateur);
            }
        } else {
            $suppression_accompagnateurs = supprimer_accompagnateurs_reservation($num_res);
        }

        if (!empty($_POST["nom_acc2"]) && !empty($_POST["contact_acc2"])) {

            if (!vérifier_contact_accompagnateur_exist_in_db($_SESSION['donnees-chambre-modifier']["contact_acc2"])) {
                // Appeler la fonction pour insérer les informations de l'accompagnateur dans la table "accompagnateur"
                $resultatInsertionAccompagnateur2 = enregistrer_accompagnateur($_SESSION['donnees-chambre-modifier']['nom_acc2'], $_SESSION['donnees-chambre-modifier']['contact_acc2']);
                $numAccompagnateur2 = recuperer_num_acc_par_son_contact($_SESSION['donnees-chambre-modifier']['contact_acc2']);
                // Supprimer les entrées existantes d'accompagnateurs pour cette réservation
                $suppression_accompagnateurs2 = supprimer_accompagnateurs_reservation($num_res);
                $insertionReservationAccompagnateur2 = enregistrer_accompagnateur_des_reservations($num_res, $numAccompagnateur2);
            } else {
                $numAccompagnateur2 = recuperer_num_acc_par_son_contact($_SESSION['donnees-chambre-modifier']['contact_acc2']);
                // Supprimer les entrées existantes d'accompagnateurs pour cette réservation
                $suppression_accompagnateurs2 = supprimer_accompagnateurs_reservation($num_res);
                $insertionReservationAccompagnateur2 = enregistrer_accompagnateur_des_reservations($num_res, $numAccompagnateur2);
            }
        } else {
            $suppression_accompagnateurs2 = supprimer_accompagnateurs_reservation($num_res);
        }

        if (!empty($_POST["nom_acc3"]) && !empty($_POST["contact_acc3"])) {

            if (!vérifier_contact_accompagnateur_exist_in_db($_SESSION['donnees-chambre-modifier']["contact_acc3"])) {
                // Appeler la fonction pour insérer les informations de l'accompagnateur dans la table "accompagnateur"
                $resultatInsertionAccompagnateu3 = enregistrer_accompagnateur($_SESSION['donnees-chambre-modifier']['nom_acc3'], $_SESSION['donnees-chambre-modifier']['contact_acc3']);
                $numAccompagnateur3 = recuperer_num_acc_par_son_contact($_SESSION['donnees-chambre-modifier']['contact_acc3']);
                // Supprimer les entrées existantes d'accompagnateurs pour cette réservation
                $suppression_accompagnateurs3 = supprimer_accompagnateurs_reservation($num_res);
                $insertionReservationAccompagnateur3 = enregistrer_accompagnateur_des_reservations($num_res, $numAccompagnateur3);
            } else {
                $numAccompagnateur3 = recuperer_num_acc_par_son_contact($_SESSION['donnees-chambre-modifier']['contact_acc2']);
                // Supprimer les entrées existantes d'accompagnateurs pour cette réservation
                $suppression_accompagnateurs3 = supprimer_accompagnateurs_reservation($num_res);
                $insertionReservationAccompagnateur3 = enregistrer_accompagnateur_des_reservations($num_res, $numAccompagnateur2);
            }
        } else {
            $suppression_accompagnateurs3 = supprimer_accompagnateurs_reservation($num_res);
        }

        
        if (!empty($_POST["nom_acc4"]) && !empty($_POST["contact_acc4"])) {

            if (!vérifier_contact_accompagnateur_exist_in_db($_SESSION['donnees-chambre-modifier']["contact_acc4"])) {
                // Appeler la fonction pour insérer les informations de l'accompagnateur dans la table "accompagnateur"
                $resultatInsertionAccompagnateu4 = enregistrer_accompagnateur($_SESSION['donnees-chambre-modifier']['nom_acc4'], $_SESSION['donnees-chambre-modifier']['contact_acc4']);
                $numAccompagnateur4 = recuperer_num_acc_par_son_contact($_SESSION['donnees-chambre-modifier']['contact_acc4']);
                // Supprimer les entrées existantes d'accompagnateurs pour cette réservation
                $suppression_accompagnateurs4 = supprimer_accompagnateurs_reservation($num_res);
                $insertionReservationAccompagnateur4 = enregistrer_accompagnateur_des_reservations($num_res, $numAccompagnateur4);
            } else {
                $numAccompagnateur4 = recuperer_num_acc_par_son_contact($_SESSION['donnees-chambre-modifier']['contact_acc4']);
                // Supprimer les entrées existantes d'accompagnateurs pour cette réservation
                $suppression_accompagnateurs4 = supprimer_accompagnateurs_reservation($num_res);
                $insertionReservationAccompagnateur3 = enregistrer_accompagnateur_des_reservations($num_res, $numAccompagnateur4);
            }
        } else {
            $suppression_accompagnateurs4 = supprimer_accompagnateurs_reservation($num_res);
        }

        $message_success_global = "La réservation de la chambre $typeChambre a été modifier avec succès !";
    } else {

        $message_erreur_global = "Oups ! Une erreur s'est produite lors de la modification de la réservation la chambre.";
    }
}


// Rediriger vers la page de liste des réservations avec un message de succès ou d'erreur

$_SESSION['message-erreur-global'] = $message_erreur_global;
$_SESSION['message-success-global'] = $message_success_global;
header('location: ' . PATH_PROJECT . 'client/dashboard/index');

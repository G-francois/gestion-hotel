<?php

$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];

$num_res = $_POST['reservation_id'];



if (!empty($_POST['type_chambre']) && $_POST['type_chambre'] == 'Doubles') {
    if (is_array($_POST['nom_acc']) && sizeof($_POST['nom_acc']) <= 1) {
        foreach ($_POST['nom_acc'] as $nom_acc) {
            if (!empty($nom_acc)) {
                $donnees['nom_acc'][] = $nom_acc;
            }
        }
    } else {
        $message_erreur_global = 'Une erreur est survenue. Soit une action inattendue bloque le processus soit vous essayez de soumettre plus d\'accompagnateurs qu\'il est possible d\'ajouter.';
    }

    if (is_array($_POST['contact_acc']) && sizeof($_POST['contact_acc']) <= 1) {
        foreach ($_POST['contact_acc'] as $contact_acc) {
            if (!empty($contact_acc)) {
                $donnees['contact_acc'][] = $contact_acc;
            }
        }
    } else {
        $message_erreur_global = 'Une erreur est survenue. Soit une action inattendue bloque le processus soit vous essayez de soumettre plus d\'accompagnateurs qu\'il est possible d\'ajouter.';
    }
}

if (!empty($_POST['type_chambre']) && $_POST['type_chambre'] == 'Triples') {
    if (is_array($_POST['nom_acc']) && sizeof($_POST['nom_acc']) <= 2) {
        foreach ($_POST['nom_acc'] as $nom_acc) {
            if (!empty($nom_acc)) {
                $donnees['nom_acc'][] = $nom_acc;
            }
        }
    } else {
        $message_erreur_global = 'Une erreur est survenue. Soit une action inattendue bloque le processus soit vous essayez de soumettre plus d\'accompagnateurs qu\'il est possible d\'ajouter.';
    }

    if (is_array($_POST['contact_acc']) && sizeof($_POST['contact_acc']) <= 2) {
        foreach ($_POST['contact_acc'] as $contact_acc) {
            if (!empty($contact_acc)) {
                $donnees['contact_acc'][] = $contact_acc;
            }
        }
    } else {
        $message_erreur_global = 'Une erreur est survenue. Soit une action inattendue bloque le processus soit vous essayez de soumettre plus d\'accompagnateurs qu\'il est possible d\'ajouter.';
    }
}

if (!empty($_POST['type_chambre']) && $_POST['type_chambre'] == 'Suite') {
    if (is_array($_POST['nom_acc']) && sizeof($_POST['nom_acc']) <= 4) {
        foreach ($_POST['nom_acc'] as $nom_acc) {
            if (!empty($nom_acc)) {
                $donnees['nom_acc'][] = $nom_acc;
            }
        }
    } else {
        $message_erreur_global = 'Une erreur est survenue. Soit une action inattendue bloque le processus soit vous essayez de soumettre plus d\'accompagnateurs qu\'il est possible d\'ajouter.';
    }

    if (is_array($_POST['contact_acc']) && sizeof($_POST['contact_acc']) <= 4) {
        foreach ($_POST['contact_acc'] as $contact_acc) {
            if (!empty($contact_acc)) {
                $donnees['contact_acc'][] = $contact_acc;
            }
        }
    } else {
        $message_erreur_global = 'Une erreur est survenue. Soit une action inattendue bloque le processus soit vous essayez de soumettre plus d\'accompagnateurs qu\'il est possible d\'ajouter.';
    }
}

if (!empty($donnees['nom_acc']) && !empty($donnees['contact_acc'])) {
    if (sizeof($donnees['nom_acc']) != sizeof($donnees['contact_acc'])) {
        $message_erreur_global = 'Une erreur est survenue. Il se peut que des informations manquent pour certains accompagnateurs que vous avez soumis. Un accompagnateur soumis doit avoir un nom et un contact.';
    }
}

if (empty($message_erreur_global)) {
    supprimer_accompagnateurs_reservation($num_res);

    foreach ($donnees['nom_acc'] as $key => $nom) {
        if (vérifier_nom_contact_accompagnateur_exist_in_db($nom, $donnees['contact_acc'][$key])) {
            $numAccompagnateur = recuperer_num_acc_par_son_contact($donnees['contact_acc'][$key]);
            mis_a_jour_accompagnateur_des_reservations($num_res, $numAccompagnateur);
        } else {
            if (vérifier_contact_accompagnateur_exist_in_db($donnees['contact_acc'][$key])) {
                $erreurs["contact_acc"] = "Ce contact est déjà utilisé. Veuillez le changez.";
            } else {
                $resultatInsertionAccompagnateur = enregistrer_accompagnateur($nom, $donnees['contact_acc'][$key]);
                $numAccompagnateur = recuperer_num_acc_par_son_contact($donnees['contact_acc'][$key]);
                mis_a_jour_accompagnateur_des_reservations($num_res, $numAccompagnateur);
            }
        }
    }
}

$_SESSION['donnees-chambre-modifier'] = $donnees;
$_SESSION['erreurs-chambre-modifier'] = $erreurs;

if (empty($erreurs)) {

    // Effectuez les mises à jour nécessaires dans la base de données
    $resultat_mise_a_jour = mettre_a_jour_accompagnateurs_reservation($num_res, $donnees);

    if ($resultat_mise_a_jour) {
        $message_success_global = "La réservation a été modifiée avec succès !";
    } else {
        $message_erreur_global = "Une erreur s'est produite lors de la modification de la réservation.";
    }
}
// Redirection vers la page de liste des réservations avec un message de succès ou d'erreur
$_SESSION['message-erreur-global'] = $message_erreur_global;
$_SESSION['message-success-global'] = $message_success_global;
header('location: ' . PATH_PROJECT . 'client/dashboard/index');

<?php

$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];

if (check_password_exist($_POST['password'], $_SESSION['utilisateur_connecter_client']['id'])) {
    // Utilisons une seule boucle foreach pour parcourir à la fois ($_POST['nom_repas']) et ($_POST['pu_repas']).
    // Nous utilisons la même clé $key pour accéder aux éléments correspondants dans les deux tableaux.
    // Si à la fois le nom du repas ($nom_repas) et le prix unitaire ($pu_repas) ne sont pas vides,
    // nous les ajoutons aux tableaux $donnees['nom_repas'] et $donnees['pu_repas'].
    $donnees = [
        'nom_repas' => [],
        'pu_repas' => [],
    ];

    foreach ($_POST['nom_repas'] as $key => $nom_repas) {
        $pu_repas = $_POST['pu_repas'][$key];

        if (!empty($nom_repas) && !empty($pu_repas)) {
            $donnees['nom_repas'][] = $nom_repas;
            $donnees['pu_repas'][] = $pu_repas;
        }
    }
    // die(var_dump($donnees));

    if (empty($donnees['nom_repas']) || empty($donnees['pu_repas'])) {
        $message_erreur_global = 'Une erreur est survenue. Il se peut que des informations manquent pour certains repas que vous avez soumis. Un repas soumis doit avoir un nom et un prix.';
    }

    if (!empty($donnees['nom_repas']) && !empty($donnees['pu_repas']) && empty($message_erreur_global)) {
        $num_cmd = $_POST['commande_id'];
        $num_res = $_POST['reservation_id'];

        supprimer_repas_commande($num_cmd);

        // die(var_dump(supprimer_repas_commande($num_cmd)));

        $recupererNumChambre = recuperer_donnees_reservation_par_num_res($num_res);

        // die(var_dump($recupererNumChambre));

        if (!empty($recupererNumChambre) && isset($recupererNumChambre['num_chambre'])) {

            $numChambre = $recupererNumChambre['num_chambre'];

            // die(var_dump($numChambre));

            // Vérifier si la chambre est inactive
            if (verifier_chambre_supprimer($numChambre)) {
                // Calculate the total price for all selected meals
                $prix_total = array_sum($donnees["pu_repas"]);

                // die(var_dump($prix_total));

                // Ajouter une commande avec le montant total
                $mise_a_jour_commande = mettre_a_jour_commande($num_cmd, $prix_total);

                // die(var_dump($mise_a_jour_commande));

                if ($mise_a_jour_commande) {
                    // Enregistrer la quantité de repas pour chaque repas sélectionné
                    foreach ($donnees["nom_repas"] as $codeRepas) {

                        $insertionCommandeQuantite = enregistrer_quantite_repas($codeRepas, $num_cmd, $numChambre);

                        // die(var_dump($insertionCommandeQuantite));

                        // Vérifiez si l'insertion a échoué et gérez les erreurs si nécessaire
                        if (!$insertionCommandeQuantite) {
                            $message_erreur_global = "Erreur lors de l'enregistrement de(s) repas.";
                            break; // Sortez de la boucle si une erreur se produit pour un repas
                        }
                    }
                    // La commande a été effectuée avec succès
                    $message_success_global = "La commande a été modifiée avec succès.";
                } else {
                    // La mise à jour de la commande a échoué
                    $message_erreur_global = "Désolé, une erreur s'est produite lors de la mise à jour de la commande.";
                }
            } else {
                // La chambre est inactive
                $message_erreur_global = "Désolé, la chambre est inactive.";
            }
        } else {
            // La récupération du numéro de chambre a échoué
            $message_erreur_global = "Désolé, la récupération du numéro de chambre a échoué.";
        }
    }
} else {
    // Mot de passe incorrect
    $message_erreur_global  = "La modification a échoué. Vérifiez votre mot de passe et réessayez.";
}

$_SESSION['donnees-commande'] = $donnees;
$_SESSION['erreurs-commande'] = $erreurs;

// Redirection vers la page de liste des réservations avec un message de succès ou d'erreur
$_SESSION['message-erreur-global'] = $message_erreur_global;
$_SESSION['message-success-global'] = $message_success_global;
header('location: ' . PATH_PROJECT . 'client/dashboard/liste_des_commandes');

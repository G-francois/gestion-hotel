<?php
$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];


// Récupérer les données du formulaire
$num_res = $_POST['reservation_id'];
$typeChambre = $_POST['type_chambre'];

// Traiter les modifications en fonction du type de chambre
if ($typeChambre === 'Solo') {
    // Traiter les modifications pour le type Solo
    $debOcc = $_POST['deb_occ'];
    $finOcc = $_POST['fin_occ'];

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

    $_SESSION['donnees-chambre-solo-modifier'] = $donnees;
    $_SESSION['erreurs-chambre-solo-modifier'] = $erreurs;

    if (empty($erreurs)) {


        $debOcc = $donnees['deb_occ'];

        $finOcc = $donnees['fin_occ'];

        $resultat = modifier_reservation_chambre_solo($num_res, $debOcc, $finOcc, $montantTotal);

        if ($resultat) {

            $message_success_global = "La réservation de la chambre $typeChambre a été modifier avec succès !";
        } else {

            $message_erreur_global = "Oups ! Une erreur s'est produite lors de la modification de la réservation la chambre.";
        }
    }

    // Effectuer les mises à jour nécessaires pour le type Solo
    $_SESSION['message-erreur-global'] = $message_erreur_global;
    $_SESSION['message-success-global'] = $message_success_global;
    header('location: ' . PATH_PROJECT . 'client/dashboard/modifier-reservations');


} elseif ($typeChambre === 'Doubles') {
    // Traiter les modifications pour le type Doubles
    $nomAcc1 = $_POST['nom_acc1'];
    $contactAcc1 = $_POST['contact_acc1'];
    $debOcc = $_POST['deb_occ'];
    $finOcc = $_POST['fin_occ'];

    // Effectuer les mises à jour nécessaires pour le type Doubles
    // ...
} elseif ($typeChambre === 'Triples') {
    // Traiter les modifications pour le type Triples
    $nomAcc1 = $_POST['nom_acc1'];
    $contactAcc1 = $_POST['contact_acc1'];
    $nomAcc2 = $_POST['nom_acc2'];
    $contactAcc2 = $_POST['contact_acc2'];
    $debOcc = $_POST['deb_occ'];
    $finOcc = $_POST['fin_occ'];

    // Effectuer les mises à jour nécessaires pour le type Triples
    // ...
} elseif ($typeChambre === 'Suite') {
    // Traiter les modifications pour le type Suite
    $nomAcc1 = $_POST['nom_acc1'];
    $contactAcc1 = $_POST['contact_acc1'];
    $nomAcc2 = $_POST['nom_acc2'];
    $contactAcc2 = $_POST['contact_acc2'];
    $nomAcc3 = $_POST['nom_acc3'];
    $contactAcc3 = $_POST['contact_acc3'];
    $nomAcc4 = $_POST['nom_acc4'];
    $contactAcc4 = $_POST['contact_acc4'];
    $debOcc = $_POST['deb_occ'];
    $finOcc = $_POST['fin_occ'];

    // Effectuer les mises à jour nécessaires pour le type Suite
    // ...
}

// Rediriger vers la page de liste des réservations avec un message de succès ou d'erreur

$_SESSION['message-erreur-global'] = $message_erreur_global;
$_SESSION['message-success-global'] = $message_success_global;
header('location: ' . PATH_PROJECT . 'client/dashboard/modifier-reservations');

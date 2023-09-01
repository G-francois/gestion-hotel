<?php

$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];

$num_res = $_POST['reservation_id'];

// Boucle pour traiter les données des accompagnateurs
for ($i = 1; $i <= 4; $i++) {
    if (isset($_POST["nom_acc$i"]) && isset($_POST["contact_acc$i"]) && !empty($_POST["nom_acc$i"]) && !empty($_POST["contact_acc$i"])) {
        $donnees[] = [
            "nom_acc" => $_POST["nom_acc$i"],
            "contact_acc" => $_POST["contact_acc$i"]
        ];
    }
}
if (isset($_POST["deb_occ"]) && !empty($_POST["deb_occ"])) {
    $donnees["deb_occ"] = $_POST["deb_occ"];
} else {
    $erreurs["deb_occ"] = "Le champ date début de séjour est requis. Veuillez le renseigner.";
}

if (isset($_POST["fin_occ"]) && !empty($_POST["fin_occ"])) {
    $donnees["fin_occ"] = $_POST["fin_occ"];
} else {
    $erreurs["fin_occ"] = "Le champ date fin de séjour est requis. Veuillez le renseigner.";
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

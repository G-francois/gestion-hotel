<?php
$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];


if (isset($_POST["nom"]) && !empty($_POST["nom"])) {
    $donnees["nom"] = $_POST["nom"];
} else {
    $erreurs["nom"] = "Le champs nom est requis. Veuillez le renseigné.";
}

if (isset($_POST["date-debut"]) && !empty($_POST["date-debut"])) {
    $donnees["date-debut"] = $_POST["date-debut"];
} else {
    $erreurs["date-debut"] = "Le champs date de début est requis. Veuillez le renseigné.";
}

if (isset($_POST["date-fin"]) && !empty($_POST["date-fin"])) {
    $donnees["date-fin"] = $_POST["date-fin"];
} else {
    $erreurs["date-fin"] = "Le champs date de fin est requis. Veuillez le renseigné.";
}

if (isset($_POST["num_chambre"]) && !empty($_POST["num_chambre"])) {
    $donnees["num_chambre"] = $_POST["num_chambre"];
} else {
    $erreurs["num_chambre"] = "Le champs numéro de chambre est requis. Veuillez le renseigné.";
}

if (empty($erreurs)) {
die(var_dump(enregistrer_reservation($num_res, $donnees["nom"], $donnees["date-debut"], $donnees["date-fin"], $donnees["num_chambre"])));
    // Exécuter la requête avec les valeurs des paramètres
    $resultat = enregistrer_reservation($num_res, $donnees["nom"], $donnees["date-debut"], $donnees["date-fin"], $donnees["num_chambre"]);

    if ($resultat) {
        // Opération réussie
        $message_success_global = "Réservation effectuée avec succès !";
    } else {
        // Erreur lors de l'exécution de la requête
        $message_erreur_global = "Oups ! Une erreur s'est produite lors de l'enregistrement de la réservation.";
    }
} 


$_SESSION['donnees-reservation'] = $donnees;
$_SESSION['erreurs-reservation'] = $erreurs;
$_SESSION['message-erreur-global'] = $message_erreur_global;
$_SESSION['message-success-global'] = $message_success_global;
header('Location: ' . PATH_PROJECT . 'client/site/reservation-solo');
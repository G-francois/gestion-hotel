
<?php
$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];


if (isset($_POST["cod_typ"]) && !empty($_POST["cod_typ"])) {
    $donnees["cod_typ"] = $_POST["cod_typ"];
} else {
    $erreurs["cod_typ"] = "Le champs code type est requis. Veuillez le renseigné.";
}

if (isset($_POST["lib_typ"]) && !empty($_POST["lib_typ"])) {
    $donnees["lib_typ"] = $_POST["lib_typ"];
} else {
    $erreurs["lib_typ"] = "Le champs libelle type de chambre est requis. Veuillez le renseigné.";
}

if (isset($_POST["statut"]) && !empty($_POST["statut"])) {
    $donnees["statut"] = $_POST["statut"];
} else {
    $erreurs["statut"] = "Le champs statuts est requis. Veuillez le renseigné.";
}

if (isset($_POST["pu"]) && !empty($_POST["pu"])) {
    $donnees["pu"] = $_POST["pu"];
} else {
    $erreurs["pu"] = "Le champs prix unitaire est requis. Veuillez le renseigné.";
}


if (empty($erreurs)) {

    $resultat = enregistrer_chambre($donnees["cod_typ"], $donnees["lib_typ"], $donnees["statut"], $donnees["pu"]);

    if ($resultat) {

        $message_success_global = "La chambre a été enrégistrer avec succès !";

    } else {

        $message_erreur_global = "Oups ! Une erreur s'est produite lors de l'enregistrement de la chambre.";
    }
} 

$_SESSION['donnees-chambre'] = $donnees;
$_SESSION['erreurs-chambre'] = $erreurs;
$_SESSION['message-erreur-global'] = $message_erreur_global;
$_SESSION['message-success-global'] = $message_success_global;
header('location: ' . PATH_PROJECT . 'administrateur/dashboard/ajout-chambre');

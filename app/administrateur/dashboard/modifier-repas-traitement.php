<?php
$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];


if (isset($_POST["nom_repas"]) && !empty($_POST["nom_repas"])) {
    $donnees["nom_repas"] = $_POST["nom_repas"];
} else {
    $erreurs["nom_repas"] = "Le champs nom du repas est requis. Veuillez le renseigné.";
}

if (isset($_POST["pu_repas"]) && !empty($_POST["pu_repas"])) {
    $donnees["pu_repas"] = $_POST["pu_repas"];
} else {
    $erreurs["pu_repas"] = "Le champs prix unitaire est requis. Veuillez le renseigné.";
}

if (empty($erreurs)) {

    $check_if_auteur_exist = check_if_repas_exist_in_db($donnees["nom_repas"]);

    if (!$check_if_auteur_exist) {

        $cod_repas = -1;

        if (isset($_POST["cod_repas"]) && !empty($_POST["cod_repas"])) {
            $cod_repas = $_POST["cod_repas"];
        }

        $resultat = modifier_repas($cod_repas, $donnees["nom_repas"], $donnees["pu_repas"]);

        if ($resultat) {

            $message_success_global = "Le repas a été modifié avec succès !";
            
        } else {
            $message_erreur_global = "Oups ! Une erreur s'est produite lors de la modification du repas.";
        }
    } else {
        $message_erreur_global = "Oups! Le nom de ce auteur existe deja. Veuillez réesayer.";
    }
}

$_SESSION['donnees-repas-modifier'] = $donnees;
$_SESSION['erreurs-repas-modifier'] = $erreurs;
$_SESSION['message-erreur-global'] = $message_erreur_global;
$_SESSION['message-success-global'] = $message_success_global;
header('Location: ' . PATH_PROJECT . 'administrateur/dashboard/modifier-repas/' . $params[3]);
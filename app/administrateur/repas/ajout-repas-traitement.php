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

	if (!check_if_repas_exist_in_db($_POST["nom_repas"])) {

		$resultat = enregistrer_repas($donnees["nom_repas"], $donnees["pu_repas"]);

		if ($resultat) {

			$message_success_global = "Le repas a été enrégistrer avec succès !";
		} else {

			$message_erreur_global = "Oups ! Une erreur s'est produite lors de l'enregistrement du repas.";
		}
	} else {

		$erreurs["nom_repas"] = "Oups! Le nom du repas existe deja. Veuillez réesayer.";
	}
}

$_SESSION['donnees-repas'] = $donnees;
$_SESSION['erreurs-repas'] = $erreurs;
$_SESSION['message-erreur-global'] = $message_erreur_global;
$_SESSION['message-success-global'] = $message_success_global;
header('location: ' . PATH_PROJECT . 'administrateur/repas');

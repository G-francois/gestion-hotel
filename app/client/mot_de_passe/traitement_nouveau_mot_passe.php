<?php

$_SESSION['enregistrer-erreurs'] = [];

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];



if (isset($_POST["mot-passe"])) {
	$password = trim($_POST["mot-passe"]);
	$retapezMotPasse = trim($_POST["retapez-mot-passe"]);

	if (empty($password)) {
		$erreurs["mot-passe"] = "Le champ du mot de passe est vide. Veuillez le renseigner.";
	} elseif (strlen($password) < 8) {
		$erreurs["mot-passe"] = "Le champ doit contenir au moins 8 caractères. Les espaces ne sont pas pris en compte.";
	} elseif (empty($retapezMotPasse)) {
		$erreurs["retapez-mot-passe"] = "Entrez votre mot de passe à nouveau.";
	} elseif ($password != $retapezMotPasse) {
		$erreurs["retapez-mot-passe"] = "Mot de passe erroné. Entrez le mot de passe du champ précédent.";
	} else {
		$donnees["mot-passe"] = htmlentities($password);
	}
}

$_SESSION['donnees-utilisateur'] = $donnees;

if (empty($erreurs)) {

    if (mise_a_jour_mot_passe($_SESSION['id_user'], $donnees["mot-passe"])) {
        session_destroy();
        header('location:' . PATH_PROJECT . 'client/connexion');
    } else {
        $_SESSION['enregistrer-erreurs'] = $erreurs;
        header('location: ' . PATH_PROJECT . 'client/mot_de_passe/nouveau_mot_passe');
    }
} else {
    $_SESSION['enregistrer-erreurs'] = $erreurs;
    header('location: ' . PATH_PROJECT . 'client/mot_de_passe/nouveau_mot_passe');
}

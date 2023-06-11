<?php

$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];
$_SESSION['donnees-utilisateur']  = [];

if (isset($_POST["nom_repas"]) && !empty($_POST["nom_repas"])) {

    $donnees["nom_repas"] = $_POST["nom_repas"];
} else {

    $erreurs["nom_repas"] = "Le champs nom du repas est requis. Veuillez le renseigné.";
}

if (isset($_POST["prix_repas"]) && !empty($_POST["prix_repas"])) {

    $donnees["prix_repas"] = trim(htmlentities($_POST['prix_repas']));
} else {

    $erreurs["prix_repas"] = "Le champs mot de passe est requis. Veuillez le renseigné.";
}

$_SESSION['donnees-utilisateur'] = $donnees;

if (empty($erreurs)) {

    $check_if_auteur_exist = check_if_auteur_exist($donnees["nom_repas"]);

    if (!$check_if_auteur_exist) {

        $ajout_auteur = ajout_repas($donnees["nom_repas"], $donnees["prix_repas"]);

        if ($ajout_auteur) {

            $message["statut"] = 1;
            $message["message"] = "Auteur ajouté avec succès.";

        } else {

            $message["statut"] = 0;
            $message["message"] = "Oups! Une erreur s'est produite lors de l'ajout de l'auteur. Veuillez réesayer.";

        }

    } else {

        $message["statut"] = 0;
        $message["message"] = "Oups! Le nom de ce auteur existe deja. Veuillez réesayer.";

    }

}

include("auteurs/ajout-auteur.php");

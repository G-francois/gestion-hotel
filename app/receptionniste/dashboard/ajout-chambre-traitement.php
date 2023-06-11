
<?php
session_start();

include './app/commum/fonction.php';

$_SESSION['inscription-erreurs'] = [];

$_SESSION['donnees-chambre'] = [];

$donnees = [];

$erreurs = [];

$message = array();

$message_success = "";

if (isset($_POST["code_typ"]) && !empty($_POST["code_typ"])) {
    $donnees["cod_typ"] = $_POST["cod_typ"];
} else {
    $erreurs["cod_typ"] = "Le champs code type est requis. Veuillez le renseigné.";
}

if (isset($_POST["lib_typ"]) && !empty($_POST["lib_typ"])) {
    $donnees["lib_typ"] = $_POST["lib_typ"];
} else {
    $erreurs["lib_typ"] = "Le champs libelle type de chambre est requis. Veuillez le renseigné.";
}

if (isset($_POST["statuts"]) && !empty($_POST["statuts"])) {
    $donnees["statuts"] = $_POST["pu"];
} else {
    $erreurs["statuts"] = "Le champs statuts est requis. Veuillez le renseigné.";
}


if (isset($_POST["pu"]) && !empty($_POST["pu"])) {
    $donnees["pu"] = $_POST["pu"];
} else {
    $erreurs["pu"] = "Le champs pris unitaire est requis. Veuillez le renseigné.";
}


if (empty($erreurs)) {

    $check_if_chambre_exist = check_if_chambre_exist($donnees["code_type"], $donnees["libelle_type"], $donnees["statuts"], $donnees["pu"]);

    if (!$check_if_chambre_exist) {

        $ajout_chambre = ajouter_chambre($donnees["code_type"], $donnees["libelle_type"], $donnees["statuts"], $donnees["pu"]);

        if ($ajout_chambre) {

            $message["statut"] = 1;
            $message["message"] = "Chambre ajouté avec succès.";

        } else {

            $message["statut"] = 0;
            $message["message"] = "Oups! Une erreur s'est produite lors de l'ajout de la chambre. Veuillez réesayer.";

        }

    } else {

        $message["statut"] = 0;
        $message["message"] = "Oups! Le nom de cette chambre existe deja. Veuillez réesayer.";

    }
}




$_SESSION['donnees-chambre'] = $donnees;



$_SESSION['success'] = "";


if (empty($erreurs)) {
    $db = connect_db();

    // Ecriture de la requête
    $requette = 'INSERT INTO chambre (code_type, libelle_type, statuts, pu) VALUES (:cod_typ, :lib_typ, :statuts, :pu);';

    // Préparation
    $inserer_chambre = $db->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $inserer_chambre->execute([
        'cod_typ' => $donnees["cod_typ"],
        'lib_typ' => $donnees["lib_typ"],
        'statuts' => $donnees["status"],
        'pu' => $donnees["pu"]
    ]);

    if ($resultat) {
        $_SESSION['success'] = "Ajout éffectué avec succès.";
        header('location: /soutenance/administrateur/dashboard/ajout-chambre');
    }
} else {
    $_SESSION['inscription-erreurs'] = $erreurs;

    header('location: /soutenance/administrateur/dashboard/liste-chambre');
}

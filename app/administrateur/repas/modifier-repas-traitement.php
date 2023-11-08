<?php
$message_erreur_global = "";
$message_success_global = "";
$donnees =  recuperer_repas_par_son_code_repas($params[3]);
$new_donnees = [];
$erreurs = [];

if (isset($_POST['nom_repas']) && !empty($_POST['nom_repas']) && $_POST['nom_repas'] != $donnees[0]['nom_repas']) {
    $new_data['nom_repas'] = $_POST['nom_repas'];
} else {
    if (empty($_POST['nom_repas'])) {
        $erreurs["nom_repas"] = "Le champ nom repas ne doit pas être vide.";
    } else {
        $new_data['nom_repas'] = $donnees[0]['nom_repas'];
    }
}

if (isset($_POST['pu_repas']) && !empty($_POST['pu_repas']) && $_POST['pu_repas'] != $donnees[0]['pu_repas']) {
    $new_data['pu_repas'] = $_POST['pu_repas'];
} else {
    if (empty($_POST['pu_repas'])) {
        $erreurs["pu_repas"] = "Le champ prix unitaire repas ne doit pas être vide.";
    } else {
        $new_data['pu_repas'] = $donnees[0]['pu_repas'];
    }
}

$_SESSION['donnees-repas-modifier'] = $new_data;
$_SESSION['erreurs-repas-modifier'] = $erreurs;


if (empty($erreurs)) {

    if (!empty($params[3])) {

        $cod_repas = $params[3];

        $miseajour = modifier_repas($cod_repas, $new_data["nom_repas"], $new_data["pu_repas"]);

        if ($miseajour) {
            $message_success_global = "Le repas a été modifié avec succès !";
        } else {
            // La  mise à jour du statut a échoué
            $message_erreur_global =  "Oups ! Une erreur s'est produite lors de la modification du repas. Veuiller réessayez.";
        }
    } else {
        // Aucune chambre disponible de type "Doubles"
        $message_erreur_global = "Désolé, il n'y a pas de repas disponible pour le moment.";
    }

}


$_SESSION['message-erreur-global'] = $message_erreur_global;
$_SESSION['message-success-global'] = $message_success_global;
header('Location: ' . PATH_PROJECT . 'administrateur/repas/modifier-repas/' . $params[3]);

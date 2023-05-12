<?php
session_start();

include './app/commum/fonction.php';

$_SESSION['sauvegarder-erreurs'] = "";

$_SESSION['donnees-utilisateur'] = [];

$donnees = $_SESSION['utilisateur_connecter'];

$new_data = [];

$erreurs = [];


if (isset($_POST['sauvegarder'])) {

    if (check_password_exist(($_POST['password']), $donnees[0]['id'])) {

        if (isset($_POST['nom']) && !empty($_POST['nom']) && $_POST['nom'] != $donnees[0]['nom']) {
            $new_data['nom'] = trim(htmlentities($_POST['nom']));
        } else {
            $new_data['nom'] = $donnees[0]['nom'];
        }

        if (isset($_POST['prenom']) && !empty($_POST['prenom']) && $_POST['prenom'] != $donnees[0]['prenom']) {
            $new_data['prenom'] = trim(htmlentities($_POST['prenom']));
        } else {
            $new_data['prenom'] = $donnees[0]['prenom'];
        }

        if (isset($_POST['telephone']) && !empty($_POST['telephone']) && $_POST['telephone'] != $donnees[0]['telephone']) {
            $new_data['telephone'] = trim(htmlentities($_POST['telephone']));
        } else {
            $new_data['telephone'] = $donnees[0]['telephone'];
        }

        if (isset($_POST['nom_utilisateur']) && !empty($_POST['nom_utilisateur']) && $_POST['nom_utilisateur'] != $donnees[0]['nom_utilisateur']) {
            $new_data['nom_utilisateur'] = trim(htmlentities($_POST['nom_utilisateur']));
        } else {
            $new_data['nom_utilisateur'] = $donnees[0]['nom_utilisateur'];
        }



        if (maj_nv_info_user(
            $donnees[0]['id'],
            $new_data['nom'],
            $new_data['prenom'],
            $new_data['telephone'],
            $new_data['nom_utilisateur']
        )) {

            if (recup_maj_nv_info_user($donnees[0]['id'])) { 
                $_SESSION['success'] = "Modification(s) effectuée(s) avec succès";
                header('location:' . PATH_PROJECT . 'client/profil/profile');
            } else {
                $_SESSION['sauvegarder-erreurs'] = "La modification à echouer. Veuiller réessayez.";

                header('location:' . PATH_PROJECT . 'client/profil/profile');
            }
        } else {
            $_SESSION['sauvegarder-erreurs'] = "La mise à jour à echouer. Veuiller réessayez.";

            header('location:' . PATH_PROJECT . 'client/profil/profile');
        }
    } else {
        $_SESSION['sauvegarder-erreurs'] = "La modification à echouer. Vérifier votre mot de passe et réessayez.";

        header('location:' . PATH_PROJECT . 'client/profil/profile');
    }
} else {
    $_SESSION['sauvegarder-erreurs'] = "Veuiller appuyer sur le boutton sauvegarder.";

    header('location:' . PATH_PROJECT . 'client/profil/profile');
}

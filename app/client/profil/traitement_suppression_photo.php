<?php

session_start();

include './app/commum/fonction.php';

$_SESSION['photo-erreurs'] = "";

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];



if (isset($_POST['supprimer_photo'])) {

    if (check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter'][0]['id'])) {

        if (maj_avatar($_SESSION['utilisateur_connecter'][0]['id'], 'no_image')) {

            if (recup_maj_nv_info_user($_SESSION['utilisateur_connecter'][0]['id'])) {
            }
        }
        
    } else {
        $_SESSION['suppression-erreurs'] = "La suppression de la photo à echouer. Vérifier votre mot de passe et réessayez.";
        header('location:/' . PATH_PROJECT . '/client/profil/profile');
    }
}



header('location:/' . PATH_PROJECT . '/client/profil/profile');

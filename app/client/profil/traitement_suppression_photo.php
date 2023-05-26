<?php

$_SESSION['photo-erreurs'] = "";

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];



if (isset($_POST['supprimer_photo'])) {

    if (check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter'][0]['id'])) {

        if (mise_a_jour_avatar($_SESSION['utilisateur_connecter'][0]['id'], 'no_image')) {

            if (recup_mise_a_jour_new_info_user($_SESSION['utilisateur_connecter'][0]['id'])) {
            }
        }
        
    } else {
        $_SESSION['suppression-erreurs'] = "La suppression de la photo à echouer. Vérifier votre mot de passe et réessayez.";
        header('location:' . PATH_PROJECT . 'client/profil/profile');
    }
}



header('location:' . PATH_PROJECT . 'client/profil/profile');

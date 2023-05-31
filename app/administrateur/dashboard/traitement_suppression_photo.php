<?php

$_SESSION['photo-erreurs'] = "";

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];



if (isset($_POST['supprimer_photo'])) {

    if (check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter_admin']['id'])) {

        if (mise_a_jour_avatar($_SESSION['utilisateur_connecter_admin']['id'], 'no_image')) {

            $new_user_data = recup_mise_a_jour_new_info_user($_SESSION['utilisateur_connecter_admin']['id']);

            if (!empty($new_user_data)) {

                $_SESSION['utilisateur_connecter_admin'] = $new_user_data;
            }
        }
    } else {
        $_SESSION['suppression-erreurs'] = "La suppression de la photo à echouer. Vérifier votre mot de passe et réessayez.";
    }
}


header('location:' . PATH_PROJECT . 'administrateur/dashboard/profil');

<?php
session_start();
include './app/commum/fonction.php';

if (check_id_utilisateur_exist_in_db($params[3], $params[4], "NOUVEAU_MOT_DE_PASSE", 1, 0)){
    if(maj($params[3]) && maj1($params[3])){
        $_SESSION['id_user'] = $params[3];
        $_SESSION['success'] = "Email vérifier avec succès. Vous pouvez mettre nouveau mot de passe";
        header('location: ' . PATH_PROJECT . 'client/mot_de_passe/nv_mot_passe');
    }
} else {
    header('location: '.PATH_PROJECT .'client/mot_de_passe/index');
}

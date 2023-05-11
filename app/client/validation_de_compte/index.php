<?php

include './app/commum/fonction.php';

if (check_id_utilisateur_exist_in_db($params[3], $params[4], "VALIDATION_COMPTE", 1, 0)){
    if(maj($params[3]) && maj1($params[3])){
        $_SESSION['success'] = "Inscription éffectué avec succès. Vous pouvez vous connecter";
        header('location: /' . GESTION_HOTEL . '/client/connexion/index');
    }
} else {
    header('location: /'.GESTION_HOTEL .'/client/inscription/pages-error-404');
}

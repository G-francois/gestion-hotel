<?php

$donnees = [];

$erreurs = [];


if (isset($_POST['change_password'])) {

    if (isset($_POST["newpassword"]) && !empty($_POST["newpassword"])) {
        $password = $_POST["newpassword"];
        $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
    
        if (preg_match($pattern, $password)) {
            $donnees["newpassword"] = $password;
        } else {
            $erreurs["newpassword"] = "Le mot de passe doit contenir au moins 8 caractères, dont au moins une lettre majuscule, une 
            lettre minuscule, un chiffre et un caractère spécial (@$!%*?&).";
        }
    } else {
        $erreurs["newpassword"] = "Le champ du nouveau mot de passe est requis. Veuillez le renseigner.";
    }
    /* Dans ce code, j'ai ajouté une nouvelle validation pour le champ "mot de passe". J'ai défini le 
    pattern /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/ qui vérifie que la chaîne $password respecte les 
    critères suivants :
    
    Au moins 8 caractères
    Au moins une lettre majuscule
    Au moins une lettre minuscule
    Au moins un chiffre
    Au moins un caractère spécial parmi (@$!%*?&)
    Ensuite, j'ai utilisé la fonction preg_match() pour valider si le mot de passe correspond au pattern. Si c'est le cas, le mot de passe est ajouté aux données ($donnees["password"]). Sinon, un message d'erreur approprié est stocké dans le tableau $erreurs["password"].
    */
    
    if (isset($_POST["newpassword"]) && !empty($_POST["newpassword"]) && strlen(($_POST["newpassword"])) >= 8 && empty($_POST["renewpassword"])) {
        $erreurs["renewpassword"] = "Entrez votre mot de passe à nouveau.";
    }

    if ((isset($_POST["renewpassword"]) && !empty($_POST["renewpassword"]) && strlen(($_POST["newpassword"])) >= 8 && $_POST["renewpassword"] != $_POST["newpassword"])) {
        $erreurs["renewpassword"] = "Mot de passe erroné. Entrez le mot de passe du précédent champs";
    }

    if ((isset($_POST["newpassword"]) && !empty($_POST["newpassword"]) && strlen(($_POST["newpassword"])) >= 8 && $_POST["renewpassword"] == $_POST["newpassword"])) {
        $donnees["newpassword"] = $_POST['newpassword'];
    }

    if (!check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter'][0]['id'])) {
        $erreurs["password"] = "Mot de passe incorrecte. Veuillez réessayez";
    }
}

//die (var_dump($_SESSION['utilisateur_connecter'][0]['id']);

if (empty($erreurs)) {

    if (maj_mot_passe($_SESSION['utilisateur_connecter'][0]['id'], $donnees["newpassword"])) {
        session_destroy();
        header('location:' . PATH_PROJECT . 'client/connexion/index');
    } else {
        $_SESSION['changement-erreurs'] = $erreurs;
        header('location:' . PATH_PROJECT . 'client/profil/profile');
    }
} else {
    $_SESSION['changement-erreurs'] = $erreurs;
    header('location:' . PATH_PROJECT . 'client/profil/profile');
}

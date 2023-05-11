<?php
session_start();

include './app/commum/fonction.php';

$_SESSION['connexion-erreurs'] = [];

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];

$_SESSION['message-erreurs'] = "";

if (isset($_POST["email-nom-utilisateur"]) && !empty($_POST["email-nom-utilisateur"])) {
    $donnees["email-nom-utilisateur"] = $_POST["email-nom-utilisateur"];
} else {
    $erreurs["email-nom-utilisateur"] = "Le champs email ou nom utilisateur est requis. Veuillez le renseigné.";
}

if (isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"])) {
    $donnees["mot-passe"] = $_POST["mot-passe"];
} else {
    $erreurs["mot-passe"] = "Le champs mot de passe est requis. Veuillez le renseigné.";
}

if (isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"]) && isset($_POST["email-nom-utilisateur"]) && !empty($_POST["email-nom-utilisateur"])) {
    if (check_if_user_exist($donnees["email-nom-utilisateur"], $donnees["mot-passe"], "Client",  1, 0)) {
        //Si l'utilisateur appuie sur le checkbox "se souvenir de moi" 
        if (isset($_POST['souvenir']) and !empty($_POST['souvenir'])) {
            $donnees['souvenir'] = $_POST['souvenir'];
            //Création du cookie
            setcookie(
                "donnees-utilisateur",
                json_encode($donnees['"email-nom-utilisateur"']),
                [
                    'expires' => time() + 365 * 24 * 36000,
                    'path' => '/',
                    'secure' => 'true',
                    'httponly' => 'true',
                ]
            );
        }
        //S'il n'appuie pas sur le checkbox "se souvenir de moi" je vide le cookie
        else {
            setcookie(
                "donnees-utilisateur",
                " ",
                [
                    'expires' => time() + 365 * 24 * 36000,
                    'path' => '/',
                    'secure' => 'true',
                    'httponly' => 'true',
                ]
            );
        }
        header('location: '.PATH_PROJECT .'client/dashboard/index');
    }else {
        $_SESSION['connexion-erreurs'] = $erreurs;
        $erreurs["mot-passe"] = "Le mot de passe est incorrecte. Veuiller le reéssayer.";
    }
}

if (empty($erreurs)) {
    $_SESSION['donnees-utilisateur'] = $donnees;
} else {
    $_SESSION['donnees-utilisateur'] = $donnees;
    $_SESSION['connexion-erreurs'] = $erreurs;
    header('location: '.PATH_PROJECT .'client/connexion/index');
}

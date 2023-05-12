<?php
session_start();

include './app/commum/fonction.php';

$_SESSION['inscription-erreurs'] = [];

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];


if (isset($_POST["nom"]) && !empty($_POST["nom"])) {
    $donnees["nom"] = trim(htmlentities($_POST['nom']));
} else {
    $erreurs["nom"] = "Le champs nom est requis. Veuillez le renseigné.";
}

if (isset($_POST["prenom"]) && !empty($_POST["prenom"])) {
    $donnees["prenom"] = trim(htmlentities($_POST["prenom"]));
} else {
    $erreurs["prenom"] = "Le champs prénom est requis. Veuillez le renseigné.";
}

if (isset($_POST["telephone"]) && !empty($_POST["telephone"])) {
    $donnees["telephone"] = trim(htmlentities($_POST["telephone"]));
} else {
    $erreurs["telephone"] = "Le champs contact est requis. Veuillez le renseigné.";
}


if (!isset($_POST["email"]) || empty($_POST["email"])) {
    $erreurs["email"] = "Le champs email est vide. Veuillez le renseigné.";
}

if (isset($_POST["email"]) && !empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $donnees["email"] = trim(htmlentities($_POST["email"]));
} else {
    $erreurs["email"] = "Le champs email est requis. Veuillez le renseigné.";
}

if (isset($_POST["nom-utilisateur"]) && !empty($_POST["nom-utilisateur"])) {
    $donnees["nom-utilisateur"] = trim(htmlentities($_POST["nom-utilisateur"]));
} else {
    $erreurs["nom-utilisateur"] = "Le champs nom-utilisateur est requis. Veuillez le renseigné.";
}

if (!isset($_POST["mot-passe"]) || empty($_POST["mot-passe"])) {
    $erreurs["mot-passe"] = "Le champs du mot de passe est vide. Veuillez le renseigné.";
}

if (isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"]) && strlen(($_POST["mot-passe"])) < 8) {
    $erreurs["mot-passe"] = "Le champs doit contenir minimum 8 caractères. Les espaces ne sont pas pris en compte.";
}

if (isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"]) && strlen(($_POST["mot-passe"])) >= 8 && empty($_POST["retapez-mot-passe"])) {
    $erreurs["retapez-mot-passe"] = "Entrez votre mot de passe à nouveau.";
}

if ((isset($_POST["retapez-mot-passe"]) && !empty($_POST["retapez-mot-passe"]) && strlen(($_POST["mot-passe"])) >= 8 && $_POST["retapez-mot-passe"] != $_POST["mot-passe"])) {
    $erreurs["retapez-mot-passe"] = "Mot de passe erroné. Entrez le mot de passe du précédent champs";
}

if ((isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"]) && strlen(($_POST["mot-passe"])) >= 8 && $_POST["retapez-mot-passe"] == $_POST["mot-passe"])) {
    $donnees["mot-passe"] = trim(htmlentities($_POST['mot-passe']));
}

if (!isset($_POST["cocher"]) || empty($_POST["cocher"])) {
    $erreurs["cocher"] = "Veuillez cocher cette case svp";
}

$check_email_exist_in_db = check_email_exist_in_db($_POST["email"]);

if ($check_email_exist_in_db) {
    $erreurs["email"] = "Cette adresse mail est déja utilisé. Veuillez le changez.";
}

$check_user_name_exist_in_db = check_user_name_exist_in_db($_POST["nom-utilisateur"]);

if ($check_user_name_exist_in_db) {
    $erreurs["nom-utilisateur"] = "Ce nom d'utilisateur est déja utilisé. Veuillez le changez.";
}

$check_user_name_exist_in_db = check_telephone_exist_in_db($_POST["telephone"]);

if ($check_user_name_exist_in_db) {
    $erreurs["telephone"] = "Ce contact est déja utilisé. Veuillez le changez.";
}

$_SESSION['donnees-utilisateur'] = $donnees;

$_SESSION['success'] = "";

$_SESSION['validation'] = "";

$donnees["Client"] = "Client";

//$donnees["no_image"] = "no_image";

if (empty($erreurs)) {

    $db = connect_db();

    // Ecriture de la requête
    $requette = 'INSERT INTO utilisateur (nom, prenom, telephone, email, nom_utilisateur, profil, mot_passe) VALUES (:nom, :prenom, :telephone, :email, :nom_utilisateur, :Client, :mot_passe)';

    // Préparation
    $inserer_utilisateur = $db->prepare($requette);

    // Exécution ! La recette est maintenant en base de données
    $resultat = $inserer_utilisateur->execute([
        'nom' => $donnees["nom"],
        'prenom' => $donnees["prenom"],
        'telephone' => $donnees["telephone"],
        'email' => $donnees["email"],
        'nom_utilisateur' => $donnees["nom-utilisateur"],
        'Client' => $donnees["Client"],
        'mot_passe' => sha1($donnees["mot-passe"])
    ]);

    //die(var_dump([
    //   'nom' => $donnees["nom"],
    // 'prenom' => $donnees["prenom"],
    //'sexe' => $donnees["sexe"],
    //'telephone' => $donnees["telephone"],
    //'date_naissance' => $donnees["date-naissance"],
    //'email' => $donnees["email"],
    //'nom_utilisateur' => $donnees["nom-utilisateur"],
    //'no_image' => $donnees["no_image"],
    //'Client' => $donnees["Client"],
    //'mot_passe' => sha1($donnees["mot-passe"])
    //]));

    if ($resultat) {
        $_token = uniqid("");
        $id_utilisateur = select_user_id($donnees['email'])[0]['id'];

        if (insertion_token($id_utilisateur, 'VALIDATION_COMPTE', $_token)) {
            $_SESSION['validation_compte'] = [];
            $_SESSION['validation_compte']['id_utilisateur'] = $id_utilisateur;
            $_SESSION['validation_compte']['token'] = recuperer_token($id_utilisateur)[0]['token'];
        }

        $objet = 'Validation de votre inscription';
        $message = buffer_html_file('..' . PATH_PROJECT . 'app/client/inscription/message_mail.php');
        if (email($donnees["email"], $objet, $message)) {
            $_SESSION['validation'] = "Veuiller bien consulter votre adresse mail pour valider votre compte ";
            header('location: ' . PATH_PROJECT . 'client/inscription/index');
        } else {
            header('location: ' . PATH_PROJECT . 'client/inscription/pages-error-404');
        }
    } else {
        $_SESSION['inscription-erreurs-global'] = "Oupps ! Une erreur s'est produite lors de l'enregistrement de l'utilisateur.";

        header('location: ' . PATH_PROJECT . 'client/inscription/index');
    }
} else {

    $_SESSION['inscription-erreurs'] = $erreurs;

    header('location: ' . PATH_PROJECT . 'client/inscription/index');
}

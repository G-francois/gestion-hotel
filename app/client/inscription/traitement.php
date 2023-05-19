<?php
session_start();

include './app/commum/fonction.php';

$_SESSION['inscription-erreurs'] = [];

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];

if (isset($_POST["nom"]) && !empty($_POST["nom"])) {
    $nom = trim(htmlentities($_POST["nom"]));
    $pattern = '/^[A-Z]+$/';

    if (preg_match($pattern, $nom)) {
        $donnees["nom"] = $nom;
    } else {
        $erreurs["nom"] = "Le nom doit contenir uniquement des lettres majuscules.";
    }
} else {
    $erreurs["nom"] = "Le champ nom est requis. Veuillez le renseigner.";
}
/*Dans ce code, j'ai ajouté une nouvelle validation pour le champ "nom". J'ai défini le pattern /^[A-Z]+$/
 qui vérifie que la chaîne $nom contient uniquement des lettres majuscules. Ensuite, j'ai utilisé la fonction 
 preg_match() pour valider si le nom correspond au pattern. Si c'est le cas, le nom est ajouté aux données 
 ($donnees["nom"]). Sinon, un message d'erreur approprié est stocké dans le tableau $erreurs["nom"].
*/

if (isset($_POST["prenom"]) && !empty($_POST["prenom"])) {
    $prenom = trim(htmlentities($_POST["prenom"]));
    $pattern = '/^[a-z]+$/';

    if (preg_match($pattern, $prenom)) {
        $donnees["prenom"] = $prenom;
    } else {
        $erreurs["prenom"] = "Le prenom doit contenir uniquement des lettres miniscules.";
    }
} else {
    $erreurs["prenom"] = "Le champ prenom est requis. Veuillez le renseigner.";
}

if (isset($_POST["telephone"]) && !empty($_POST["telephone"])) {
    $telephone = trim(htmlentities($_POST["telephone"]));
    $pattern = '/^[0-9]+$/';

    if (preg_match($pattern, $telephone)) {
        $donnees["telephone"] = $telephone;
    } else {
        $erreurs["telephone"] = "Le numéro de téléphone ne doit contenir que des chiffres.";
    }
} else {
    $erreurs["telephone"] = "Le champ contact est requis. Veuillez le renseigner.";
}
/*Dans ce code, j'ai ajouté la variable $pattern qui contient l'expression régulière /^[0-9]+$/ pour 
vérifier si le numéro de téléphone ne contient que des chiffres. Ensuite, j'ai utilisé la fonction 
preg_match() pour valider si la variable $telephone correspond au pattern. Si c'est le cas, le numéro 
de téléphone est ajouté aux données ($donnees["telephone"]). Sinon, un message d'erreur approprié est stocké 
dans le tableau $erreurs["telephone"].
*/

if (!isset($_POST["email"]) || empty($_POST["email"])) {
    $erreurs["email"] = "Le champs email est vide. Veuillez le renseigné.";
}

if (isset($_POST["email"]) && !empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $donnees["email"] = trim(htmlentities($_POST["email"]));
} else {
    $erreurs["email"] = "Le champs email est requis. Veuillez le renseigné.";
}

if (isset($_POST["nom-utilisateur"]) && !empty($_POST["nom-utilisateur"])) {
    $username = trim(htmlentities($_POST["nom-utilisateur"]));
    $pattern = '/^[a-zA-Z0-9_-]+$/';

    if (preg_match($pattern, $username)) {
        $donnees["nom-utilisateur"] = $username;
    } else {
        $erreurs["nom-utilisateur"] = "Le nom d'utilisateur ne doit contenir que des lettres minuscules, des chiffres, 
        des tirets et des soulignements.";
    }
} else {
    $erreurs["nom-utilisateur"] = "Le champ nom d'utilisateur est requis. Veuillez le renseigner.";
}
/*Dans ce code, j'ai ajouté une nouvelle validation pour le champ "nom d'utilisateur". J'ai défini le pattern /^[a-zA-Z0-9_-]+$/ 
qui vérifie que la chaîne $username ne contient que des lettres minuscules, des chiffres, des tirets et des soulignements. Ensuite, 
j'ai utilisé la fonction preg_match() pour valider si le nom d'utilisateur correspond au pattern. Si c'est le cas, le nom d'utilisateur 
est ajouté aux données ($donnees["username"]). Sinon, un message d'erreur approprié est stocké dans le tableau $erreurs["username"].
*/

if (isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"])) {
    $password = $_POST["mot-passe"];
    $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

    if (preg_match($pattern, $password)) {
        $donnees["mot-passe"] = $password;
    } else {
        $erreurs["mot-passe"] = "Le mot de passe doit contenir au moins 8 caractères, dont au moins une lettre majuscule, une 
        lettre minuscule, un chiffre et un caractère spécial (@$!%*?&).";
    }
} else {
    $erreurs["mot-passe"] = "Le champ mot de passe est requis. Veuillez le renseigner.";
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

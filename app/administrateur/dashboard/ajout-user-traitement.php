<?php
$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];

if (isset($_POST["nom"]) && !empty($_POST["nom"])) {
    $nom = htmlentities($_POST["nom"]);
    $pattern = '/^[A-Z]+$/';
    /*Dans ce code, j'ai ajouté une nouvelle validation pour le champ "nom". J'ai défini le pattern /^[A-Z]+$/
	 qui vérifie que la chaîne $nom contient uniquement des lettres majuscules. Ensuite, j'ai utilisé la fonction
	 preg_match() pour valider si le nom correspond au pattern. Si c'est le cas, le nom est ajouté aux données
	 ($donnees["nom"]). Sinon, un message d'erreur approprié est stocké dans le tableau $erreurs["nom"].
	*/
    if (preg_match($pattern, $nom)) {
        $donnees["nom"] = $nom;
    } else {
        $donnees["nom"] = strtoupper($nom);
    }
} else {
    $erreurs["nom"] = "Le champ nom est requis. Veuillez le renseigner.";
}

if (isset($_POST["prenom"]) && !empty($_POST["prenom"])) {
    $donnees["prenom"] = $_POST["prenom"];
} else {
    $erreurs["prenom"] = "Le champs prénom est requis. Veuillez le renseigné.";
}

if (isset($_POST["sexe"]) && !empty($_POST["sexe"])) {
    $donnees["sexe"] = $_POST["sexe"];
} else {
    $erreurs["sexe"] = "Le champs sexe est requis. Veuillez le renseigné.";
}

if (isset($_POST["profil"]) && !empty($_POST["profil"])) {
    $donnees["profil"] = $_POST["profil"];
} else {
    $erreurs["profil"] = "Le champs profile est requis. Veuillez le renseigné.";
}

if (isset($_POST["telephone"]) && !empty($_POST["telephone"])) {
    $telephone = trim(htmlentities($_POST["telephone"]));
    $pattern = '/^\d{1,8}$/';
    /*Dans ce code, j'ai ajouté la variable $pattern qui contient l'expression régulière /^\d{1,8}$/ pour 
	vérifier si le numéro de téléphone contient uniquement des chiffres et a une longueur de 8 chiffres ou moins. Ensuite,
	j'ai utilisé la fonction preg_match() pour valider si la variable $telephone correspond au pattern. Si c'est le cas, 
	le numéro de téléphone est ajouté aux données ($donnees["telephone"]). Sinon, un message d'erreur approprié est stocké
	dans le tableau $erreurs["telephone"].
	*/
    if (preg_match($pattern, $telephone)) {
        $donnees["telephone"] = $telephone;
    } else {
        $erreurs["telephone"] = "Le numéro de téléphone ne doit contenir que des chiffres et au maximum 8 chiffres.";
    }
} else {
    $erreurs["telephone"] = "Le champ numéro de téléphone est requis. Veuillez le renseigner.";
}

if (isset($_POST["email"]) && !empty($_POST["email"])) {
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $donnees["email"] = trim(htmlentities($_POST["email"]));
    } else {
        $erreurs["email"] = "Le champs email doit être une adresse mail valide. Veuillez le renseigner.";
    }
} else {
    $erreurs["email"] = "Le champs email est requis. Veuillez le renseigner.";
}

if (isset($_POST["nom-utilisateur"]) && !empty($_POST["nom-utilisateur"])) {
    $donnees["nom-utilisateur"] = $_POST["nom-utilisateur"];
} else {
    $erreurs["nom-utilisateur"] = "Le champs nom-utilisateur est requis. Veuillez le renseigner.";
}

if (isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"])) {
    $password = $_POST["mot-passe"];
    $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
    /* Dans ce code, j'ai ajouté une nouvelle validation pour le champ "mot de passe". J'ai défini le
	pattern /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/ qui vérifie que la chaîne $password respecte les
	critères suivants :

	Au moins 8 caractères
	Au moins une lettre majuscule
	Au moins une lettre minuscule
	Au moins un chiffre
	Au moins un caractère spécial parmi (@$!%*?&)
	Ensuite, j'ai utilisé la fonction preg_match() pour valider si le mot de passe correspond au pattern. Si c'est le cas, le mot de passe 
	est ajouté aux données ($donnees["password"]). Sinon, un message d'erreur approprié est stocké dans le tableau $erreurs["password"].
	*/
    if (preg_match($pattern, $password)) {
        $donnees["mot-passe"] = $password;
    } else {
        $erreurs["mot-passe"] = "Le mot de passe doit contenir au moins 8 caractères, dont au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial (@$!%*?&).";
    }
} else {
    $erreurs["mot-passe"] = "Le champ mot de passe est requis. Veuillez le renseigner.";
}

if ((isset($_POST["retapez-mot-passe"]) && !empty($_POST["retapez-mot-passe"]) && $_POST["retapez-mot-passe"] != $_POST["mot-passe"])) {
    $erreurs["retapez-mot-passe"] = "Mot de passe erroné. Entrez le mot de passe du précédent champs";
}

if ((isset($_POST["mot-passe"]) && !empty($_POST["mot-passe"]) && $_POST["retapez-mot-passe"] == $_POST["mot-passe"])) {
    $donnees["mot-passe"] = trim(htmlentities($_POST['mot-passe']));
}

if (check_email_exist_in_db($_POST["email"])) {
    $erreurs["email"] = "Cette adresse mail est déjà utilisée. Veuillez le changez.";
}

if (check_user_name_exist_in_db($_POST["nom-utilisateur"])) {
    $erreurs["nom-utilisateur"] = "Ce nom d'utilisateur est déjà utilisé. Veuillez le changez.";
}

if (check_telephone_exist_in_db($_POST["telephone"])) {
    $erreurs["telephone"] = "Ce numéro de téléphone est déjà utilisé. Veuillez le changez.";
}



if (empty($erreurs)) {

	$resultat = enregistrer_utilisateur_admin($donnees["nom"], $donnees["prenom"], $donnees["sexe"], $donnees["telephone"], $donnees["email"], $donnees["nom-utilisateur"], $donnees["mot-passe"], $donnees["profil"]);

	if ($resultat) {

        $message_success_global = "Utilisateur ajouté avec succès.";

    } else {

        $message_erreur_global = "Oups ! Une erreur s'est produite lors de l'enregistrement de l'utilisateur.";

    }
}

$_SESSION['donnees-utilisateur'] = $donnees;
$_SESSION['erreurs-utilisateur'] = $erreurs;
$_SESSION['ajout-message-success-global'] = $message_success_global;
$_SESSION['ajout-message-erreur-global'] = $message_erreur_global;
header('location: ' . PATH_PROJECT . 'administrateur/dashboard/ajout-user');

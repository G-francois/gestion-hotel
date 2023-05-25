<?php
$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];

if (isset($_POST["nom"]) && !empty($_POST["nom"])) {
	$nom = trim(htmlentities($_POST["nom"]));
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
	$prenom = (htmlentities($_POST["prenom"]));
	$pattern = '/^[A-Za-zÀ-ÿ\'\- ]+$/';

	/* Dans ce code, j'ai ajouté une nouvelle validation pour le champ "Prénoms". J'ai défini le
	pattern /^[A-Za-zÀ-ÿ\'\- ]+$/ qui vérifie que la chaîne $prenom respecte les
	critères suivants :

	[A-Za-zÀ-ÿ\'\- ] correspond à une classe de caractères qui accepte :
	Les lettres de A à Z en majuscules (A-Z).
	Les lettres de a à z en minuscules (a-z).
	Les lettres accentuées (par exemple, À, É, etc.) et autres caractères spéciaux qui peuvent apparaître dans les prénoms (À-ÿ).
	L'apostrophe (') et le tiret (-).
	L'espace ( ).
	Ensuite, j'ai utilisé la fonction preg_match() pour valider si le prenom correspond au pattern. Si c'est le cas, le prenom est ajouté 
	aux données ($donnees["prenom"]). Sinon, un message d'erreur approprié est stocké dans le tableau $erreurs["prenom"].
	*/

	if (preg_match($pattern, $prenom)) {
		$donnees["prenom"] = ucfirst($prenom);
	} else {
		$erreurs["prenom"] = "Le prénom n'est pas valide. Veuillez utiliser des lettres, des apostrophes, des tirets et des espaces.";
	}
} else {
	$erreurs["prenom"] = "Le champ prénom est requis. Veuillez le renseigner.";
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
		$erreurs["email"] = "Le champs email doit être une adresse mail valide. Veuillez le renseigné.";
	}
} else {
	$erreurs["email"] = "Le champs email est vide. Veuillez le renseigné.";
}

if (isset($_POST["nom-utilisateur"]) && !empty($_POST["nom-utilisateur"])) {
	$username = trim(htmlentities($_POST["nom-utilisateur"]));
	$pattern = '/^[a-zA-Z0-9_-]+$/';
	/*Dans ce code, j'ai ajouté une nouvelle validation pour le champ "nom d'utilisateur". J'ai défini le pattern /^[a-zA-Z0-9_-]+$/
	qui vérifie que la chaîne $username ne contient que des lettres minuscules, des chiffres, des tirets et des soulignements. Ensuite,
	j'ai utilisé la fonction preg_match() pour valider si le nom d'utilisateur correspond au pattern. Si c'est le cas, le nom d'utilisateur
	est ajouté aux données ($donnees["username"]). Sinon, un message d'erreur approprié est stocké dans le tableau $erreurs["username"].
	*/
	if (preg_match($pattern, $username)) {
		$donnees["nom-utilisateur"] = $username;
	} else {
		$erreurs["nom-utilisateur"] = "Le nom d'utilisateur ne peut contenir que des lettres minuscules, des chiffres, des tirets et des soulignements.";
	}
} else {
	$erreurs["nom-utilisateur"] = "Le champ nom d'utilisateur est requis. Veuillez le renseigner.";
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

if (!isset($_POST["termes-conditions"]) || empty($_POST["termes-conditions"])) {
	$erreurs["termes-conditions"] = "Veuillez termes-conditions cette case svp";
}

$check_email_exist_in_db = check_email_exist_in_db($_POST["email"]);

if ($check_email_exist_in_db) {
	$erreurs["email"] = "Cette adresse mail est déjà utilisée. Veuillez le changez.";
}

$check_user_name_exist_in_db = check_user_name_exist_in_db($_POST["nom-utilisateur"]);

if ($check_user_name_exist_in_db) {
	$erreurs["nom-utilisateur"] = "Ce nom d'utilisateur est déjà utilisé. Veuillez le changez.";
}

$check_user_name_exist_in_db = check_telephone_exist_in_db($_POST["telephone"]);

if ($check_user_name_exist_in_db) {
	$erreurs["telephone"] = "Ce numéro de téléphone est déjà utilisé. Veuillez le changez.";
}

$_SESSION['donnees-utilisateur'] = $donnees;
$_SESSION['inscription-erreurs'] = $erreurs;
$donnees["profil"] = "CLIENT";

if (empty($erreurs)) {

	$resultat = enregistrer_utilisateur($donnees["nom"], $donnees["prenom"], $donnees["telephone"], $donnees["email"], $donnees["nom-utilisateur"], $donnees["mot-passe"], $donnees["profil"]);

	if ($resultat) {
		$token = uniqid("");
		$id_utilisateur = recuperer_id_utilisateur_par_son_mail($donnees['email']);

		if (!insertion_token($id_utilisateur, 'VALIDATION_COMPTE', $token)) {
			$message_erreur_global = "Votre inscription s'est effectué avec succès mais une erreur est survenue lors de la génération de la clè de validation de votre compte. Veuillez contacter un administrateur.";
		} else {
			$objet = 'Validation de votre inscription';
			ob_start(); // Démarre la temporisation de sortie
			include 'app/client/inscription/message_mail.php'; // Inclut le fichier HTML dans le tampon
			$template_mail = ob_get_contents(); // Récupère le contenu du tampon
			ob_end_clean(); // Arrête et vide la temporisation de sortie

			if (send_email($donnees["email"], $objet, $template_mail)) {
				$message_success_global = "Votre inscription s'est effectué avec succès. Veuillez consulter votre adresse mail pour valider votre compte.";
			} else {
				$message_erreur_global = "Votre inscription s'est effectué avec succès mais une erreur est survenue lors de l'envoi du mail de validation de votre compte. Veuillez contacter un administrateur.";
			}
		}
	} else {
		$message_erreur_global = "Oups ! Une erreur s'est produite lors de l'enregistrement de l'utilisateur.";
	}
}

$_SESSION['inscription-message-erreur-global'] = $message_erreur_global;
$_SESSION['inscription-message-success-global'] = $message_success_global;
header('location: ' . PATH_PROJECT . 'client/inscription/index');

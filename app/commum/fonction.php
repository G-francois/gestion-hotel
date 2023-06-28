<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Cette fonction permet de se connecter a une base de donnée.
 * Elle retourne l'instance / objet de la base de donnée, si la connexion a la base de donnée est succès.
 *
 * @return object $db L'instance / objet de la base de donnée.
 */
function connect_db()
{

	$db = null;

	try {
		$db = new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME . ';charset=utf8', DATABASE_USERNAME, DATABASE_PASSWORD);
	} catch (\Exception $e) {
		$db = "Oups! Une erreur s'est produite lors de la connexion a la base de donnée.";
	}

	return $db;
}

/** Cette fonction permet d'inserer un utilisateur de profile CLIENT
 * @param int $id
 * @return bool
 */
function enregistrer_utilisateur(string $nom, string $prenom, int $telephone, string $email, string $nom_utilisateur, string $mot_passe, string $profil = "CLIENT"): bool
{
	$enregistrer_utilisateur = false;

	$db = connect_db();

	if (!is_null($db)) {

		// Ecriture de la requête
		$requette = 'INSERT INTO utilisateur (nom, prenom, telephone, email, nom_utilisateur, profil, mot_passe) VALUES (:nom, :prenom, :telephone, :email, :nom_utilisateur, :profil, :mot_passe)';

		// Préparation
		$inserer_utilisateur = $db->prepare($requette);

		// Exécution ! La recette est maintenant en base de données
		$resultat = $inserer_utilisateur->execute([
			'nom' => $nom,
			'prenom' => $prenom,
			'telephone' => $telephone,
			'email' => $email,
			'nom_utilisateur' => $nom_utilisateur,
			'profil' => $profil,
			'mot_passe' => sha1($mot_passe)
		]);

		$enregistrer_utilisateur = $resultat;
	}

	return $enregistrer_utilisateur;
}


/**
 * Cette fonction permet de verifier si un utilisateur dans la base de donnée ne possède pas cette adresse mail.
 * @param string $email L'email a vérifié.
 *
 * @return bool $check
 */
function check_email_exist_in_db(string $email): bool
{

	$check = false;

	$db = connect_db();

	if (is_object($db)) {

		$requette = "SELECT count(*) as nbr_utilisateur FROM utilisateur WHERE email = :email and est_supprimer = :est_supprimer";

		$verifier_email = $db->prepare($requette);

		$resultat = $verifier_email->execute([
			'email' => $email,
			'est_supprimer' => 0
		]);

		if ($resultat) {

			$nbr_utilisateur = $verifier_email->fetch(PDO::FETCH_ASSOC)["nbr_utilisateur"];

			$check = ($nbr_utilisateur > 0) ? true : false;
		}
	}

	return $check;
}

/**
 * Cette fonction permet de verifier si un utilisateur dans la base de donnée ne possède pas ce nom d'utilisateur.
 * @param string $nom_utilisateur Le nom d'utilisateur a vérifié.
 *
 * @return bool $check
 */
function check_user_name_exist_in_db(string $nom_utilisateur): bool
{

	$check = false;

	$db = connect_db();

	if (is_object($db)) {

		$requette = "SELECT count(*) as nbr_utilisateur FROM utilisateur WHERE nom_utilisateur = :nom_utilisateur and est_supprimer = :est_supprimer";

		$verifier_nom_utilisateur = $db->prepare($requette);

		$resultat = $verifier_nom_utilisateur->execute([
			'nom_utilisateur' => $nom_utilisateur,
			'est_supprimer' => 0
		]);

		if ($resultat) {

			$nbr_utilisateur = $verifier_nom_utilisateur->fetch(PDO::FETCH_ASSOC)["nbr_utilisateur"];

			$check = ($nbr_utilisateur > 0) ? true : false;
		}
	}

	return $check;
}


/**
 * Cette fonction permet de verifier si un utilisateur dans la base de donnée ne possède pas cette contact.
 * @param int $telephone Le téléphone a vérifié.
 *
 * @return bool $check
 */
function check_telephone_exist_in_db(string $telephone): bool
{

	$check = false;

	$db = connect_db();

	if (is_object($db)) {

		$requette = "SELECT count(*) as nbr_utilisateur FROM utilisateur WHERE telephone = :telephone and est_supprimer = :est_supprimer";

		$verifier_email = $db->prepare($requette);

		$resultat = $verifier_email->execute([
			'telephone' => $telephone,
			'est_supprimer' => 0
		]);

		if ($resultat) {

			$nbr_utilisateur = $verifier_email->fetch(PDO::FETCH_ASSOC)["nbr_utilisateur"];

			$check = ($nbr_utilisateur > 0) ? true : false;
		}
	}

	return $check;
}

/**
 * Cette fonction permet de verifier le profil administrateur
 *
 * @param  int $id
 * @return $verifier_profil
 */
function verifier_profil_administrateur(int $id)
{

	$verifier_profil = false;

	$db = connect_db();

	if (is_object($db)) {
		// Requête pour vérifier si l'utilisateur a le profil d'administrateur
		$requete = "SELECT profil FROM utilisateur WHERE id = :id";
		$requete_preparee = $db->prepare($requete);
		$requete_preparee->execute([
			':id' => $id
		]);

		if ($requete_preparee) {
			$resultat = $requete_preparee->fetch(PDO::FETCH_ASSOC);

			// Vérifiez si l'utilisateur a le profil d'administrateur.
			if ($resultat && $resultat['profil'] === 'administrateur') {
				return true; // L'utilisateur a le profil d'administrateur.
			}
		}
	}

	return $verifier_profil; // L'utilisateur n'a pas le profil d'administrateur.
}


/**
 * Cette fonction permet d'envoyer un mail a un destinataire.
 *
 * @param string $destination The destination.
 * @param string $subject The subject.
 * @param string $body The body.
 * @return bool The result.
 */
function send_email(string $destination, string $subject, string $body): bool
{
	// passing true in constructor enables exceptions in PHPMailer
	$mail = new PHPMailer(true);
	$mail->CharSet = "UTF-8";

	try {

		// Server settings
		// for detailed debug output
		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->Port = 587;

		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true,
			)
		);

		$mail->Username = MAIL_ADDRESS;
		$mail->Password = MAIL_PASSWORD;

		// Sender and recipient settings
		$mail->setFrom(MAIL_ADDRESS, htmlspecialchars_decode('HOTEL_SOUS_LES_COCOTIERS'));
		$mail->addAddress($destination, 'UTILISATEUR');
		$mail->addReplyTo(MAIL_ADDRESS, htmlspecialchars_decode('HOTEL_SOUS_LES_COCOTIERS'));

		// Setting the email content
		$mail->IsHTML(true);
		$mail->Subject = htmlspecialchars_decode($subject);
		$mail->Body = $body;

		return $mail->send();
	} catch (Exception $e) {

		return false;
	}
}


/**
 * Cette fonction permet de récupérer du html dans le buffer 
 *
 * @param  string $filename Le chemin ou le nom du fichier html à insérer
 * @param  int $id_utilisateur L'id de l'utilisateur
 * @param  string $token Le token générer
 * @return void
 */
function buffer_html_file($filename, $id_utilisateur, $token)
{
	ob_start(); // Démarre la temporisation de sortie

	include $filename; // Inclut le fichier HTML dans le tampon

	$html = ob_get_contents(); // Récupère le contenu du tampon
	ob_end_clean(); // Arrête et vide la temporisation de sortie

	return $html; // Retourne le contenu du fichier HTML
}


/**
 * Cette fonction permet d'inserer un token grâce à l'id de l'utilisateur dans la table token
 *
 * @param  int $user_id L'id de l'utilisateur
 * @param  string $type Le type de token
 * @param  string $token Le token générer
 * @return bool 
 */
function insertion_token(int $user_id, string $type, string $token): bool
{

	$insertion_token = false;

	$db = connect_db();

	if (is_object($db)) {

		$request = "INSERT INTO token (user_id, type, token) VALUES (:user_id, :type, :token)";

		$request_prepare = $db->prepare($request);

		$request_execution = $request_prepare->execute(
			[
				'user_id' => $user_id,
				'type' => $type,
				'token' => $token
			]
		);

		if ($request_execution) {

			$insertion_token = true;
		}
	}

	return $insertion_token;
}


/**
 *  Cette fonction permet de recupérer le token grâce à l'id de l'utilisateur dans la table token
 *
 * @param  int $user_id
 * @return array
 */
function recuperer_token(int $user_id): array
{

	$token = [];

	$db = connect_db();

	if (is_object($db)) {

		$request = "SELECT token FROM token WHERE user_id=:user_id";

		$request_prepare = $db->prepare($request);

		$request_execution = $request_prepare->execute([
			'user_id' => $user_id
		]);

		if ($request_execution) {

			$data = $request_prepare->fetchAll(PDO::FETCH_ASSOC);

			if (isset($data) && !empty($data) && is_array($data)) {

				$token = $data;
			}
		}
	}

	return $token;
}


/**
 * Cette fonction permet de récupérer l'id de l'utilisateur grâce a son adresse mail.
 *
 * @param string $email L'email de l'utilisateur.
 * @return int $user_id L'id de l'utilisateur.
 */
function recuperer_id_utilisateur_par_son_mail(string $email): int
{

	$user_id = 0;

	$db = connect_db();

	if (is_object($db)) {

		$request = "SELECT id FROM utilisateur WHERE email=:email";

		$request_prepare = $db->prepare($request);

		$request_execution = $request_prepare->execute([
			'email' => $email
		]);

		if ($request_execution) {

			$data = $request_prepare->fetch(PDO::FETCH_ASSOC);

			if (isset($data) && !empty($data) && is_array($data)) {

				$user_id = $data["id"];
			}
		}
	}
	return $user_id;
}


/**
 * Cette fonction permet de verifier si le id_utilisateur existe dans la base de donnée .
 * @param string $nom_utilisateur Le nom d'utilisateur a vérifié.
 *
 * @return bool $check
 */
function check_token_exist(int $user_id, string $token, string $type, int $est_actif = 1, int $est_supprimer = 0): bool
{

	$check = false;

	$db = connect_db();

	if (is_object($db)) {

		$requette = "SELECT * FROM token WHERE user_id = :user_id and token= :token and type= :type and est_actif= :est_actif and $est_supprimer= :est_supprimer";

		$verifier_id_utilisateur = $db->prepare($requette);

		$resultat = $verifier_id_utilisateur->execute([
			'user_id' => $user_id,
			'token' => $token,
			'type' => $type,
			'est_actif' => $est_actif,
			'est_supprimer' => $est_supprimer
		]);

		if ($resultat) {

			$data = $verifier_id_utilisateur->fetchAll(PDO::FETCH_ASSOC);

			if (isset($data) && !empty($data) && is_array($data)) {

				$check = true;
			}
		}
	}
	return $check;
}


/**
 * Cette fonction permet de mettre à jour la table est_supprimer du token à 1
 *
 * @param  mixed $id_utilisateur L'id de l'utilisateur.
 * @return bool
 */
function suppression_logique_token(int $id_utilisateur): bool
{
	$suppression_logique_token = false;

	$date = date("Y-m-d H:i:s");

	$db = connect_db();

	if (is_object($db)) {

		$request = "UPDATE token SET est_actif = :est_actif, est_supprimer = :est_supprimer, maj_le = :maj_le WHERE user_id= :id_utilisateur";

		$request_prepare = $db->prepare($request);

		$request_execution = $request_prepare->execute(
			[
				'id_utilisateur' => $id_utilisateur,
				'est_actif' => 0,
				'est_supprimer' => 1,
				'maj_le' => $date
			]
		);

		$suppression_logique_token = $request_execution;
	}

	return $suppression_logique_token;
}


/**
 * Cette fonction permet de mettre à jour la table est_actif de l'utilisateur à 1
 *
 * @param  mixed $id_utilisateur L'id de l'utilisateur.
 * @return bool
 */
function activation_compte_utilisateur(int $id_utilisateur): bool
{

	$activation_compte_utilisateur = false;

	$date = date("Y-m-d H:i:s");

	$db = connect_db();

	if (is_object($db)) {

		$request = "UPDATE utilisateur SET est_actif = :est_actif, maj_le = :maj_le WHERE id= :id_utilisateur";

		$request_prepare = $db->prepare($request);

		$request_execution = $request_prepare->execute(
			[
				'id_utilisateur' => $id_utilisateur,
				'est_actif' => 1,
				'maj_le' => $date
			]
		);
		$activation_compte_utilisateur = $request_execution;
	}

	return $activation_compte_utilisateur;
}


/**
 * Cette fonction permet de verifier si un utilisateur (email ou nom utilisateur + mot de passe) existe dans la base de donnée.
 *
 * @param  string $email_user_name L'email ou nom utilisateur
 * @param  string $password Le mot de passe de l'utilisateur
 * @param  string $profil Le profil de l'utilisateur.
 * @param  int $est_actif Le compte de l'utilisateur est actif 
 * @param  int $est_supprimer Le compte de l'utilisateur est supprimer
 * @return array $user Les informations de l'utilisateur
 */
function check_if_user_exist(string $email_user_name, string $password, string $profil, int $est_actif = 1, int $est_supprimer = 0)
{

	$user = [];

	$db = connect_db();

	$requette = "SELECT id, nom, prenom, sexe, email, telephone, nom_utilisateur, avatar, profil, mot_passe FROM utilisateur WHERE (email =:email_user_name OR nom_utilisateur =:email_user_name) and profil = :profil and mot_passe = :mot_passe and est_actif= :est_actif and est_supprimer= :est_supprimer";

	$verifier_nom_utilisateur = $db->prepare($requette);

	$resultat = $verifier_nom_utilisateur->execute([
		'email_user_name' => $email_user_name,
		'nom_utilisateur' => $email_user_name,
		'mot_passe' => sha1($password),
		'profil' => $profil,
		'est_actif' => $est_actif,
		'est_supprimer' => $est_supprimer
	]);

	if ($resultat) {
		$user = $verifier_nom_utilisateur->fetch(PDO::FETCH_ASSOC);
	}
	return $user;
}


/**
 * Cette fonction permet de verifier si le mot de passe de l'utilisateur existe dans la base de donnée.
 *
 * @param  int $id L'id de l'utilisateur.
 * @param  string $password Le mot de passe
 * @return bool
 */
function check_password_exist(string $password, int $id): bool
{
	$users = false;

	$db = connect_db();

	if (is_object($db)) {

		$requette = $db->prepare('SELECT id from utilisateur WHERE mot_passe= :mot_passe AND id= :id');

		$requette->execute(array(
			'mot_passe' => sha1($password),
			'id' => $id,
		));

		$users = $requette->fetch();
		if ($users) {

			$users = true;
		}
	}

	return $users;
}


/**
 * Cette fonction permet de savoir si un utilisateur administrateur est déjà connecté ou pas
 *
 * @return bool
 */
function check_if_user_connected_admin(): bool
{
	return !empty($_SESSION['utilisateur_connecter_admin']);
}

/**
 * Cette fonction permet de savoir si un utilisateur client est déjà connecté ou pas
 *
 * @return bool
 */
function check_if_user_connected_client(): bool
{
	return !empty($_SESSION['utilisateur_connecter_client']);
}

/**
 * Cette fonction permet de savoir si un utilisateur receptionniste est déjà connecté ou pas
 *
 * @return bool
 */
function check_if_user_connected_recept(): bool
{
	return !empty($_SESSION['utilisateur_connecter_recept']);
}


/**
 * Cette fonction permet d'effectuer la mise à jour du mot de passe de l'utilisateur
 *
 * @param  int $id L'id de l'utilisateur.
 * @param  string $password Le mot de passe
 * @return bool
 */
function mise_a_jour_mot_passe(int $id, string $password): bool
{

	$maj3 = false;

	$date = date("Y-m-d H:i:s");

	$db = connect_db();

	if (is_object($db)) {

		$request = "UPDATE utilisateur SET mot_passe = :mot_passe, maj_le = :maj_le  WHERE id= :id";

		$request_prepare = $db->prepare($request);

		$request_execution = $request_prepare->execute(array(
			'id' => $id,
			'mot_passe' => sha1($password),
			'maj_le' => $date
		));

		if ($request_execution) {

			$maj3 = true;
		}
	}

	return $maj3;
}


/**
 * Cette fonction permet d'effectuer la mise à jour de l'avatar de l'utilisateur
 *
 * @param  int $id L'id de l'utilisateur
 * @param  string $avatar La photo de profil
 * @return bool
 */
function mise_a_jour_avatar(int $id, string $avatar): bool
{

	$mise_a_jour_avatar = false;

	$date = date("Y-m-d H:i:s");

	$db = connect_db();

	if (is_object($db)) {

		$request = "UPDATE utilisateur SET avatar = :avatar, maj_le = :maj_le  WHERE id= :id";

		$request_prepare = $db->prepare($request);

		$request_execution = $request_prepare->execute(
			[
				'id' => $id,
				'avatar' => $avatar,
				'maj_le' => $date,
			]
		);

		if ($request_execution) {

			$mise_a_jour_avatar = true;
		}
	}

	return $mise_a_jour_avatar;
}


/**
 * Cette fonction permet d'effectuer la mise à jour des nouvelles infos UTILISATEUR
 *
 * @param  int $id
 * @param  string $nom
 * @param  string $prenom
 * @param  int $telephone
 * @param  string $nom_utilisateur
 * @return bool
 */
function mettre_a_jour_informations_utilisateur(int $id, string $nom, string $prenom, int $telephone, string $nom_utilisateur): bool
{

	$modifier_profil = false;

	$date = date("Y-m-d H:i:s");

	$db = connect_db();

	if (is_object($db)) {

		$request = "UPDATE utilisateur SET nom = :nom, prenom = :prenom, telephone = :telephone, nom_utilisateur = :nom_utilisateur, maj_le = :maj_le WHERE id= :id";

		$request_prepare = $db->prepare($request);

		$request_execution = $request_prepare->execute(array(
			'id' => $id,
			'nom' => $nom,
			'prenom' => $prenom,
			'telephone' => $telephone,
			'nom_utilisateur' => $nom_utilisateur,
			'maj_le' => $date
		));

		if ($request_execution) {

			$modifier_profil = true;
		}
	}

	return $modifier_profil;
}


/**
 *  Cette fonction permet de recuperer les nouvelles infos UTILISATEUR
 *
 * @param  int $id
 * @return array
 */

function recuperer_mettre_a_jour_informations_utilisateur($id): array
{

	$recup = [];

	$db = connect_db();

	if (is_object($db)) {

		$request_recupere = $db->prepare('SELECT  id, nom, prenom, sexe, email, telephone, nom_utilisateur, avatar, profil FROM utilisateur WHERE id= :id');

		$resultat = $request_recupere->execute(array(
			'id' => $id,
		));

		if ($resultat) {
			$recup = $request_recupere->fetch(PDO::FETCH_ASSOC);
		}
	}

	return $recup;
}


/**
 * Cette fonction permet de désactiver un UTILISATEUR
 *
 * @param  int $id
 * @return bool
 */
function desactiver_utilisateur(int $id): bool
{

	$profile_active = false;

	$date = date("Y-m-d H:i:s");

	$db = connect_db();

	if (is_object($db)) {

		$request = "UPDATE utilisateur SET  est_actif = :est_actif, maj_le = :maj_le WHERE id= :id";

		$request_prepare = $db->prepare($request);

		$request_execution = $request_prepare->execute(array(
			'id' => $id,
			'est_actif' => 0,
			'maj_le' => $date
		));

		if ($request_execution) {

			$profile_active = true;
		}
	}

	return $profile_active;
}


/**
 *  Cette fonction permet de supprimer un UTILISATEUR
 *
 * @param  int $id
 * @return bool
 */
function supprimer_utilisateur(int $id): bool
{

	$profile_supprimer = false;

	$date = date("Y-m-d H:i:s");

	$db = connect_db();

	if (is_object($db)) {

		$request = "UPDATE utilisateur SET est_actif = :est_actif, est_supprimer = :est_supprimer, maj_le = :maj_le WHERE id= :id";

		$request_prepare = $db->prepare($request);

		$request_execution = $request_prepare->execute(array(
			'id' => $id,
			'est_actif' => 0,
			'est_supprimer' => 1,
			'maj_le' => $date
		));

		if ($request_execution) {

			$profile_supprimer = true;
		}
	}

	return $profile_supprimer;
}


/** Cette fonction permet d'inserer un utilisateur de profile ADMINISTRATEUR
 * @param int $id
 * @return bool
 */
function enregistrer_utilisateur_admin(string $nom, string $prenom, string $sexe, int $telephone, string $email, string $nom_utilisateur, string $mot_passe, string $profil): bool
{
	$enregistrer_utilisateur = false;

	$db = connect_db();

	if (!is_null($db)) {

		// Ecriture de la requête
		$requette = 'INSERT INTO utilisateur (nom, prenom, sexe, telephone, email, nom_utilisateur, profil, mot_passe) VALUES (:nom, :prenom, :sexe, :telephone, :email, :nom_utilisateur, :profil, :mot_passe)';

		// Préparation
		$inserer_utilisateur = $db->prepare($requette);

		// Exécution ! La recette est maintenant en base de données
		$resultat = $inserer_utilisateur->execute([
			'nom' => $nom,
			'prenom' => $prenom,
			'sexe' => $sexe,
			'telephone' => $telephone,
			'email' => $email,
			'nom_utilisateur' => $nom_utilisateur,
			'profil' => $profil,
			'mot_passe' => sha1($mot_passe)
		]);

		$enregistrer_utilisateur = $resultat;
	}

	return $enregistrer_utilisateur;
}

/**
 * Cette fonction permet de récupérer la liste des utilisateurs de la base de donnée.
 *
 * @return array $liste_utilisateurs La liste des utilisateurs.
 */
function recuperer_liste_utilisateurs(): array
{

	$db = connect_db();

	if (!is_null($db)) {

		$requette = 'SELECT * FROM utilisateur';

		$verifier_liste_utilisateurs = $db->prepare($requette);

		$resultat = $verifier_liste_utilisateurs->execute();

		if ($resultat) {

			$liste_utilisateurs = $verifier_liste_utilisateurs->fetchAll(PDO::FETCH_ASSOC);
		}
	}
	return $liste_utilisateurs;
}


/**
 * Cette fonction permet d'activer_utilisateur
 *
 * @param  int $id
 * @return bool
 */
function activer_utilisateur(int $id): bool
{
	$profile_active = false;

	$date = date("Y-m-d H:i:s");

	$db = connect_db();

	if (is_object($db)) {
		$request = "UPDATE utilisateur SET est_actif = :est_actif, maj_le = :maj_le WHERE id = :id";
		$request_prepare = $db->prepare($request);
		$request_execution = $request_prepare->execute(array(
			'id' => $id,
			'est_actif' => 1,
			'maj_le' => $date
		));

		if ($request_execution) {
			$profile_active = true;
		}
	}

	return $profile_active;
}

/**
 * Cette fonction permet de supprimer un utilisateur de façon définitive de la base de données à partir de son id.
 *
 * @param int $id L'id de l'utilisateur'.
 * @return bool Indique si la suppression a réussi ou non.
 */
function suppression_compte_utilisateur(int $id): bool
{
	$utilisateur_est_supprimer = false;

	$db = connect_db();

	if (!is_null($db)) {
		$requete = 'DELETE FROM utilisateur WHERE id = :id';

		$supprimer_chambre = $db->prepare($requete);

		$resultat = $supprimer_chambre->execute([
			'id' => $id,
		]);

		if ($resultat) {
			$utilisateur_est_supprimer = true;
		}
	}

	return $utilisateur_est_supprimer;
}


/**
 * Cette fonction permet d'enregistrer un repas
 *
 * @param  string $nom_repas le nom du repas
 * @param  int $pu_repas le prix unitaire du repas
 * @param  int $est_actif le est actif ou pas
 * @return bool
 */
function enregistrer_repas(string $nom_repas, int $pu_repas, int $est_actif = 1): bool
{
	$enregistrer_repas = false;

	$db = connect_db();

	if (!is_null($db)) {

		$requette = 'INSERT INTO repas (nom_repas, pu_repas, est_actif) VALUES (:nom_repas, :pu_repas, :est_actif)';

		$inserer_repas = $db->prepare($requette);

		$resultat = $inserer_repas->execute([
			'nom_repas' => $nom_repas,
			'pu_repas' => $pu_repas,
			'est_actif' => $est_actif
		]);

		$enregistrer_repas = $resultat;
	}

	return $enregistrer_repas;
}


/**
 * Cette fonction permet de verifier si l'un repas dans la base de donnée ne possède pas ce nom.
 * @param int $ nom_repas Le nom du repas a vérifié.
 *
 * @return bool $check
 */
function check_if_repas_exist_in_db(string $nom_repas): bool
{

	$check = false;

	$db = connect_db();

	if (is_object($db)) {

		$requette = "SELECT count(*) as nbr_repas FROM repas WHERE nom_repas = :nom_repas and est_supprimer = :est_supprimer";

		$verifier_nom_repas = $db->prepare($requette);

		$resultat = $verifier_nom_repas->execute([
			'nom_repas' => $nom_repas,
			'est_supprimer' => 0
		]);

		if ($resultat) {

			$nbr_utilisateur = $verifier_nom_repas->fetch(PDO::FETCH_ASSOC)["nbr_repas"];

			$check = ($nbr_utilisateur > 0) ? true : false;
		}
	}

	return $check;
}


/**
 * Cette fonction permet de récupérer la liste des repas de la base de donnée.
 *
 * @return array $liste_repas La liste des repas.
 */
function recuperer_liste_repas(): array
{

	$db = connect_db();

	if (!is_null($db)) {

		$requette = 'SELECT * FROM repas';

		$verifier_liste_repas = $db->prepare($requette);

		$resultat = $verifier_liste_repas->execute();

		if ($resultat) {

			$liste_repas = $verifier_liste_repas->fetchAll(PDO::FETCH_ASSOC);
		}
	}
	return $liste_repas;
}

/**
 * Cette fonction permet de récupérer les informations d'un repas à partir de son code repas.
 *
 * @param int $cod_repas Le code du repas.
 * @return array 
 */
function recuperer_repas_par_son_code_repas(int $cod_repas): array
{
	$repas = array();

	$db = connect_db();

	$requette = 'SELECT * FROM repas WHERE cod_repas = :cod_repas ';

	$verifier_repas = $db->prepare($requette);

	$resultat = $verifier_repas->execute([
		"cod_repas" => $cod_repas
	]);

	if ($resultat) {

		$repas = $verifier_repas->fetchAll(PDO::FETCH_ASSOC);
	}

	return $repas;
}


/**
 * Cette fonction permet de modifier un repas existant dans la base de données via son code repas.
 *
 * @param int $cod_repas Le code du repas.
 * @param string $nom_repas Le nom du repas.
 * @param int $pu_repas Le prix du repas.
 * @return bool Indique si la modification a réussi ou non.
 */
function modifier_repas(int $cod_repas, string $nom_repas, int $pu_repas): bool
{
	$modifier_repas = false;

	$date = date("Y-m-d H:i:s");

	$db = connect_db();

	if (!is_null($db)) {
		$requete = 'UPDATE repas SET nom_repas = :nom_repas, pu_repas = :pu_repas, maj_le = :maj_le  WHERE cod_repas = :cod_repas';

		$modifier_repas = $db->prepare($requete);

		$resultat = $modifier_repas->execute([
			'cod_repas' => $cod_repas,
			'nom_repas' => $nom_repas,
			'pu_repas' => $pu_repas,
			'maj_le' => $date
		]);

		if ($resultat) {
			$modifier_repas = true;
		}
	}

	return $modifier_repas;
}

/**
 * Cette fonction permet de supprimer un repas de la base de données à partir de son code repas.
 *
 * @param int $cod_repas Le code du repas.
 * @return bool Indique si la suppression a réussi ou non.
 */
function supprimer_repas(int $cod_repas): bool
{
	$repas_est_supprime = false;

	$db = connect_db();

	if (!is_null($db)) {
		$requete = 'DELETE FROM repas WHERE cod_repas = :cod_repas';

		$supprimer_repas = $db->prepare($requete);

		$resultat = $supprimer_repas->execute([
			'cod_repas' => $cod_repas,
		]);

		if ($resultat) {
			$repas_est_supprime = true;
		}
	}

	return $repas_est_supprime;
}


/**
 * Cette fonction permet d'enregistrer une chambre
 *
 * @param  int $cod_typ
 * @param  string $lib_typ
 * @param  string $statut
 * @param  int $pu
 * @param  int $est_actif
 * @return bool
 */
function enregistrer_chambre(string $num_chambre, int $cod_typ, string $lib_typ, int $pu,  int $est_actif = 1): bool
{
	$enregistrer_chambre = false;

	$db = connect_db();

	if (!is_null($db)) {

		$requette = 'INSERT INTO chambre (num_chambre, cod_typ, lib_typ, pu, est_actif) VALUES (:num_chambre, :cod_typ, :lib_typ, :pu, :est_actif)';

		$inserer_chambre = $db->prepare($requette);

		$resultat = $inserer_chambre->execute([
			'num_chambre' => $num_chambre,
			'cod_typ' => $cod_typ,
			'lib_typ' => $lib_typ,
			'pu' => $pu,
			'est_actif' => $est_actif
		]);

		$enregistrer_chambre = $resultat;
	}

	return $enregistrer_chambre;
}

/**
 * Cette fonction permet de verifier si l'une chambres dans la base de donnée ne possède pas ce numeros.
 * @param string $num_chambre Le numéro de chambre a vérifié.
 *
 * @return bool $check
 */
function check_if_chambre_exist_in_db(int $num_chambre): bool
{

	$check = false;

	$db = connect_db();

	if (is_object($db)) {

		$requette = "SELECT count(*) as nbr_chambre FROM chambre WHERE num_chambre = :num_chambre and est_supprimer = :est_supprimer";

		$verifier_num_chambre = $db->prepare($requette);

		$resultat = $verifier_num_chambre->execute([
			'num_chambre' => $num_chambre,
			'est_supprimer' => 0
		]);

		if ($resultat) {

			$nbr_utilisateur = $verifier_num_chambre->fetch(PDO::FETCH_ASSOC)["nbr_chambre"];

			$check = ($nbr_utilisateur > 0) ? true : false;
		}
	}

	return $check;
}
/**
 * Cette fonction permet de récupérer la liste des chambres de la base de donnée.
 *
 * @return array $liste_chambre La liste des chambres.
 */
function recuperer_liste_chambres(): array
{

	$db = connect_db();

	if (!is_null($db)) {

		$requette = 'SELECT * FROM chambre';

		$verifier_liste_chambres = $db->prepare($requette);

		$resultat = $verifier_liste_chambres->execute();

		if ($resultat) {

			$liste_chambre = $verifier_liste_chambres->fetchAll(PDO::FETCH_ASSOC);
		}
	}
	return $liste_chambre;
}

/**
 * Cette fonction permet de récupérer les informations d'un repas à partir de son code repas.
 *
 * @param int $num_chambre Le numéro de chambre
 * @return array 
 */
function recuperer_chambre_par_son_num_chambre(int $num_chambre): array
{
	$chambre = array();

	$db = connect_db();

	$requette = 'SELECT * FROM chambre WHERE num_chambre = :num_chambre ';

	$verifier_repas = $db->prepare($requette);

	$resultat = $verifier_repas->execute([
		"num_chambre" => $num_chambre
	]);

	if ($resultat) {

		$chambre = $verifier_repas->fetchAll(PDO::FETCH_ASSOC);
	}

	return $chambre;
}


/**
 * Cette fonction permet de modifier une chambre existant dans la base de données via son numéro de chambre.
 *
 * @param int $num_chambre Le numéro de chambre
 * @param int $cod_typ Le code type de chambre
 * @param string $lib_typ Le libellé du type  de chambre
 * @param int $pu Le prix unitaire  de la chambre
 * @return bool Indique si la modification a réussi ou non.
 */
function modifier_chambre(int $num_chambre, int $cod_typ, string $lib_typ, int $pu): bool
{
	$modifier_chambre = false;

	$date = date("Y-m-d H:i:s");

	$db = connect_db();

	if (!is_null($db)) {
		$requete = 'UPDATE chambre SET cod_typ = :cod_typ, lib_typ = :lib_typ, pu = :pu, maj_le = :maj_le  WHERE num_chambre = :num_chambre';

		$modifier_chambre = $db->prepare($requete);

		$resultat = $modifier_chambre->execute([
			'num_chambre' => $num_chambre,
			'cod_typ' => $cod_typ,
			'lib_typ' => $lib_typ,
			'pu' => $pu,
			'maj_le' => $date
		]);

		if ($resultat) {

			$modifier_chambre = true;
		}
	}

	return $modifier_chambre;
}

/**
 * Cette fonction permet de supprimer une chambre de la base de données à partir de son numero de chambre.
 *
 * @param int $num_chambre Le numero de chambre.
 * @return bool Indique si la suppression a réussi ou non.
 */
function supprimer_chambre(int $num_chambre): bool
{
	$chambre_est_supprimer = false;

	$db = connect_db();

	if (!is_null($db)) {
		$requete = 'DELETE FROM chambre WHERE num_chambre = :num_chambre';

		$supprimer_chambre = $db->prepare($requete);

		$resultat = $supprimer_chambre->execute([
			'num_chambre' => $num_chambre,
		]);

		if ($resultat) {
			$chambre_est_supprimer = true;
		}
	}

	return $chambre_est_supprimer;
}

// Fonction pour effectuer la réservation d'une chambre
function enregistrer_reservation(int $num_res, int $num_chambre, string $date_debut, string $date_fin, int $statut): bool
{
	$enregistrer_reservation = false;

	$date = date("Y-m-d H:i:s");

	$db = connect_db();

	if (!is_null($db)) {
		$requete = 'INSERT INTO reservation (num_res, num_chambre, date_debut, date_fin, statut, maj_le) VALUES (:num_res, :num_chambre, :date_debut, :date_fin, :statut, :maj_le)';

		$enregistrer_reservation = $db->prepare($requete);

		$resultat = $enregistrer_reservation->execute([
			'num_res' => $num_res,
			'num_chambre' => $num_chambre,
			'date_debut' => $date_debut,
			'date_fin' => $date_fin,
			'statut' => $statut,
			'maj_le' => $date
		]);

		if ($resultat) {
			$enregistrer_reservation = true;
		}
	}

	return $enregistrer_reservation;
}

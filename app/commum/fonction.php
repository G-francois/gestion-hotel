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
 * @return void
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
 * Cette fonction permet de savoir si un utilisateur admin est déjà connecté ou pas
 *
 * @return bool
 */
function check_if_user_connected_admin(): bool
{
	return !empty($_SESSION['utilisateur_connecter_admin']);
}

/**
 * Cette fonction permet de savoir si un utilisateur admin est déjà connecté ou pas
 *
 * @return bool
 */
function check_if_user_connected_client(): bool
{
	return !empty($_SESSION['utilisateur_connecter_client']);
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
function mise_a_jour_new_info_user(int $id, string $nom, string $prenom, int $telephone, string $nom_utilisateur): bool
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

function recup_mise_a_jour_new_info_user($id): array
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


/** Cette fonction permet d'inserer un utilisateur de profile ADMINISTRATEUR
 * @param int $id
 * @return bool
 */
function enregistrer_utilisateur_admin(string $nom, string $prenom, string $sexe, int $telephone, string $email, string $nom_utilisateur, string $mot_passe, string $profil = "ADMINISTRATEUR"): bool
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

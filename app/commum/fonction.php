<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
function check_email_exist_in_db(string $email)
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
function check_user_name_exist_in_db(string $nom_utilisateur)
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
 * @param string $telephone Le téléphone a vérifié.
 *
 * @return bool $check
 */
function check_telephone_exist_in_db(string $telephone)
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
 * Send mail.
 *
 * @param string $destination The destination.
 * @param string $subject The subject.
 * @param string $body The body.
 * @return bool The result.
 */
function email(string $destination, string $subject, string $body): bool
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

// Exemple de fonction pour récupérer du html dans le buffer

function buffer_html_file($filename)
{
    ob_start(); // Démarre la temporisation de sortie

    include $filename; // Inclut le fichier HTML dans le tampon

    $html = ob_get_contents(); // Récupère le contenu du tampon
    ob_end_clean(); // Arrête et vide la temporisation de sortie

    return $html; // Retourne le contenu du fichier HTML
}

//Exemple de fonction pour exécuter la requête INSERT INTO token

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

// Récupérer le token

function recuperer_token(string $user_id)
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

// Récupérer l'id de l'utilisateur

function select_user_id(string $email)
{

    $user_id = [];

    $db = connect_db();

    if (is_object($db)) {

        $request = "SELECT id FROM utilisateur WHERE email=:email";

        $request_prepare = $db->prepare($request);

        $request_execution = $request_prepare->execute([
            'email' => $email
        ]);

        if ($request_execution) {

            $data = $request_prepare->fetchAll(PDO::FETCH_ASSOC);

            if (isset($data) && !empty($data) && is_array($data)) {

                $user_id = $data;
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
function check_id_utilisateur_exist_in_db(int $user_id, string $token, string $type, int $est_actif, int $est_supprimer): bool
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




// Exemple de fonction pour exécuter la requête UPDATE TOKEN

function maj(int $id_utilisateur): bool
{

    $maj = false;

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

        if ($request_execution) {

            $maj = true;
        }
    }

    return $maj;
}


// Exemple de fonction pour exécuter la requête UPDATE est_actif UTILISATEUR

function maj1(int $id_utilisateur): bool
{

    $maj1 = false;

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

        if ($request_execution) {

            $maj1 = true;
        }
    }

    return $maj1;
}


/**
 * Cette fonction permet de verifier si un utilisateur (email + mot de passe) existe dans la base de donnée.
 * Si oui elle retourne un tableau contenant les informations de l'utilisateur.
 * Sinon elle retourne un tableau vide.
 *
 * @param string $email L'email.
 * @param string $password Le mot de passe.
 *
 * @return array $user Les informations de l'utilisateur.
 */
function check_if_user_exist(string $email_user_name, string $password, string $profil, int $est_actif = 1, int $est_supprimer = 0): bool
{
    $user = false;

    $db = connect_db();


    if (is_object($db)) {

        $requette = "SELECT id, nom, prenom, sexe, date_naissance, email, telephone, nom_utilisateur, avatar, profil, mot_passe FROM utilisateur WHERE (email =:email_user_name OR nom_utilisateur =:email_user_name) and profil = :profil and mot_passe = :mot_passe and est_actif= :est_actif and est_supprimer= :est_supprimer";

        $verifier_nom_utilisateur = $db->prepare($requette);

        $resultat = $verifier_nom_utilisateur->execute([
            'email_user_name' => $email_user_name,
            'nom_utilisateur' => $email_user_name,
            'mot_passe' => sha1($password),
            'profil' => $profil,
            'est_actif' => $est_actif,
            'est_supprimer' => $est_supprimer,
        ]);

        if ($resultat) {

            $utilisateur = $verifier_nom_utilisateur->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['utilisateur_connecter'] = $utilisateur;

            $user = (isset($utilisateur) && !empty($utilisateur) && is_array($utilisateur)) ? true : false;
        }
    }

    return $user;
}

/**
 * Cette fonction permet de verifier si le mot de passe de l'utilisateur existe dans la base de donnée.
 */
function check_password_exist(string $password, int $id)
{
    $users = false;

    $db = connect_db();

    if (is_object($db)) {

        $requette = $db->prepare('SELECT id from utilisateur WHERE mot_passe= :mot_passe AND id= :id');

        $requette->execute(array(
            'mot_passe' => sha1($password),
            'id' => $id
        ));

        $users = $requette->fetch();
        if ($users) {

            $users = true;
        }
    }

    return $users;
}



// Exemple de fonction pour un utilisateur déjà connecté 

function check_if_user_conneted()
{

    $check = false;


    if (isset($_SESSION['utilisateur_connecter']) && !empty($_SESSION['utilisateur_connecter'])) {

        $check = true;
    }

    return $check;
}

// Exemple de fonction pour exécuter la requête UPDATE mot de passe UTILISATEUR

function maj_mot_passe(int $id, string $password): bool
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


// Exemple de fonction pour exécuter la requête UPDATE avatar UTILISATEUR

function maj_avatar(int $id, string $avatar): bool
{

    $maj_avatar = false;

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

            $maj_avatar = true;
        }
    }

    return $maj_avatar;
}


// Exemple de fonction pour exécuter la requête UPDATE des nouvelles infos UTILISATEUR

function maj_nv_info_user(int $id, string $nom, string $prenom, string $telephone, string $nom_utilisateur): bool
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


// Exemple de fonction pour recuperer les nouvelles infos UTILISATEUR

function recup_maj_nv_info_user($id): bool
{

    $recup = false;

    $db = connect_db();

    if (is_object($db)) {

        $request_recupere = $db->prepare('SELECT  id, nom, prenom, sexe, date_naissance, email, telephone, nom_utilisateur, avatar, profil FROM utilisateur WHERE id= :id');

        $resultat = $request_recupere->execute(array(
            'id' => $id,
        ));

        if ($resultat) {
            $donnees = [];

            $donnees = $request_recupere->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['utilisateur_connecter'] = $donnees;

            $recup = true;
        }
    }

    return $recup;
}


// Exemple de fonction pour désactiver un UTILISATEUR

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

// Exemple de fonction pour supprimer un UTILISATEUR

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

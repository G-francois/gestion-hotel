<?php

use Random\Engine\Secure;
$donnees = [];
$message_erreur_global = "";
$message_success_global = "";
$erreurs = [];


if (isset($_POST["email"]) && !empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $donnees["email"] = $_POST["email"];
} else {
    $erreurs["email"] = "Le champs email est requis. Veuillez le renseigné.";
}

$_SESSION['donnees-utilisateur'] = $donnees;
$_SESSION['verification-erreurs'] = $erreurs;

$_SESSION['email-utilisateur'] = $id_utilisateur;

if (empty($erreurs)) {

    if (check_email_exist_in_db($_POST["email"])) {
        $token = uniqid("");
        $id_utilisateur = recuperer_id_utilisateur_par_son_mail($donnees['email']);

        if (!insertion_token($id_utilisateur, 'NOUVEAU_MOT_DE_PASSE', $token)) {
            $message_erreur_global = "La vérification de l'adresse mail s'est effectué avec succès mais une erreur est survenue lors de la génération de la clé de modification de mot de passe. Veuillez contacter un administrateur.";
        } else {
            $objet = 'Modification de mot de passe';
            ob_start(); // Démarre la temporisation de sortie
            include 'app/client/inscription/message_mail.php'; // Inclut le fichier HTML dans le tampon
            $template_mail = ob_get_contents(); // Récupère le contenu du tampon
            ob_end_clean(); // Arrête et vide la temporisation de sortie

            if (send_email($donnees["email"], $objet, $template_mail)) {
                $donnees = ($_POST["email"]);
                //Création du cookie
                setcookie(
                    "mot_passe",
                    json_encode($donnees['email']),
                    [
                        'expires' => time() + 365 * 24 * 36000,
                        'path' => '/',
                        'secure' => 'true',
                        'httponly' => 'true',
                    ]
                );
                $message_success_global = "La vérification de l'adresse mail s'est effectué avec succès. Veuillez consulter votre adresse mail pour mettre un nouveau mot de passe.";
            } else {
                $message_erreur_global = "La vérification de l'adresse mail s'est effectué avec succès mais une erreur est survenue lors de l'envoi du mail de validation de votre compte. Veuillez contacter un administrateur.";
            }
        }
    } else {
        $message_erreur_global = "Oups ! Une erreur s'est produite lors de la vérification de l'adresse mail de l'utilisateur.";
    }
} elseif (!isset($erreurs['email'])) {
    $message_erreur_global = "Oups ! Une erreur s'est produite lors de la vérification de l'adresse mail de l'utilisateur.";
}


$_SESSION['inscription-message-erreur-global'] = $message_erreur_global;
$_SESSION['inscription-message-success-global'] = $message_success_global;
header('location: ' . PATH_PROJECT . 'client/mot_de_passe/index');

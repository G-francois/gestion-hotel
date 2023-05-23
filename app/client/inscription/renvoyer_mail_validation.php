<?php

session_start();

$url = 'localhost' . PATH_PROJECT . 'client/validation_de_compte/index.php?id_utilisateur={id_utilisateur}&token={token}';

// Vérifier si l'utilisateur est connecté et si l'ID de l'utilisateur existe
if (isset($_SESSION['validation_compte']) && !empty($_SESSION['validation_compte'])) {
    $id_utilisateur = $_SESSION['validation_compte']['id_utilisateur'];

    // Générer un nouveau token
    $new_token = uniqid("");

    // Mettre à jour le nouveau token en session
    $_SESSION['validation_compte']['token'] = $new_token;
}

$url = str_replace('{id_utilisateur}', $id_utilisateur, $url);
$url = str_replace('{token}', $new_token, $url);

$expiration_date = date('Y-m-d H:i:s', strtotime('+24 hours')); // Expiration dans 24 heures

// Ajouter la date d'expiration et le nouveau token à l'URL
$url .= '?expiration=' . urlencode($expiration_date);

// Envoyer le nouvel e-mail de validation
$objet = 'Nouvel e-mail de validation de compte';

$message = buffer_html_file('..' . PATH_PROJECT . 'app/client/inscription/message_mail.php');
if (email($donnees["email"], $objet, $message)) {
    $_SESSION['validation'] = "Veuillez consulter votre adresse e-mail pour valider votre compte.";
    header('location: ' . PATH_PROJECT . 'client/inscription/index');
} else {
    header('location: ' . PATH_PROJECT . 'client/inscription/pages-error-404');
}






$message = hjgfeyufqgzeukgkf;

if (email($adresse_email, $objet, $message)) {
// L'e-mail a été envoyé avec succès
$_SESSION['validation'] = "Un nouvel e-mail de validation a été envoyé à votre adresse e-mail.";
header('location: ' . PATH_PROJECT . 'client/inscription/index');
exit();
} else {
// Une erreur s'est produite lors de l'envoi de l'e-mail
$_SESSION['validation'] = "Une erreur s'est produite lors de l'envoi de l'e-mail de validation.";
header('location: ' . PATH_PROJECT . 'client/inscription/index');
exit();
}
} else {
// L'ID de l'utilisateur n'est pas disponible, rediriger vers une autre page
header('location: ' . PATH_PROJECT . 'client/inscription/pages-error');
exit();
}
?>

<?php
// LES SESSIONS UTILISEE LORS DE LA PAGE INSCRIPTION - CONNECTION - MOT DE PASSE OUBLIER DE L'ADMINISTRATEUR 
if (isset($_SESSION['inscription-erreurs-admin']) && !empty($_SESSION['inscription-erreurs-admin'])) {
    $erreurs = $_SESSION['inscription-erreurs-admin'];
}

if (isset($_SESSION['donnees-utilisateur-admin']) && !empty($_SESSION['donnees-utilisateur-admin'])) {
    $donnees = $_SESSION['donnees-utilisateur-admin'];
}

if (isset($_SESSION['connexion-erreurs-admin']) && !empty($_SESSION['connexion-erreurs-admin'])) {
    $erreurs = $_SESSION['connexion-erreurs'];
}

if (isset($_SESSION['verification-erreurs-admin']) && !empty($_SESSION['verification-erreurs-admin'])) {
    $erreurs = $_SESSION['verification-erreurs-admin'];
}

if (isset($_SESSION['enregistrer-erreurs-admin']) && !empty($_SESSION['enregistrer-erreurs-admin'])) {
    $erreurs = $_SESSION['enregistrer-erreurs-admin'];
}

// LES SESSIONS UTILISEE LORS DE LA PAGE INSCRIPTION - CONNECTION - MOT DE PASSE OUBLIER DE LA RECEPTIONNISTE 
if (isset($_SESSION['inscription-erreurs']) && !empty($_SESSION['inscription-erreurs'])) {
    $erreurs = $_SESSION['inscription-erreurs'];
}

if (isset($_SESSION['donnees-utilisateur']) && !empty($_SESSION['donnees-utilisateur'])) {
    $donnees = $_SESSION['donnees-utilisateur'];
}

if (isset($_SESSION['connexion-erreurs']) && !empty($_SESSION['connexion-erreurs'])) {
    $erreurs = $_SESSION['connexion-erreurs'];
}

if (isset($_SESSION['verification-erreurs']) && !empty($_SESSION['verification-erreurs'])) {
    $erreurs = $_SESSION['verification-erreurs'];
}

if (isset($_SESSION['enregistrer-erreurs']) && !empty($_SESSION['enregistrer-erreurs'])) {
    $erreurs = $_SESSION['enregistrer-erreurs'];
}

?>

<?php
// LES SESSIONS UTILISEE LORS DU PARAMETRAGE DU PROFILE ADMINISTRATEUR
if (isset($_SESSION['changement-erreurs-admin']) && !empty($_SESSION['changement-erreurs-admin'])) {
    $erreurs = $_SESSION['changement-erreurs-admin'];
}

if (isset($_SESSION['sauvegarder-erreurs-admin']) && !empty($_SESSION['sauvegarder-erreurs-admin'])) {
    $erreurs = $_SESSION['sauvegarder-erreurs-admin'];
}

if (isset($_SESSION['suppression-erreurs-admin']) && !empty($_SESSION['suppression-erreurs-admin'])) {
    $erreurs = $_SESSION['suppression-erreurs-admin'];
}

if (isset($_SESSION['suppression-photo-erreurs-admin']) && !empty($_SESSION['suppression-photo-erreurs-admin'])) {
    $erreurs = $_SESSION['suppression-photo-erreurs-admin'];
}

if (isset($_SESSION['desactivation-erreurs-admin']) && !empty($_SESSION['desactivation-erreurs-admin'])) {
    $erreurs = $_SESSION['desactivation-erreurs'];
}

if (isset($_SESSION['photo-erreurs-admin']) && !empty($_SESSION['photo-erreurs-admin'])) {
    $erreurs = $_SESSION['photo-erreurs-admin'];
}

if (isset($_SESSION['erreurs-admin']) && !empty($_SESSION['erreurs-admin'])) {
    $erreurs = $_SESSION['erreurs-admin'];
}


// LES SESSIONS UTILISEE LORS DU PARAMETRAGE DU PROFILE RECEPTIONNISTE
if (isset($_SESSION['changement-erreurs']) && !empty($_SESSION['changement-erreurs'])) {
    $erreurs = $_SESSION['changement-erreurs'];
}

if (isset($_SESSION['sauvegarder-erreurs']) && !empty($_SESSION['sauvegarder-erreurs'])) {
    $erreurs = $_SESSION['sauvegarder-erreurs'];
}

if (isset($_SESSION['suppression-erreurs']) && !empty($_SESSION['suppression-erreurs'])) {
    $erreurs = $_SESSION['suppression-erreurs'];
}

if (isset($_SESSION['suppression-photo-erreurs']) && !empty($_SESSION['suppression-photo-erreurs'])) {
    $erreurs = $_SESSION['suppression-photo-erreurs'];
}

if (isset($_SESSION['desactivation-erreurs']) && !empty($_SESSION['desactivation-erreurs'])) {
    $erreurs = $_SESSION['desactivation-erreurs'];
}

if (isset($_SESSION['photo-erreurs']) && !empty($_SESSION['photo-erreurs'])) {
    $erreurs = $_SESSION['photo-erreurs'];
}

if (isset($_SESSION['erreurs']) && !empty($_SESSION['erreurs'])) {
    $erreurs = $_SESSION['erreurs'];
}

?>

<?php
// LES SESSIONS UTILISEE LORS DE LA PAGE AJOUT-REPAS DE L'ADMINISTRATEUR 
if (isset($_SESSION['donnees-repas']) && !empty($_SESSION['donnees-repas'])) {
    $erreurs = $_SESSION['donnees-repas'];
}

if (isset($_SESSION['erreurs-repas']) && !empty($_SESSION['erreurs-repas'])) {
    $donnees = $_SESSION['erreurs-repas'];
}

// LES SESSIONS UTILISEE LORS DE LA PAGE AJOUT-CHAMBRE DE L'ADMINISTRATEUR 
if (isset($_SESSION['donnees-chambre']) && !empty($_SESSION['donnees-chambre'])) {
    $erreurs = $_SESSION['donnees-chambre'];
}

if (isset($_SESSION['erreurs-chambre']) && !empty($_SESSION['erreurs-chambre'])) {
    $donnees = $_SESSION['erreurs-chambre'];
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SOUS LES COCOTIERS </title>
    <!-- Favicons -->

    <link href="<?= PATH_PROJECT ?>public/images/al_copyrighter.png" rel="icon" />

    <link href="<?= PATH_PROJECT ?>public/images/al_copyrighter.png" rel="apple-touch-icon" />

    <!-- Custom fonts for this template-->
    <link href="<?= PATH_PROJECT ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= PATH_PROJECT ?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= PATH_PROJECT ?>public/vendor/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= PATH_PROJECT ?>public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= PATH_PROJECT ?>public/css/sb-admin-2.css" rel="stylesheet">

    <style>
        .bg-gradient-primary {
            margin-top: 0px;
            background: var(--light);
            background-clip: border-box;
            border: 1px solid #e3e6f0;
        }

        .sidebar .nav-item .nav-link span {
            font-size: 0.9rem;
        }

        .sidebar .nav-item {
            background: transparent;
            margin-left: 6px;
        }
    </style>
</head>


<?php
session_start();

include './app/commum/fonction.php';

if (isset($_SESSION['connexion-erreurs']) && !empty($_SESSION['connexion-erreurs'])) {
    $erreurs = $_SESSION['connexion-erreurs'];
}

if (isset($_SESSION['donnees-utilisateur']) && !empty($_SESSION['donnees-utilisateur'])) {
    $donnees = $_SESSION['donnees-utilisateur'];
}

if (isset($_COOKIE["donnees-utilisateur"]) && !empty($_COOKIE["donnees-utilisateur"])) {
    $data = json_decode($_COOKIE["donnees-utilisateur"]);
}
?>

<?php
if (!check_if_user_connected()) {
?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Sous les Cocotiers - Register</title>

        <!-- Custom fonts for this template-->
        <link href="<?= PATH_PROJECT ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?= PATH_PROJECT ?>public/css/sb-admin-2.css" rel="stylesheet">
    </head>

    <body>
        <div class="container" style="margin-top: 120px; ">
            <div class="container" style="margin-top: 120px; max-width: 1420px;">
                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block bg-login-image1"></div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <?php
                                            if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
                                            ?>
                                                <div class="alert alert-primary" style="color: white; background-color: #1cc88a; border-color: snow;">
                                                    <?= $_SESSION['success'] ?>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Bienvenue <?= isset($_SESSION['nom-utilisateur-inscrit']) ?  $_SESSION['nom-utilisateur-inscrit'][1] . " " . $_SESSION['nom-utilisateur-inscrit'][0] : '' ?></h1>
                                            </div>

                                            <?php
                                            if (isset($_SESSION['connexion-erreurs']) && !empty($_SESSION['connexion-erreurs'])) {
                                            ?>
                                                <div class="alert alert-primary" style="color: white; background-color: #b91000; border-color: #b91000; text-align:center;">
                                                    <?= $_SESSION['connexion-erreurs'] ?>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                            <form action="<?= PATH_PROJECT ?>administrateur/connexion/traitement" method="post" class="user">
                                                <!-- Le champs email ou mot de passe-->
                                                <div class="form-group">
                                                    <label for="inscription-email">Email ou Nom d'utilisateur:
                                                        <span class="text-danger">(*)</span>
                                                    </label>

                                                    <input type="text" name="email-nom-utilisateur" id="inscription-email" class="form-control" placeholder="Entrer votre adresse email ou nom d'utilisateur" value="<?php if (isset($donnees["email-nom-utilisateur"]) && !empty($donnees["email-nom-utilisateur"])) {
                                                                                                                                                                                                                            echo $donnees["email-nom-utilisateur"];
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            echo '';
                                                                                                                                                                                                                        } ?>">
                                                    <span class="text-danger">
                                                        <?php

                                                        if (isset($erreurs["email-nom-utilisateur"]) && !empty($erreurs["email-nom-utilisateur"])) {
                                                            echo $erreurs["email-nom-utilisateur"];
                                                        }

                                                        ?>
                                                    </span>



                                                    <!-- Le champs mot de passe -->
                                                    <div class="form-group">
                                                        <label for="inscription-mot-passe">Mot de passe:
                                                            <span class="text-danger">(*)</span>
                                                        </label>
                                                        <input type="password" name="mot-passe" id="inscription-mot-passe" class="form-control" placeholder="Entrer votre mot de passe" value="<?php if (isset($donnees["mot-passe"]) && !empty($donnees["mot-passe"])) {
                                                                                                                                                                                                    echo $donnees["mot-passe"];
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    echo '';
                                                                                                                                                                                                } ?>">
                                                        <span class="text-danger">
                                                            <?php

                                                            if (isset($erreurs["mot-passe"]) && !empty($erreurs["mot-passe"])) {
                                                                echo $erreurs["mot-passe"];
                                                            }

                                                            ?>
                                                        </span>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                                            </form>
                                            <hr>
                                            <div class="text-center">
                                                <a class="small" href="<?= PATH_PROJECT ?>/administrateur/mot_de_passe">Mot de passe oublié ?</a>
                                            </div>
                                            <div class="text-center">
                                                <a class="small" href="<?= PATH_PROJECT ?>/administrateur/inscription">Créez un compte !</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <?php
            session_destroy();

            ?>


            <!-- Template Main JS File -->
            <script src="<?= PATH_PROJECT ?>public/js/main.js"></script>

            <!-- Bootstrap core JavaScript-->
            <script src="<?= PATH_PROJECT ?>public/vendor/jquery/jquery.min.js"></script>
            <script src="<?= PATH_PROJECT ?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= PATH_PROJECT ?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= PATH_PROJECT ?>public/js/sb-admin-2.min.js"></script>

    </body>

    </html>


<?php
} else {
    header('location: ' . PATH_PROJECT . 'administrateur/dashboard/index');
}
?>
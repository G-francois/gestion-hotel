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
if (!check_if_user_conneted()) {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Sous les Cocotiers - Login</title>

        <!-- Custom fonts for this template-->
        <link href="<?= PATH_PROJECT ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?= PATH_PROJECT ?>public/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom styles client for this template-->
        <link href="<?= PATH_PROJECT ?>public/css/style.css" rel="stylesheet" />
        <!-- outils CSS Files -->
        <link href="<?= PATH_PROJECT ?>public/outils/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    </head>

    <body>
        <!-- ======= Header ======= -->

        <header id="header" class="fixed-top d-flex align-items-center">


            <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between" style="justify-content: space-between;">
                <h1 class="logo me-auto me-lg-0">
                    <a href="<?= PATH_PROJECT ?>client/site/home" style="font-size: 26px;">Sous les Cocotiers</a>
                </h1>

                <!-- Uncomment below if you prefer to use an image logo -->

                <!-- <a href="home.html" class="logo me-auto me-lg-0"><img src="publics/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a class="nav-link scrollto active" href="<?= PATH_PROJECT ?>client/site/home">Acceuil</a></li>

                        <li>
                            <a class="nav-link scrollto" href="<?= PATH_PROJECT ?>client/site/chambres">Chambres</a>
                        </li>

                        <li>
                            <a class="nav-link scrollto" href="<?= PATH_PROJECT ?>client/site/restaurant">Restaurant</a>
                        </li>

                        <li>
                            <a class="nav-link scrollto" href="<?= PATH_PROJECT ?>client/site/galeries">Galeries</a>
                        </li>

                        <li>
                            <a class="nav-link scrollto" href="<?= PATH_PROJECT ?>client/site/contact">Contact</a>
                        </li>

                        <li>
                            <a href="<?= PATH_PROJECT ?>client/site/chambres" class="nav-link scrollto " style="color: #d9ba85;"><strong>RESERVER MAINTENANT</strong></a>
                        </li>

                        <li>
                            <a href="<?= PATH_PROJECT ?>client/connexion/index" class="nav-link scrollto" style="color: #d9ba85;"><strong>SE CONNECTER</strong></a>
                        </li>
                    </ul>


                    <i class="bi bi-list mobile-nav-toggle" style="margin-left: 80px;"></i>
                </nav>
                <!-- .navbar -->



            </div>
        </header>
        <!-- End Header -->

        <div class="container" style="margin-top: 120px;">
            <div class="row justify-content-center;" style="color:black; justify-content:center;">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <?php
                                        if (isset($_SESSION['message-erreurs']) && !empty($_SESSION['message-erreurs'])) {
                                        ?>
                                            <div class="alert alert-primary" style="color: white; text-align:center; background-color: red; border-color: snow;">
                                                <?= $_SESSION['message-erreurs'] ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Bienvenu(e)</h1>
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

                                        <form action="<?= PATH_PROJECT ?>client/connexion/traitement" method="post" class="user">
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
                                            <a class="small" href="<?= PATH_PROJECT ?>client/mot_de_passe/index">Mot de passe oublié ?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="<?= PATH_PROJECT ?>client/inscription/index">Créez un compte !</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>


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
    header('location: ' . PATH_PROJECT . 'client/dashboard/index');
}
?>
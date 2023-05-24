<?php
session_start();

include './app/commum/fonction.php';

if (isset($_SESSION['inscription-erreurs']) && !empty($_SESSION['inscription-erreurs'])) {
    $erreurs = $_SESSION['inscription-erreurs'];
}

if (isset($_SESSION['donnees-utilisateur']) && !empty($_SESSION['donnees-utilisateur'])) {
    $donnees = $_SESSION['donnees-utilisateur'];
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

        <title>Sous les Cocotiers - Register</title>

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

        <header id="header" class="fixed-top d-flex align-items-cente">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between"  style="justify-content: space-between;">
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


        <div class="container" style="color: black;">

            <div class="card o-hidden border-0 shadow-lg" style="margin-top: 5rem;">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">

                                <?php
                                if (isset($_SESSION['validation']) && !empty($_SESSION['validation'])) {
                                ?>
                                    <div class="alert alert-primary" style="color: white; background-color: #2653d4; text-align:center; border-color: snow;">
                                        <?= $_SESSION['validation'] ?>
                                    </div>
                                <?php
                                }
                                ?>

                                <?php
                                if (isset($_SESSION['inscription-erreurs-global']) && !empty($_SESSION['inscription-erreurs-global'])) {
                                ?>
                                    <div class="alert alert-primary" style="color: white; background-color: red; border-color: snow;">
                                        <?= $_SESSION['inscription-erreurs-global'] ?>
                                    </div>
                                <?php
                                }
                                ?>

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Créez un compte Client!</h1>
                                </div>

                                <form action="<?= PATH_PROJECT ?>client/inscription/traitement" method="post" class="user">
                                    <!-- Le champs nom -->
                                    <div class="form-group">
                                        <label for="inscription-nom">Nom:
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="text" name="nom" id="inscription-nom" class="form-control" placeholder="Veuillez entrer votre nom" value="<?php if (isset($donnees["nom"]) && !empty($donnees["nom"])) {
                                                                                                                                                                    echo $donnees["nom"];
                                                                                                                                                                } else {
                                                                                                                                                                    echo '';
                                                                                                                                                                } ?>">
                                        <span class="text-danger">
                                            <?php
                                            if (isset($erreurs["nom"]) && !empty($erreurs["nom"])) {
                                                echo $erreurs["nom"];
                                            }
                                            ?>
                                        </span>
                                    </div>


                                    <!-- Le champs prénom -->
                                    <div class="form-group">
                                        <label for="inscription-prenom">Prénom(s):
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="text" name="prenom" id="inscription-prenom" class="form-control" placeholder="Veuillez entrer votre prénom" value="<?php if (isset($donnees["prenom"]) && !empty($donnees["prenom"])) {
                                                                                                                                                                            echo $donnees["prenom"];
                                                                                                                                                                        } else {
                                                                                                                                                                            echo '';
                                                                                                                                                                        } ?>">
                                        <span class="text-danger">
                                            <?php
                                            if (isset($erreurs["prenom"]) && !empty($erreurs["prenom"])) {
                                                echo $erreurs["prenom"];
                                            }
                                            ?>
                                        </span>
                                    </div>

                                    <!-- Le champs contact -->
                                    <div class="form-group">
                                        <label for="inscription-telephone">Téléphone:
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="tel" name="telephone" id="inscription-telephone" class="form-control" placeholder="Veuillez entrer votre contact" value="<?php if (isset($donnees["telephone"]) && !empty($donnees["telephone"])) {
                                                                                                                                                                                    echo $donnees["telephone"];
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo '';
                                                                                                                                                                                } ?>">
                                        <span class="text-danger">
                                            <?php
                                            if (isset($erreurs["telephone"]) && !empty($erreurs["telephone"])) {
                                                echo $erreurs["telephone"];
                                            }
                                            ?>
                                        </span>
                                    </div>

                                    <!-- Le champs email -->
                                    <div class="form-group">
                                        <label for="inscription-email">Email:
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="email" name="email" id="inscription-email" class="form-control" placeholder="Veuillez entrer votre address email" value="<?php if (isset($donnees["email"]) && !empty($donnees["email"])) {
                                                                                                                                                                                    echo $donnees["email"];
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo '';
                                                                                                                                                                                } ?>">
                                        <span class="text-danger">
                                            <?php
                                            if (isset($erreurs["email"]) && !empty($erreurs["email"])) {
                                                echo $erreurs["email"];
                                            }
                                            ?>
                                        </span>

                                    </div>

                                    <!-- Le champs nom d'utilisateur -->
                                    <div class="form-group">
                                        <label for="inscription-nom-utilisateur">Nom d'utilisateur:
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="text" name="nom-utilisateur" id="inscription-nom-utilisateur" class="form-control" placeholder="Veuillez entrer votre nom d'utilisateur" value="<?php if (isset($donnees["nom-utilisateur"]) && !empty($donnees["nom-utilisateur"])) {
                                                                                                                                                                                                            echo $donnees["nom-utilisateur"];
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            echo '';
                                                                                                                                                                                                        } ?>">
                                        <span class="text-danger">
                                            <?php
                                            if (isset($erreurs["nom-utilisateur"]) && !empty($erreurs["nom-utilisateur"])) {
                                                echo $erreurs["nom-utilisateur"];
                                            }
                                            ?>
                                        </span>
                                    </div>


                                    <!-- Le champs mot de passe -->
                                    <div class="form-group">
                                        <label for="inscription-mot-passe">Mot de passe:
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="password" name="mot-passe" id="inscription-mot-passe" class="form-control" placeholder="Veuillez entrer votre mot de passe" value="<?php if (isset($donnees["mot-passe"]) && !empty($donnees["mot-passe"])) {
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


                                    <!-- Le champs retapez mot de passe -->
                                    <div class="form-group">
                                        <label for="inscription-retapez-mot-passe">Retaper mot de passe:
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="password" name="retapez-mot-passe" id="inscription-retapez-mot-passe" class="form-control" placeholder="Veuillez retaper votre mot de passe" value="<?php if (isset($donnees["retapez-mot-passe"]) && !empty($donnees["retapez-mot-passe"])) {
                                                                                                                                                                                                                echo $donnees["retapez-mot-passe"];
                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                echo '';
                                                                                                                                                                                                            } ?>">

                                        <span class="text-danger">
                                            <?php
                                            if (isset($erreurs["retapez-mot-passe"]) && !empty($erreurs["retapez-mot-passe"])) {
                                                echo $erreurs["retapez-mot-passe"];
                                            }
                                            ?>
                                        </span>
                                    </div>



                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" name="cocher" id="customCheck">
                                            <label class="custom-control-label" for="customCheck" style="color: blue; font-size: large;">J'accepte les termes et conditions</label>
                                        </div>
                                        <span class="text-danger">
                                            <?php
                                            if (isset($erreurs["cocher"]) && !empty($erreurs["cocher"])) {
                                                echo $erreurs["cocher"];
                                            }
                                            ?>
                                        </span>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= PATH_PROJECT ?>client/mot_de_passe/index"> Mot de passe oublié ? </a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= PATH_PROJECT ?>client/connexion/index">Vous avez déjà un compte ? Connectez-vous!</a>
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
    header('location: ' . PATH_PROJECT . 'client/dashboard/index');
}
?>

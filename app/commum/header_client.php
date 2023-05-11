<?php
session_start();

include './app/commum/fonction.php';

?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Sous les Cocotiers - Index</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->

    <link href="<?= '/'. GESTION_HOTEL ?>/public/images/al_copyrighter.png" rel="icon" />

    <link href="<?= '/'. GESTION_HOTEL ?>/public/images/al_copyrighter.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- outils CSS Files -->

    <link href="<?= '/'. GESTION_HOTEL ?>/public/outils/animate.css/animate.min.css" rel="stylesheet" />

    <link href="<?= '/'. GESTION_HOTEL ?>/public/outils/aos/aos.css" rel="stylesheet" />

    <link href="<?= '/'. GESTION_HOTEL ?>/public/vendor/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">

    <link href="<?= '/'. GESTION_HOTEL ?>/public/outils/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link href="<?= '/'. GESTION_HOTEL ?>/public/outils/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <link href="<?= '/'. GESTION_HOTEL ?>/public/outils/boxicons/css/boxicons.min.css" rel="stylesheet" />

    <link href="<?= '/'. GESTION_HOTEL ?>/public/outils/glightbox/css/glightbox.min.css" rel="stylesheet" />

    <link href="<?= '/'. GESTION_HOTEL ?>/public/outils/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->

    <link href="<?= '/'. GESTION_HOTEL ?>/public/css/style.css" rel="stylesheet" />



</head>

<body>
    <!-- ======= Header ======= -->

    <header id="header" class="fixed-top d-flex align-items-cente">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
            <h1 class="logo me-auto me-lg-0">
                <a href="#">Sous les Cocotiers</a>
            </h1>

            <!-- Uncomment below if you prefer to use an image logo -->

            <!-- <a href="home.html" class="logo me-auto me-lg-0"><img src="publics/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li>
                        <a class="nav-link scrollto active" href="<?= '/'. GESTION_HOTEL ?>/client/site/home">Acceuil</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto" href="<?= '/'. GESTION_HOTEL ?>/client/site/chambres">Chambres</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto" href="<?= '/'. GESTION_HOTEL ?>/client/site/restaurant">Restaurant</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto" href="<?= '/'. GESTION_HOTEL ?>/client/site/galeries">Galeries</a>
                    </li>

                    <li>
                        <a class="nav-link scrollto" href="<?= '/'. GESTION_HOTEL ?>/client/site/contact">Contact</a>
                    </li>

                    <?php
                    if (!check_if_user_conneted()) {
                    ?>
                        <li>
                            <a href="<?= '/'. GESTION_HOTEL ?>/client/site/chambres" class="nav-link scrollto " style="color: #d9ba85;"><strong>RESERVER MAINTENANT</strong></a>
                        </li>

                        <li>
                            <a href="<?= '/'. GESTION_HOTEL ?>/client/connexion/index" class="nav-link scrollto" style="color: #d9ba85;"><strong>SE CONNECTER</strong></a>
                        </li>
                    <?php
                    }
                    ?>

                    <?php
                    if (check_if_user_conneted()) {
                    ?>
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1 ">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw" style="font-size: 21px;"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter" style="font-size: 15px;">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" style="color: black;">
                                <h4 class="dropdown-header" style="background-color: white; border: none; font-size: large; text-align: center; color:black;">
                                    Alerts Center
                                </h4>
                                <a class="dropdown-item d-flex align-items-center" href="#" style="color: black; justify-content:unset; ">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#" style="color: black; justify-content:unset;">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#" style="color: black;justify-content:unset;">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small" style="color: black;" href="#">Show All Alerts</a>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= $_SESSION['utilisateur_connecter'][0]['avatar'] == 'no_image' ? '/'. GESTION_HOTEL .'/public/images/default_profil.jpg' : $_SESSION['utilisateur_connecter'][0]['avatar'] ?>" style="width: 30px; margin-right: 12px;" alt="Profile" class="rounded-circle">
                                <h4 class="ml-2" style="color: WHITE;"><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom_utilisateur'] : 'Pseudo' ?></h4>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in text-center" aria-labelledby="userDropdown">
                                <div class="dropdown">
                                    <p style="color: black;"> <strong><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom_utilisateur'] : 'Pseudo' ?></strong> <br>
                                        <span><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['profil'] : 'Profil' ?></span>
                                </div>
                                <hr>
                                <a class="dropdown-item d-flex align-items-center mb-4" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= '/'. GESTION_HOTEL ?>/client/profil/profile">
                                    <i class="bi bi-person" style="margin-right: 12px;"></i>
                                    <span>Mon Profile</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= '/'. GESTION_HOTEL ?>/client/dashboard/index">
                                    <i class="bi bi-gear" style="margin-right: 12px;"></i>
                                    <span>Tableau de bord</span>
                                </a>
                                <hr>
                                <a class="dropdown-item d-flex align-items-center" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= '/'. GESTION_HOTEL ?>/client/deconnexion/index">
                                    <i class="bi bi-box-arrow-right" style="margin-right: 12px;"></i>
                                    <span>Déconnexion</span>
                                </a>
                            </div>
                        </li>
                        <!-- End Profile Nav -->

                    <?php
                    }
                    ?>

                </ul>

                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->


        </div>
    </header>
    <!-- End Header -->

    </head>

    <body>
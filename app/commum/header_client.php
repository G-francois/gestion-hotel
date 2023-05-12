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

    <link href="<?= PATH_PROJECT ?>public/images/al_copyrighter.png" rel="icon" />

    <link href="<?= PATH_PROJECT ?>public/images/al_copyrighter.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- outils CSS Files -->

    <link href="<?= PATH_PROJECT ?>public/outils/animate.css/animate.min.css" rel="stylesheet" />

    <link href="<?= PATH_PROJECT ?>public/outils/aos/aos.css" rel="stylesheet" />

    <link href="<?= PATH_PROJECT ?>public/vendor/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">

    <link href="<?= PATH_PROJECT ?>public/outils/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link href="<?= PATH_PROJECT ?>public/outils/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <link href="<?= PATH_PROJECT ?>public/outils/boxicons/css/boxicons.min.css" rel="stylesheet" />

    <link href="<?= PATH_PROJECT ?>public/outils/glightbox/css/glightbox.min.css" rel="stylesheet" />

    <link href="<?= PATH_PROJECT ?>public/outils/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->

    <link href="<?= PATH_PROJECT ?>public/css/style.css" rel="stylesheet" />

    <style>
        #hero {
            width: 100%;
            height: 100vh;
            background: url("<?= PATH_PROJECT ?>public/images/hero-bg.jpg") top center;
            background-size: cover;
            position: relative;
            padding: 0;
        }

        #hero2 {
            width: 100%;
            height: 100vh;
            background: url("<?= PATH_PROJECT ?>public/images/water-165219_1280.jpg") top center;
            background-size: cover;
            position: relative;
            padding: 0;
        }

        #hero3 {
            width: 100%;
            height: 100vh;
            background: url("<?= PATH_PROJECT ?>public/images/BG-5.jpeg") top center;
            background-size: cover;
            position: relative;
            padding: 0;
        }
    </style>



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
                        <a class="nav-link scrollto active" href="<?= PATH_PROJECT ?>client/site/home">Acceuil</a>
                    </li>

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

                    <?php
                    if (!check_if_user_conneted()) {
                    ?>
                        <li>
                            <a href="<?= PATH_PROJECT ?>client/site/chambres" class="nav-link scrollto " style="color: #d9ba85;"><strong>RESERVER MAINTENANT</strong></a>
                        </li>

                        <li>
                            <a href="<?= PATH_PROJECT ?>client/connexion/index" class="nav-link scrollto" style="color: #d9ba85;"><strong>SE CONNECTER</strong></a>
                        </li>
                    <?php
                    }
                    ?>

                    <?php
                    if (check_if_user_conneted()) {
                    ?>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <img src="<?= $_SESSION['utilisateur_connecter'][0]['avatar'] == 'no_image' ? PATH_PROJECT . 'public/images/default_profil.jpg' : $_SESSION['utilisateur_connecter'][0]['avatar'] ?>" style="margin-right: 12px; width: 2rem; height: 2rem;" alt="Profile" class="rounded-circle">

                                <h5 class="ml-2"><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom_utilisateur'] : 'Pseudo' ?></h5>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-center shadow animated--grow-in text-center" style="min-width: 12rem;" aria-labelledby="userDropdown">
                                <div class="dropdown">
                                    <p style="color: black;"> <strong><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom_utilisateur'] : 'Pseudo' ?></strong> <br>
                                        <span><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['profil'] : 'Profil' ?></span>
                                </div>
                                <hr>
                                <a class="dropdown-item d-flex align-items-center mb-3" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= PATH_PROJECT ?>client/profil/profile">
                                    <i class="bi bi-person" style="margin-right: 12px;"></i>
                                    <span>Mon Profile</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center mb-3" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= PATH_PROJECT ?>client/dashboard/index">
                                    <i class="bi bi-gear" style="margin-right: 12px;"></i>
                                    <span>Tableau de bord</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= PATH_PROJECT ?>client/profil/notification">
                                    <i class="bi bi-bell" style="margin-right: 12px;"></i>
                                    <span>Notification(s)</span>
                                </a>
                                <hr>
                                <a class="dropdown-item d-flex align-items-center" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= PATH_PROJECT ?>client/deconnexion/index">
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
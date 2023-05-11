<?php
session_start();

include './app/commum/fonction.php';

?>

<?php
if (check_if_user_conneted()) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SLC Client - Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="<?= '/' . GESTION_HOTEL ?>/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="<?= '/' . GESTION_HOTEL ?>/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?= '/' . GESTION_HOTEL ?>/public/vendor/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="<?= '/' . GESTION_HOTEL ?>/public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?= '/' . GESTION_HOTEL ?>/public/css/sb-admin-2.min.css" rel="stylesheet">


        <!-- Custom fonts for this template-->
        <link href="<?= '/' . GESTION_HOTEL ?>/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles client for this template-->
        <link href="<?= '/' . GESTION_HOTEL ?>/public/css/style.css" rel="stylesheet" />
        <!-- outils CSS Files -->
        <link href="<?= '/' . GESTION_HOTEL ?>/public/outils/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

        <style>
            label {
                color: white;
            }
        </style>

    </head>

    <body id="page-top">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-black topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        <header id="header" class="fixed-top d-flex align-items-cente">
                            <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
                                <h1 class="logo me-auto me-lg-0">
                                    <a href="<?= '/' . GESTION_HOTEL ?>/client/site/home" style="font-size: 26px;">Sous les Cocotiers</a>
                                </h1>

                                <!-- Uncomment below if you prefer to use an image logo -->

                                <!-- <a href="home.html" class="logo me-auto me-lg-0"><img src="publics/img/logo.png" alt="" class="img-fluid"></a>-->

                                <nav id="navbar" class="navbar order-last order-lg-0">
                                    <ul>
                                        <li><a class="nav-link scrollto active" href="<?= '/' . GESTION_HOTEL ?>/client/site/home" style="color: rgb(217 186 133);">Acceuil</a></li>

                                        <li>
                                            <a class="nav-link scrollto" href="<?= '/' . GESTION_HOTEL ?>/client/site/chambres" style="color: white;">Chambres</a>
                                        </li>

                                        <li>
                                            <a class="nav-link scrollto" href="<?= '/' . GESTION_HOTEL ?>/client/site/restaurant" style="color: white;">Restaurant</a>
                                        </li>

                                        <li>
                                            <a class="nav-link scrollto" href="<?= '/' . GESTION_HOTEL ?>/client/site/galeries" style="color: white;">Galeries</a>
                                        </li>

                                        <li>
                                            <a class="nav-link scrollto" href="<?= '/' . GESTION_HOTEL ?>/client/site/contact" style="color: white;">Contact</a>
                                        </li>



                                        <!-- Nav Item - Alerts -->
                                        <li class="nav-item dropdown no-arrow mx-1">
                                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                                                <i class="fas fa-bell fa-fw" style="font-size: 21px;"></i>
                                                <!-- Counter - Alerts -->
                                                <span class="badge badge-danger badge-counter" style="font-size: 14px;">3+</span>
                                            </a>
                                            <!-- Dropdown - Alerts -->
                                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                                <h6 class="dropdown-header">
                                                    Alerts Center
                                                </h6>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
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
                                                <a class="dropdown-item d-flex align-items-center" href="#">
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
                                                <a class="dropdown-item d-flex align-items-center" href="#">
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
                                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                            </div>
                                        </li>


                                        <div class="topbar-divider d-none d-sm-block"></div>
                                        <!-- Nav Item - User Information -->
                                        <li class="nav-item">
                                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <h3 class="mr-2" style="color: white;"><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom_utilisateur'] : 'Pseudo' ?></h3>
                                            </a>
                                            <!-- Dropdown - User Information -->
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                                <div class="dropdown-item">
                                                    <img class="img-profile rounded-circle" src="<?= $_SESSION['utilisateur_connecter'][0]['avatar'] == 'no_image' ? '/' . GESTION_HOTEL . '/public/images/default_profil.jpg' : $_SESSION['utilisateur_connecter'][0]['avatar'] ?>" style="width: 8rem; height: 8rem;"> <br>
                                                    <h4 class="mr-2" style="color: black;"><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom_utilisateur'] : 'Pseudo' ?></h4>
                                                </div>
                                                <a class="dropdown-item" href="<?= '/' . GESTION_HOTEL ?>/administrateur/dashboard/profile" style="color: black;">
                                                    Gérer mon compte
                                                </a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" style="color: black;">
                                                    Déconnexion
                                                </a>
                                            </div>
                                        </li>
                                    </ul>


                                    <i class="bi bi-list mobile-nav-toggle"></i>
                                </nav>
                                <!-- .navbar -->



                            </div>
                        </header>
                        <!-- End Header -->

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid" style="padding-top: 26px;">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between h3 mb-2">
                        <h4 class="h3 mb-0"><a href="#" style="color: white;">Ajouter une réservation</a></h4>
                        <h4 class="m-0 font-weight-bold "><a href="<?= '/' . GESTION_HOTEL ?>/client/dashboard/index">Liste des réservations</a></h4>
                    </div>

                    <form class="form-horizontal" action="?requette=ajout-auteur-traitement" method="POST">
                        <div class="card-body">

                            <!-- Le champs nom & prénom -->
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="nom-auteur" class="col-sm-4 col-form-label">Nom du client</label>
                                    <input type="text" name="nom" id="inscription-nom" class="form-control" placeholder="Veuillez entrer le nom du client" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="nom-auteur" class="col-sm-5 col-form-label">Nom de l'accompagnateur</label>
                                    <input type="text" name="prenom" id="inscription-prenom" class="form-control" placeholder="Veuillez entrer le(s) nom(s) de l'accompagnateur par rapport au type de chambre" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
                                </div>
                            </div>

                            <!-- Le champs date -->
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="nom-auteur" class="col-sm-4 col-form-label">Date de début</label>
                                    <input type="date" name="date-naissance" id="inscription-date-naissance" class="form-control" placeholder="Veuillez entrer votre date de naissance" value="<?= (isset($donnees["date-naissance"]) && !empty($donnees["date-naissance"])) ? $donnees["date-naissance"] : ""; ?>" required>
                                </div>

                                <div class="col-sm-6">
                                    <label for="nom-auteur" class="col-sm-4 col-form-label">Date de fin</label>
                                    <input type="date" name="date-naissance" id="inscription-date-naissance" class="form-control" placeholder="Veuillez entrer votre date de naissance" value="<?= (isset($donnees["date-naissance"]) && !empty($donnees["date-naissance"])) ? $donnees["date-naissance"] : ""; ?>" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="nom-auteur" class="col-sm-4 col-form-label">Type de chambre</label>
                                    <div class="input-group">
                                        <select class="form-control" name="type" id="type">
                                            <option value="" disabled selected>Sélectionnez le type de chambre</option>
                                            <option value="admin">Solo</option>
                                            <option value="user">Doubles</option>
                                            <option value="admin">Triples</option>
                                            <option value="user">Suites</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="nom-auteur" class="col-sm-4 col-form-label">Numéros de chambre</label>
                                    <div class="input-group">
                                        <select class="form-control" name="type" id="type">
                                            <option value="" disabled selected>Veuillez choisir le numéro de chambre</option>
                                            <option value="">A-101</option>
                                            <option value="">A-102</option>
                                            <option value="">A-103</option>
                                            <option value="">A-104</option>
                                            <option value="">B-101</option>
                                            <option value="">B-102</option>
                                            <option value="">B-103</option>
                                            <option value="">B-104</option>
                                            <option value="">C-101</option>
                                            <option value="">C-102</option>
                                            <option value="">C-103</option>
                                            <option value="">C-104</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <h5 style="font-weight: bold">Total Days : <span id="staying_day">0</span> Days</h5>
                                <h5 style="font-weight: bold">Price: /-</h4>
                                    <h5 style="font-weight: bold">Total Amount : <span id="total_price">0</span> /-</h5>
                            </div>

                        </div>

                        <div class="card-footer float-right" style=" padding: 0.75rem 1.25rem; background-color: #0c0b09; border-top:none;">
                            <button type="reset" class="btn btn-danger">Annuler</button>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>

                    </form>
                </div>


                <?php

                include './app/commum/footer.php'

                ?>

            <?php
        } else {
            header('location:/' . GESTION_HOTEL . '/client/connexion/index');
        }
            ?>
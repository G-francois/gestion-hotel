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

        <!-- outils CSS Files -->
        <link href="<?= PATH_PROJECT ?>public/outils/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

        <!-- Custom fonts for this template-->
        <link href="<?= PATH_PROJECT ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="<?= PATH_PROJECT ?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?= PATH_PROJECT ?>public/vendor/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="<?= PATH_PROJECT ?>public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?= PATH_PROJECT ?>public/css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles client for this template-->
        <link href="<?= PATH_PROJECT ?>public/css/style.css" rel="stylesheet" />
        <!-- outils CSS Files -->
        <link href="<?= PATH_PROJECT ?>public/outils/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

        <style>
            label {
                color: black;
            }
        </style>

    </head>

    <body>
        <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
                <h1 class="logo me-auto me-lg-0">
                    <a href="<?= PATH_PROJECT ?>/client/site/home" style="font-size: 26px;">Sous les Cocotiers</a>
                </h1>

                <!-- Uncomment below if you prefer to use an image logo -->

                <!-- <a href="home.html" class="logo me-auto me-lg-0"><img src="publics/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav id="navbar" class="navbar order-last order-lg-0">
                    <ul>
                        <li><a class="nav-link scrollto active" href="<?= PATH_PROJECT ?>/client/site/home" style="color: rgb(217 186 133);">Acceuil</a></li>

                        <li>
                            <a class="nav-link scrollto" href="<?= PATH_PROJECT ?>/client/site/chambres">Chambres</a>
                        </li>

                        <li>
                            <a class="nav-link scrollto" href="<?= PATH_PROJECT ?>/client/site/restaurant">Restaurant</a>
                        </li>

                        <li>
                            <a class="nav-link scrollto" href="<?= PATH_PROJECT ?>/client/site/galeries">Galeries</a>
                        </li>

                        <li>
                            <a class="nav-link scrollto" href="<?= PATH_PROJECT ?>/client/site/contact">Contact</a>
                        </li>



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


                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= $_SESSION['utilisateur_connecter'][0]['avatar'] == 'no_image' ? PATH_PROJECT . 'public/images/default_profil.jpg' : $_SESSION['utilisateur_connecter'][0]['avatar'] ?>" style="width: 30px; margin-right: 12px;" alt="Profile" class="rounded-circle">
                                <h5 class="ml-2" style="color: white;"><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom_utilisateur'] : 'Pseudo' ?></h5>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in text-center" aria-labelledby="userDropdown">
                                <div class="dropdown">
                                    <p style="color: black;"> <strong><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom_utilisateur'] : 'Pseudo' ?></strong> <br>
                                        <span><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['profil'] : 'Profil' ?></span>
                                </div>
                                <hr style="margin-bottom: 12px; margin-top: -10px; border-top: 0px solid;">
                                <a class="dropdown-item d-flex align-items-center mb-4" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= PATH_PROJECT ?>/client/profil/profile">
                                    <i class="bi bi-person" style="margin-right: 12px;"></i>
                                    <span>Mon Profile</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= PATH_PROJECT ?>/client/dashboard/index">
                                    <i class="bi bi-gear" style="margin-right: 12px;"></i>
                                    <span>Tableau de bord</span>
                                </a>
                                <hr style="margin-bottom: 12px;">
                                <a class="dropdown-item d-flex align-items-center" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= PATH_PROJECT ?>/client/deconnexion/index">
                                    <i class="bi bi-box-arrow-right" style="margin-right: 12px;"></i>
                                    <span>Déconnexion</span>
                                </a>
                            </div>
                        </li>
                        <!-- End Profile Nav -->


                    </ul>


                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
                <!-- .navbar -->



            </div>
        </header>
        <!-- End Header -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Begin Page Content -->
            <div class="container-fluid" style="padding-top: 126px;">

                <!-- Page Heading -->
                <h1 class="h3 mb-4">Réservations</h1>

                <p class="mb-4" style="text-align: center;">
                    <a href="<?= PATH_PROJECT ?>/client/dashboard/ajout-reservation-client" style="justify-content: center; background-color: #cda45e; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Effectuer une réservation</a>
                </p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold "><a href="#">Liste des réservations</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Date de réservation</th>
                                        <th>Client</th>
                                        <th>Début occupation</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01/12/22</td>
                                        <td>Tiger Nixon</td>
                                        <td>10/12/22</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                Détails
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <p><strong>Fin occupation : </strong>07/02/23</p>
                                                            <p><strong>Accompagnateur : </strong>Durand, Victor</p>
                                                            <p><strong>Type de chambre : </strong>Solo</p>
                                                            <p><strong>Nombre de nuit : </strong>01</p>
                                                            <p><strong>Montant dû : </strong>3500 €</p>
                                                        </div>
                                                        <div class="modal-footer float-right">
                                                            <button type="reset" class="btn btn-danger">Supprimer</button>
                                                            <button type="submit" class="btn btn-success">Modifier</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>02/12/22</td>
                                        <td>Aristide BOGNON</td>
                                        <td>10/12/22</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                                                Détails
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <p><strong>Fin occupation : </strong>07/02/23</p>
                                                            <p><strong>Accompagnateur : </strong>B.Durand, G.Victor</p>
                                                            <p><strong>Type de chambre : </strong>Solo, Doubles</p>
                                                            <p><strong>Nombre de nuit : </strong>01</p>
                                                            <p><strong>Montant dû : </strong>3500 €</p>
                                                        </div>
                                                        <div class="modal-footer float-right">
                                                            <button type="reset" class="btn btn-danger">Supprimer</button>
                                                            <button type="submit" class="btn btn-success">Modifier</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tr>

                                    <tr>
                                        <td>01/12/22</td>
                                        <td>SODJATINMIN BIGNON</td>
                                        <td>10/12/22</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter3">
                                                Détails
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <p><strong>Fin occupation : </strong>07/02/23</p>
                                                            <p><strong>Accompagnateur : </strong>B.Durand, G.Victor</p>
                                                            <p><strong>Numéros de chambre : </strong>A-101, B-101</p>
                                                            <p><strong>Type de chambre : </strong>Solo, Doubles</p>
                                                            <p><strong>Nombre de nuit : </strong>01</p>
                                                            <p><strong>Montant dû : </strong>3500 €</p>
                                                        </div>
                                                        <div class="modal-footer float-right">
                                                            <button type="reset" class="btn btn-danger">Supprimer</button>
                                                            <button type="submit" class="btn btn-success">Modifier</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tr>

                                    <tr>
                                        <td>01/12/22</td>
                                        <td>JACK SPAKER</td>
                                        <td>06/02/23</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter4">
                                                Détails
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <p><strong>Fin occupation : </strong>07/02/23</p>
                                                            <p><strong>Accompagnateur : </strong>B.Durand, G.Victor, KOKOYE TALA</p>
                                                            <p><strong>Numéros de chambre : </strong>D-101</p>
                                                            <p><strong>Type de chambre : </strong>Suites</p>
                                                            <p><strong>Nombre de nuit : </strong>01</p>
                                                            <p><strong>Montant dû : </strong>100 €</p>
                                                        </div>
                                                        <div class="modal-footer float-right">
                                                            <button type="reset" class="btn btn-danger">Supprimer</button>
                                                            <button type="submit" class="btn btn-success">Modifier</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Template Main JS File -->
        <script src="<?= PATH_PROJECT ?>public/js/main.js"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= PATH_PROJECT ?>public/vendor/jquery/jquery.min.js"></script>
        <script src="<?= PATH_PROJECT ?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= PATH_PROJECT ?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= PATH_PROJECT ?>public/js/sb-admin-2.min.js"></script>


        <!-- Page level plugins -->
        <script src="<?= PATH_PROJECT ?>public/vendor/chart.js/Chart.min.js"></script>
        <script src="<?= PATH_PROJECT ?>public/vendor/datatables/jquery.dataTables.js"></script>
        <script src="<?= PATH_PROJECT ?>public/vendor/datatables/dataTables.bootstrap4.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= PATH_PROJECT ?>public/js/demo/chart-area-demo.js"></script>
        <script src="<?= PATH_PROJECT ?>public/js/demo/chart-pie-demo.js"></script>
        <script src="<?= PATH_PROJECT ?>public/js/demo/datatables-demo.js"></script>

    </body>

    </html>

<?php
} else {
    header('location: /' . PATH_PROJECT . '/client/connexion/index');
}
?>
<?php
if (!check_if_user_connected()) {
    header('location: ' . PATH_PROJECT . 'client/conexion/index');
    exit;
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

    <title>SLC Client - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= PATH_PROJECT ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= PATH_PROJECT ?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= PATH_PROJECT ?>public/vendor/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= PATH_PROJECT ?>public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= PATH_PROJECT ?>public/css/sb-admin-2.min.css" rel="stylesheet">


    <!-- Custom fonts for this template-->
    <link href="<?= PATH_PROJECT ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles client for this template-->
    <link href="<?= PATH_PROJECT ?>public/css/style.css" rel="stylesheet" />
    <!-- outils CSS Files -->
    <link href="<?= PATH_PROJECT ?>public/outils/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <style>
        label {
            color: white;
        }
    </style>

</head>

<body id="page-top">
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between" style="max-width: 1440px;">
            <h1 class="logo me-auto me-lg-0">
                <a href="<?= PATH_PROJECT ?>client/site/home" style="font-size: 26px;">Sous les Cocotiers</a>
            </h1>

            <!-- Uncomment below if you prefer to use an image logo -->

            <!-- <a href="home.html" class="logo me-auto me-lg-0"><img src="publics/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="<?= PATH_PROJECT ?>client/site/home">Acceuil</a></li>

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


                </ul>


                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->



        </div>
    </header>
    <!-- End Header -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-black topbar mb-4 static-top shadow">

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                </ul>

            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid" style="padding-top: 26px;">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between h3 mb-2">
                    <h4 class="h3 mb-0"><a href="#" style="color: white;">Faire une réservation</a></h4>
                    <h4 class="m-0 font-weight-bold "><a href="<?= PATH_PROJECT ?>client/dashboard/index">Liste des réservations</a></h4>
                </div>

                <form class="form-horizontal" action="<?= PATH_PROJECT ?>client/dashboard/ajout-reserv-traitement" method="POST">
                    <div class="card-body">

                        <!-- Le champs nom du client & DATE DE DEBUT -->
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="inscription-nom" class="col-sm-4 col-form-label">Nom du client</label>
                                <input type="text" name="nom" id="inscription-nom" class="form-control" placeholder="Veuillez entrer le nom du client" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="date_debut" class="col-sm-4 col-form-label">Date de début</label>
                                <input type="date" id="date_debut" name="date_debut" class="form-control" value="<?= (isset($donnees["date-naissance"]) && !empty($donnees["date-naissance"])) ? $donnees["date-naissance"] : ""; ?>" required>
                            </div>
                        </div>

                        <!-- Le champs date -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="date_fin" class="col-sm-4 col-form-label">Date de fin</label>
                                <input type="date" id="date_fin" name="date_fin" class="form-control" value="<?= (isset($donnees["date-naissance"]) && !empty($donnees["date-naissance"])) ? $donnees["date-naissance"] : ""; ?>" required>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="typeChambre" class="col-sm-4 col-form-label">Type de chambre : </label>
                                <div class="input-group">
                                    <select class="form-control" id="typeChambre" name="typeChambre" onchange="afficherChampsAccompagnateur()">
                                        <option value="" disabled selected>Sélectionnez le type de chambre</option>
                                        <option value="solo">Solo</option>
                                        <option value="double">Doubles</option>
                                        <option value="triple">Triples</option>
                                        <option value="suite">Suites</option>
                                    </select>
                                </div>
                            </div>

                        </div>


                        <div class="form-group row" id="champsAccompagnateur">
                            <!-- Les champs d'accompagnateur et numéro de chambre seront affichés ici -->

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

                <script>
                    function afficherChampsAccompagnateur() {
                        var typeChambre = document.getElementById("typeChambre").value;
                        var champsAccompagnateur = document.getElementById("champsAccompagnateur");

                        // Réinitialiser les champs d'accompagnateur
                        champsAccompagnateur.innerHTML = "";
                        if (typeChambre === "solo") {
                            champsAccompagnateur.innerHTML = `
                                    <div class = "col-sm-6" >
                                        <label class = "col-form-label"> Numéro de chambre: </label> 
                                        <select name = "numChambre" class = "form-control" >
                                        <option value="" disabled selected>Veuillez choisir le numéro de chambre</option>
                                            <option value = "1" > Chambre 1 </option> 
                                            <option value = "2" > Chambre 2 </option> 
                                            <option value = "3" > Chambre 3 </option> 
                                        </select> 
                                    </div> `;
                            // Pas besoin d'afficher le champ accompagnateur pour la chambre solo
                        } else if (typeChambre === "double") {
                            champsAccompagnateur.innerHTML = `
                                    <div class = "col-sm-6" >
                                        <label class = "col-form-label"> Numéro de chambre: </label> 
                                        <select name = "numChambre"class = "form-control" >
                                            <option value = ""disabled selected> Veuillez choisir le numéro de chambre </option> 
                                            <option value = "4" > Chambre 4 </option>  
                                            <option value = "5" > Chambre 5 </option>  
                                            <option value = "6" > Chambre 6 </option>  
                                        </select>  
                                    </div>  
                                    <div class = "col-sm-6" >
                                        <label class = "col-form-label"> Champ d 'accompagnateur :</label>  
                                        <input type = "text"name = "accompagnateur"class = "form-control" placeholder="Veuillez entrer le nom de l'accompagnateur">
                                    </div>`;
                        } else if (typeChambre === "triple") {
                            champsAccompagnateur.innerHTML = `
                                    <div class = "col-sm-6" >
                                        <label class = "col-form-label"> Numéro de chambre: </label> 
                                        <select name = "numChambre"class = "form-control" >
                                            <option value = ""disabled selected> Veuillez choisir le numéro de chambre </option> 
                                            <option value = "7" > Chambre 7 </option>  
                                            <option value = "8" > Chambre 8 </option>  
                                            <option value = "9" > Chambre 9 </option>  
                                        </select>  
                                    </div>
                                    <div class = "col-sm-6" >
                                        <label class = "col-form-label"> Champ d 'accompagnateur :</label>  
                                        <input type = "text"name = "accompagnateur"class = "form-control" placeholder="Veuillez entrer le nom de l'accompagnateur 1">
                                    </div>
                                    <div class = "col-sm-6 mt-3 mt-sm-3" >
                                        <label class = "col-form-label"> Champ d 'accompagnateur :</label>  
                                        <input type = "text"name = "accompagnateur"class = "form-control" placeholder="Veuillez entrer le nom de l'accompagnateur 2" >
                                    </div>`;
                        } else if (typeChambre === "suite") {
                            champsAccompagnateur.innerHTML = `
                                    <div class = "col-sm-6" >
                                        <label class = "col-form-label"> Numéro de chambre: </label> 
                                        <select name = "numChambre"class = "form-control" >
                                            <option value = ""disabled selected> Veuillez choisir le numéro de chambre </option> 
                                            <option value = "10" > Chambre 10 </option>  
                                            <option value = "11" > Chambre 11 </option>  
                                            <option value = "12" > Chambre 12 </option>  
                                        </select>  
                                    </div>
                                    <div class = "col-sm-6" >
                                        <label class = "col-form-label"> Champ d 'accompagnateur :</label>  
                                        <input type = "text"name = "accompagnateur"class = "form-control" placeholder="Veuillez entrer le nom de l'accompagnateur 1">
                                    </div>
                                    <div class = "col-sm-6 mt-3 mt-sm-3" >
                                        <label class = "col-form-label"> Champ d 'accompagnateur :</label>  
                                        <input type = "text"name = "accompagnateur"class = "form-control" placeholder="Veuillez entrer le nom de l'accompagnateur 2">
                                    </div>
                                    <div class = "col-sm-6 mt-3 mt-sm-3" >
                                        <label class = "col-form-label"> Champ d 'accompagnateur :</label>  
                                        <input type = "text"name = "accompagnateur"class = "form-control" placeholder="Veuillez entrer le nom de l'accompagnateur 3">
                                    </div>
                                    <div class = "col-sm-6 mt-3 mt-sm-3" >
                                        <label class = "col-form-label"> Champ d 'accompagnateur :</label>  
                                        <input type = "text"name = "accompagnateur"class = "form-control" placeholder="Veuillez entrer le nom de l'accompagnateur 4">
                                    </div>`;
                        }
                    }
                </script>
            </div>
        </div><!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer" style="background-color: #0c0b09;">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; SOUS LES COCOTIERS 2023</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->


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
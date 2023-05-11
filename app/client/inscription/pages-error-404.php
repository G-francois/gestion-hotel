<?php
session_start();

include './app/commum/fonction.php';

?>

<?php
if (!check_if_user_conneted()) {
?>

  <!DOCTYPE html>

  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Sous les Cocotiers - Index</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- outils CSS Files -->
    <link href="<?= '/' . PATH_PROJECT ?>public/outils/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <!-- Custom fonts for this template-->
    <link href="<?= '/' . PATH_PROJECT ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= '/' . PATH_PROJECT ?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this page -->
    <link href="<?= '/' . PATH_PROJECT ?>public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= '/' . PATH_PROJECT ?>public/css/sb-admin-2.min.css" rel="stylesheet">


    <!-- Favicons -->

    <link href="<?= '/' . PATH_PROJECT ?>public/images/al_copyrighter.png" rel="icon" />

    <link href="<?= '/' . PATH_PROJECT ?>public/images/al_copyrighter.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- outils CSS Files -->

    <link href="<?= '/' . PATH_PROJECT ?>public/outils/animate.css/animate.min.css" rel="stylesheet" />

    <link href="<?= '/' . PATH_PROJECT ?>public/outils/aos/aos.css" rel="stylesheet" />

    <link href="<?= '/' . PATH_PROJECT ?>public/vendor/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">

    <link href="<?= '/' . PATH_PROJECT ?>public/outils/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link href="<?= '/' . PATH_PROJECT ?>public/outils/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <link href="<?= '/' . PATH_PROJECT ?>public/outils/boxicons/css/boxicons.min.css" rel="stylesheet" />

    <link href="<?= '/' . PATH_PROJECT ?>public/outils/glightbox/css/glightbox.min.css" rel="stylesheet" />

    <link href="<?= '/' . PATH_PROJECT ?>public/outils/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->

    <link href="<?= '/' . PATH_PROJECT ?>public/css/style.css" rel="stylesheet" />



  </head>

  <body>
    <!-- ======= Header ======= -->

    <header id="header" class="fixed-top d-flex align-items-cente">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
        <h1 class="logo me-auto me-lg-0">
          <a href="<?= '/' . PATH_PROJECT ?>/client/site/home">Sous les Cocotiers</a>
        </h1>

        <!-- Uncomment below if you prefer to use an image logo -->

        <!-- <a href="home.html" class="logo me-auto me-lg-0"><img src="publics/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li>
              <a class="nav-link scrollto active" href="<?= '/' . PATH_PROJECT ?>/client/site/home">Acceuil</a>
            </li>

            <li>
              <a class="nav-link scrollto" href="<?= '/' . PATH_PROJECT ?>/client/site/chambres">Chambres</a>
            </li>

            <li>
              <a class="nav-link scrollto" href="<?= '/' . PATH_PROJECT ?>/client/site/restaurant">Restaurant</a>
            </li>

            <li>
              <a class="nav-link scrollto" href="<?= '/' . PATH_PROJECT ?>/client/site/galeries">Galeries</a>
            </li>

            <li>
              <a class="nav-link scrollto" href="<?= '/' . PATH_PROJECT ?>/client/site/contact">Contact</a>
            </li>

            <li>
              <a href="<?= '/' . PATH_PROJECT ?>/client/site/chambres" class="nav-link scrollto " style="color: #d9ba85;"><strong>RESERVER MAINTENANT</strong></a>
            </li>


          </ul>

          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->


      </div>
    </header>
    <!-- End Header -->

    </head>

    <body>
      <main>
        <div class="container mt-5">

          <section class="section error-404 d-flex flex-column align-items-center justify-content-center">
            <h1>Oups</h1>
            <h2>Veuiller vérifier votre connexion ou reprenez l'inscription.</h2>
            <a class="btn" href="<?= '/' . PATH_PROJECT ?>/client/inscription/index" style="color:#d9ba85;">Retourner à l'inscription</a>
            <img src="<?= '/' . PATH_PROJECT ?>public/images/not-found.svg" class="img-fluid py-5" style="width: 360px;" alt="Page Not Found">
          </section>

        </div>
      </main><!-- End #main -->

      <!-- ======= Footer ======= -->

      <footer id="footer">


        <div class="container">
          <div class="copyright">
            &copy; Copyright <strong><span>Sous Les Cocotiers</span></strong>. Tout Droit Reserver
          </div>

          <div class="credits">
            <!-- All the links in the footer should remain intact. -->

            <!-- You can delete the links only if you purchased the pro version. -->

            <!-- Licensing information: https://bootstrapmade.com/license/ -->

            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->

            Designed by <a href="#">Franco Services</a>
          </div>
        </div>
      </footer>
      <!-- End Footer -->

    </body>

  </html>
<?php
} else {
  header('location: /' . PATH_PROJECT . '/client/dashboard/index');
}
?>
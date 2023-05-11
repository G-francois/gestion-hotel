<!-- ======= Footer ======= -->

<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="footer-info">
                        <h3>Sous les Cocotiers</h3>

                        <p>
                            A108 Adam Street <br />

                            NY 535022, USA<br /><br />

                            <strong>Phone:</strong> +1 5589 55488 55<br />

                            <strong>Email:</strong> <a href="#">info@example.com</a>
                            <br />
                        </p>

                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>

                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>

                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>

                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>

                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 footer-links">
                    <h4>Liens utiles</h4>

                    <ul>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="<?= '/'. GESTION_HOTEL ?>/client/site/home">Home</a>
                        </li>

                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="<?= '/'. GESTION_HOTEL ?>/client/site/chambres">Chambres</a>
                        </li>

                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="<?= '/'. GESTION_HOTEL ?>/client/site/restaurant">Restaurant</a>
                        </li>

                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="<?= '/'. GESTION_HOTEL ?>/client/site/galeries">Galeries</a>
                        </li>

                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="<?= '/'. GESTION_HOTEL ?>/client/site/contact">Contact</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

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


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Bootstrap core JavaScript-->
<script src="<?= '/'. GESTION_HOTEL ?>/public/vendor/jquery/jquery.min.js"></script>
<script src="<?= '/'. GESTION_HOTEL ?>/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= '/'. GESTION_HOTEL ?>/public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= '/'. GESTION_HOTEL ?>/public/js/sb-admin-2.min.js"></script>


<!-- Page level plugins -->
<script src="<?= '/'. GESTION_HOTEL ?>/public/vendor/chart.js/Chart.min.js"></script>
<script src="<?= '/'. GESTION_HOTEL ?>/public/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?= '/'. GESTION_HOTEL ?>/public/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Page level custom scripts -->
<script src="<?= '/'. GESTION_HOTEL ?>/public/js/demo/chart-area-demo.js"></script>
<script src="<?= '/'. GESTION_HOTEL ?>/public/js/demo/chart-pie-demo.js"></script>
<script src="<?= '/'. GESTION_HOTEL ?>/public/js/demo/datatables-demo.js"></script>



<!-- outils JS Files -->

<script src="<?= '/'. GESTION_HOTEL ?>/public/outils/aos/aos.js"></script>

<script src="<?= '/'. GESTION_HOTEL ?>/public/outils/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= '/'. GESTION_HOTEL ?>/public/outils/glightbox/js/glightbox.min.js"></script>

<script src="<?= '/'. GESTION_HOTEL ?>/public/outils/isotope-layout/isotope.pkgd.min.js"></script>

<script src="<?= '/'. GESTION_HOTEL ?>/public/outils/swiper/swiper-bundle.min.js"></script>

<script src="<?= '/'. GESTION_HOTEL ?>/public/outils/php-email-form/validate.js"></script>

<!-- Template Main JS File -->

<script src="<?= '/'. GESTION_HOTEL ?>/public/js/main.js"></script>

<script src="<?= '/'. GESTION_HOTEL ?>/public/js/jquery.js"></script>

<script src="<?= '/'. GESTION_HOTEL ?>/public/js/bootstrap.min.js"></script>

<script src="<?= '/'. GESTION_HOTEL ?>/public/js/plugins.js"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script src="<?= '/'. GESTION_HOTEL ?>/public/js/init.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript">
    $(document).ready(function() {
        "use strict";

        jQuery("#headerwrap").backstretch(
            [
                "<?= '/'. GESTION_HOTEL ?>/public/images/water-165219_1280.jpg",

                "<?= '/'. GESTION_HOTEL ?>/public/images/BG-1.jpg",

                "<?= '/'. GESTION_HOTEL ?>/public/images/BG-2.jpg",

                "<?= '/'. GESTION_HOTEL ?>/public/images/BG-2 (2).jpg",
            ], {
                duration: 4000,

                fade: 500,
            }
        );
    });
</script>
</body>

</html>
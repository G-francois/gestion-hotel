<?php

include './app/commum/header_client.php'

?>

<!-- chambre -->
<section>
    <div class="container">
        <div class="row">
            <div class="card my-5 border-0 rounded-0">
                <div class="row" style="background-color: #0c0b09">
                    <div class="col-md-6">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?= PATH_PROJECT ?>public/images/Chambres/Doubles/Doubles5.jpg" class="d-block w-100" alt="..." />
                                </div>

                                <div class="carousel-item">
                                    <img src="<?= PATH_PROJECT ?>public/images/Chambres/Doubles/Doubles4.jpg" class="d-block w-100" alt="..." />
                                </div>

                                <div class="carousel-item">
                                    <img src="<?= PATH_PROJECT ?>public/images/Chambres/Doubles/Doubles3.webp" class="d-block w-100" alt="..." />
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <h3 class="card-title">Chambre Doubles</h3>
                        <p class="card-text">
                            Situé au deuxième étage de l'hôtel, profitez du balcon et de
                            la vue sur la vallée. Ces chambres conçu pour héberger deux
                            personnes et est équipé d'un grand lit standard
                            (140-160*200) ou de deux lits simples (90*200)
                        </p>
                        <div>
                            <div style="display: flex">
                                <p><i class="fas fa-user-circle"></i> 2 VOYAGEURS</p>
                                <p style="margin-left: 2rem">
                                    <i class="fas fa-vector-square"></i> 50m²
                                </p>
                                <p style="margin-left: 2rem">
                                    <i class="bi bi-house"></i>350 €/nuit
                                </p>
                            </div>
                        </div>
                        <div>
                            <a title="Lits Twin" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Lits Twin" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-12.png" /></a>
                            <a title="Cocktail De Bienvenue" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Cocktail De Bienvenue" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-13.png" /></a>
                            <a title="Petit Déjeuner" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Petit Déjeuner" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-17.png" /></a>
                            <a title="Salle de bains privée" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Salle de bains privée" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-10.png" /></a>
                            <a title="Non fumeur" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Non fumeur" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-14.png" /></a>
                            <a title="satellite-tv" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="satellite-tv" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-18.png" /></a>
                            <a title="Blanchisserie" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Blanchisserie" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-15.png" /></a>
                            <a title="Wifi" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Wifi" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-12-1.png" /></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body px-0">
                            <h3>INFORMATIONS</h3>
                            <form action="inscription-traitement.php" method="post" novalidate>

                                <!-- Le champs nom -->
                                <div class="col-sm-12 mb-3">
                                    <label for="inscription-nom"> Nom client:
                                        <span class="text-danger">(*)</span>
                                    </label>

                                    <div class="input-group">
                                        <input type="text" name="nom" id="inscription-nom" class="form-control" placeholder="Veuillez entrer votre nom" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
                                    </div>

                                    <span class="text-danger">
                                        <?php
                                        if (isset($erreurs["nom"]) && !empty($erreurs["nom"])) {
                                            echo $erreurs["nom"];
                                        }
                                        ?>
                                    </span>
                                </div>


                                <!-- Le champs nom accompagnateur-->
                                <div class="col-sm-12 mb-3">
                                    <label for="inscription-nom"> Nom accompagnateur:
                                        <span class="text-danger">(*)</span>
                                    </label>

                                    <div class="input-group">
                                        <input type="text" name="nom" id="inscription-nom" class="form-control" placeholder="Veuillez entrer votre nom" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
                                    </div>

                                    <span class="text-danger">
                                        <?php
                                        if (isset($erreurs["nom"]) && !empty($erreurs["nom"])) {
                                            echo $erreurs["nom"];
                                        }
                                        ?>
                                    </span>
                                </div>


                                <!-- Le champs date de  début occupation -->
                                <div class="col-sm-12 mb-3">
                                    <label for="inscription-date-reservation">
                                        Date de départ occupation:
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="date" name="date-reservation" id="inscription-reservation" class="form-control" placeholder="Veuillez entrer votre date de début occupation" value="<?= (isset($donnees["date-naissance"]) && !empty($donnees["date-naissance"])) ? $donnees["date-naissance"] : ""; ?>" required>
                                    </div>

                                    <span class="text-danger">
                                        <?php
                                        if (isset($erreurs["date"]) && !empty($erreurs["date-reservation"])) {
                                            echo $erreurs["date"];
                                        }
                                        ?>
                                    </span>
                                </div>

                                <!-- Le champs date de  fin occupation -->
                                <div class="col-sm-12 mb-3">
                                    <label for="inscription-date-reservation">
                                        Date de fin occupation:
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="date" name="date-reservation" id="inscription-reservation" class="form-control" placeholder="Veuillez entrer votre date de fin occupation" value="<?= (isset($donnees["date-naissance"]) && !empty($donnees["date-naissance"])) ? $donnees["date-naissance"] : ""; ?>" required>
                                    </div>

                                    <span class="text-danger">
                                        <?php
                                        if (isset($erreurs["date"]) && !empty($erreurs["date-reservation"])) {
                                            echo $erreurs["date"];
                                        }
                                        ?>
                                    </span>
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <label for="nom-auteur" class="col-sm-4 col-form-label">Numéros de chambre
                                        <span class="text-danger">(*)</span>
                                    </label>
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

                                <div class="col-sm-12 mb-3">
                                    <label for="nom-auteur" class="col-sm-4 col-form-label">Mode de paiement</label>
                                    <div class="input-group">
                                        <select class="form-control" name="type" id="type">
                                            <option value="" disabled selected>Veuillez choisir le mode de paiement</option>
                                            <option value="">Carte de crédit</option>
                                            <option value="">Monnaies virtuelles</option>
                                            <option value="">Mobile</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <h5 style="font-weight: bold">Total Days : <span id="staying_day">0</span> Days</h5>
                                    <h5 style="font-weight: bold">Price: /-</h4>
                                        <h5 style="font-weight: bold">Total Amount : <span id="total_price">0</span> /-</h5>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

include './app/commum/header_client.php'

?>
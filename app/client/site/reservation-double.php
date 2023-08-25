<?php

include './app/commum/header_client.php'

?>

<!-- chambre -->
<section>
    <div class="container">
        <div class="row">
            <div class="card my-3 border-0 rounded-0">
                <div class="row" style="background-color: #0c0b09">
                    <h1 class="h3 mt-3 mb-3">Réservation d'une chambre DOUBLES</h1>

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
                                    <i class="bi bi-house"></i>25.000F/nuit
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
                            <form action="<?= PATH_PROJECT ?>client/site/traitement-reservation-double" method="post" class="user" novalidate>
                                <!-- Le champs nom client -->
                                <div class="col-sm-12 mb-3">
                                    <label for="inscription-nom"> Nom client:
                                        <span class="text-danger">(*)</span>
                                    </label>

                                    <?php
                                    if (!check_if_user_connected_client()) {
                                    ?>
                                        <div class="input-group">
                                            <input type="text" name="nom" id="inscription-nom" class="form-control" placeholder="Veuillez entrer votre nom" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (check_if_user_connected_client()) {
                                    ?>
                                        <div class="input-group">
                                            <input name="nom" type="text" class="form-control <?= isset($_SESSION['erreurs']['nom']) ? 'is-invalid' : '' ?>" id="Name" value="<?= isset($_SESSION['utilisateur_connecter_client']) ?  $_SESSION['utilisateur_connecter_client']['nom'] : 'Nom' ?> <?= isset($_SESSION['utilisateur_connecter_client']) ?  $_SESSION['utilisateur_connecter_client']['prenom'] : 'Prenom' ?>">
                                        </div>
                                    <?php
                                    }
                                    ?>


                                    <div class="row">
                                        <!-- Le champ téléphone -->
                                        <div class="col-md-6 mb-3">
                                            <label for="inscription-telephone">
                                                Téléphone :
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input type="text" name="telephone" id="inscription-telephone" class="form-control" placeholder="Veuillez entrer votre numéro de téléphone" value="<?= (isset($donnees["telephone"]) && !empty($donnees["telephone"])) ? $donnees["telephone"] : ''; ?>" required>
                                            <?php if (isset($erreurs["telephone"]) && !empty($erreurs["telephone"])) { ?>
                                                <span class="text-danger">
                                                    <?php echo $erreurs["telephone"]; ?>
                                                </span>
                                            <?php } ?>
                                        </div>

                                        <!-- Le champs email -->
                                        <div class="col-md-6 mb-3">
                                            <label for="inscription-email">
                                                Adresse mail :
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input type="email" name="email" id="inscription-email" class="form-control" placeholder="Veuillez entrer votre adresse mail" value="<?= (isset($donnees["email"]) && !empty($donnees["email"])) ? $donnees["email"] : ''; ?>" required>
                                            <?php if (isset($erreurs["email"]) && !empty($erreurs["email"])) { ?>
                                                <span class="text-danger">
                                                    <?php echo $erreurs["email"]; ?>
                                                </span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <div class="row">
                                    <!-- Le champs nom accompagnateur -->
                                    <div class="col-md-6 mb-3">
                                        <label for="inscription-nom_acc">Accompagnateur :</label>
                                        <input type="text" name="nom_acc" id="inscription-nom_acc" class="form-control" placeholder="Veuillez entrer le nom de l'accompagnateur" value="<?= (isset($donnees["nom_acc"]) && !empty($donnees["nom_acc"])) ? $donnees["nom_acc"] : ""; ?>" required>
                                        <?php if (isset($erreurs["nom_acc"]) && !empty($erreurs["nom_acc"])) { ?>
                                            <span class="text-danger">
                                                <?php echo $erreurs["nom_acc"]; ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                    <!-- Le champs contact accompagnateur-->
                                    <div class="col-md-6 mb-3">
                                        <label for="inscription-contact-acc">Contact de l'accompagnateur :</label>
                                        <input type="text" name="contact_acc" id="inscription-contact-acc" class="form-control" placeholder="Veuillez entrer le contact de l'accompagnateur" value="<?= (isset($donnees["contact_acc"]) && !empty($donnees["contact_acc"])) ? $donnees["contact_acc"] : ""; ?>" required>
                                        <?php if (isset($erreurs["contact_acc"]) && !empty($erreurs["contact_acc"])) { ?>
                                            <span class="text-danger">
                                                <?php echo $erreurs["contact_acc"]; ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>


                                <!-- Le champs date de  début occupation -->
                                <div class="col-sm-12 mb-3">
                                    <label for="inscription-date-debut">
                                        Date de départ occupation:
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="date" name="date-debut" id="inscription-date-debut" class="form-control" placeholder="Veuillez entrer votre date de début occupation" value="<?= (isset($donnees["date-debut"]) && !empty($donnees["date-debut"])) ? $donnees["date-debut"] : ""; ?>" required>
                                    </div>

                                    <span class="text-danger">
                                        <?php
                                        if (isset($erreurs["date-debut"]) && !empty($erreurs["date-debut"])) {
                                            echo $erreurs["date-debut"];
                                        }
                                        ?>
                                    </span>
                                </div>

                                <!-- Le champs date de  fin occupation -->
                                <div class="col-sm-12 mb-3">
                                    <label for="inscription-date-fin">
                                        Date de fin occupation:
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="date" name="date-fin" id="inscription-date-fin" class="form-control" placeholder="Veuillez entrer votre date de fin occupation" value="<?= (isset($donnees["date-fin"]) && !empty($donnees["date-fin"])) ? $donnees["date-fin"] : ""; ?>" required>
                                    </div>

                                    <span class="text-danger">
                                        <?php
                                        if (isset($erreurs["date-fin"]) && !empty($erreurs["date-fin"])) {
                                            echo $erreurs["date-fin"];
                                        }
                                        ?>
                                    </span>
                                </div>

                                <!-- Le champs numeros de chambre -->
                                <div class="col-sm-12 mb-3">
                                    <label for="nom-auteur" class="col-sm-4 col-form-label">Numéros de chambre
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <div class="input-group">
                                        <select class="form-control" name="lib_typ" id="type">
                                            <option value="" disabled selected>Veuillez choisir le numéro de chambre</option>
                                            <?php
                                            $chambres = recuperer_liste_chambres();
                                            foreach ($chambres as $chambre) {
                                                if ($chambre['lib_typ'] === 'Doubles') {
                                                    echo '<option value="' . $chambre['num_chambre'] . '">' . $chambre['num_chambre'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <h5 style="font-weight: bold">Nombre total de jours : <span id="staying_day">0</span></h5>
                                    <h5 style="font-weight: bold">Montant total : <span id="total_price">0</span> F</h5>
                                </div>

                                <div class="float-right" style="text-align: right;">
                                    <button type="reset" class="btn btn-danger">Annuler</button>
                                    <button type="submit" class="btn btn-success">Enregistrer</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


<?php
unset($_SESSION['erreurs-reservation'], $_SESSION['donnees-reservation'], $_SESSION['reservation-solo-message-success-global'], $_SESSION['reservation-solo-message-erreur-global']);
?>
</div>
</div>
</div>
</div>
</section>

<script>
    function calculateStayDuration() {
        var dateDebut = document.getElementById('inscription-date-debut').value;
        var dateFin = document.getElementById('inscription-date-fin').value;

        // Vérifier si les champs de date de début et de date de fin sont remplis
        if (dateDebut && dateFin) {
            var startDate = new Date(dateDebut);
            var endDate = new Date(dateFin);

            // Calculer la différence en millisecondes
            var diff = Math.abs(endDate - startDate);

            // Convertir la différence en jours
            var nbJours = Math.ceil(diff / (1000 * 60 * 60 * 24));

            // Afficher le nombre de jours dans l'élément avec l'ID "staying_day"
            document.getElementById('staying_day').textContent = nbJours;

            // Mettre à jour le prix total en fonction du nombre de jours
            updateTotalPrice(nbJours);
        } else {
            // Les champs de date de début et de date de fin ne sont pas remplis, réinitialiser les valeurs affichées
            document.getElementById('staying_day').textContent = '0';
            updateTotalPrice(0);
        }
    }

    function updateTotalPrice(nbJours) {
        var prixParNuit = 25000; // Prix par nuit pour la chambre Solo
        var total = prixParNuit * nbJours;

        // Ajouter un point après chaque groupe de 3 chiffres
        var formattedTotal = total.toLocaleString();

        // Afficher le prix total dans l'élément avec l'ID "total_price"
        document.getElementById('total_price').textContent = formattedTotal + " /-";
    }

    // Écouter les événements de changement de date de début et de date de fin
    document.getElementById('inscription-date-debut').addEventListener('change', calculateStayDuration);
    document.getElementById('inscription-date-fin').addEventListener('change', calculateStayDuration);

    // Calculer la durée du séjour au chargement initial de la page
    calculateStayDuration();
</script>

<?php

include './app/commum/footer_client.php';

?>
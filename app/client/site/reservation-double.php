<?php

$include_client_header = true;
include('./app/commum/header_.php');

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
                            Profitez du balcon et de la vue sur l'esplanade. Cette chambre est conçue pour héberger deux
                            personnes et est équipée d'un grand lit standard (140-160*200) ou de deux lits simples (90*200).
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
                            <a title="Salle de bains privée" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Salle de bains privée" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-10.png" /></a>
                            <a title="satellite-tv" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="satellite-tv" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-18.png" /></a>
                            <a title="Blanchisserie" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Blanchisserie" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-15.png" /></a>
                            <a title="Wifi" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Wifi" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-12-1.png" /></a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card-body px-0">

                            <?php
                            // Vérifie s'il y a un message de succès global à afficher
                            if (isset($_SESSION['reservation-double-message-success-global']) && !empty($_SESSION['reservation-double-message-success-global'])) {
                            ?>
                                <div class="alert alert-primary" style="color: white; background-color: #2653d4; text-align:center; border-color: snow;">
                                    <?= $_SESSION['reservation-double-message-success-global'] ?>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            // Vérifie s'il y a un message d'erreur global à afficher
                            if (isset($_SESSION['reservation-double-message-erreur-global']) && !empty($_SESSION['reservation-double-message-erreur-global'])) {
                            ?>
                                <div class="alert alert-primary" style="color: white; background-color: #9f0808; text-align:center; border-color: snow;">
                                    <?= $_SESSION['reservation-double-message-erreur-global'] ?>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            if (!check_if_user_connected_client()) {
                            ?>
                                <h5 style="color: #cda45e; text-align:center; margin-bottom: 20px;">
                                    <i class="bi bi-exclamation-triangle me-1"></i>
                                    Veuiller retenir le numéro de chambre que vous réservez après une réservation.
                                </h5>
                            <?php
                            }
                            ?>

                            <?php
                            if (check_if_user_connected_client()) {
                            ?>
                                <h5 style="color: #cda45e; text-align:center; margin-bottom: 20px;">
                                    <i class="bi bi-exclamation-triangle me-1"></i>
                                    Vous pouvez consulter la liste de vos réservations dans le tableau de bord après une réservation.
                                </h5>
                            <?php
                            }
                            ?>

                            <form action="<?= PATH_PROJECT ?>client/site/traitement-reservation-double" method="post" class="user" novalidate>
                                <?php
                                if (!check_if_user_connected_client()) {
                                ?>
                                    <div class="row">
                                        <!-- Le champ nom -->
                                        <div class="col-md-6 mb-3">
                                            <label for="inscription-nom">
                                                Nom :
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input type="text" name="nom" id="inscription-nom" class="form-control" placeholder="Veuillez entrer votre nom" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ''; ?>" required>
                                            <?php if (isset($erreurs["nom"]) && !empty($erreurs["nom"])) { ?>
                                                <span class="text-danger">
                                                    <?php echo $erreurs["nom"]; ?>
                                                </span>
                                            <?php } ?>
                                        </div>

                                        <!-- Le champ prénom -->
                                        <div class="col-md-6 mb-3">
                                            <label for="inscription-prenom">
                                                Prénom(s):
                                                <span class="text-danger">(*)</span>
                                            </label>
                                            <input type="text" name="prenom" id="inscription-prenom" class="form-control" placeholder="Veuillez entrer vos prénoms" value="<?= (isset($donnees["prenom"]) && !empty($donnees["prenom"])) ? $donnees["prenom"] : ''; ?>" required>
                                            <?php if (isset($erreurs["prenom"]) && !empty($erreurs["prenom"])) { ?>
                                                <span class="text-danger">
                                                    <?php echo $erreurs["prenom"]; ?>
                                                </span>
                                            <?php } ?>
                                        </div>
                                    </div>


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


                                <div class="row">
                                    <!-- Le champs date de début occupation -->
                                    <div class="col-md-6 mb-3">
                                        <label for="inscription-deb_occ">
                                            Début de séjour:
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <div class="input-group mb-3">
                                            <input type="date" name="deb_occ" id="inscription-deb_occ" class="form-control" placeholder="Veuillez entrer votre date de début occupation" value="<?= (isset($donnees["deb_occ"]) && !empty($donnees["deb_occ"])) ? $donnees["deb_occ"] : ""; ?>" min="<?= date('Y-m-d'); ?>" required>
                                        </div>
                                        <?php if (isset($erreurs["deb_occ"]) && !empty($erreurs["deb_occ"])) { ?>
                                            <span class="text-danger">
                                                <?php echo $erreurs["deb_occ"]; ?>
                                            </span>
                                        <?php } ?>

                                    </div>

                                    <!-- Le champs date de fin occupation -->
                                    <div class="col-md-6 mb-3">
                                        <label for="inscription-fin_occ">
                                            Fin de séjour:
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <div class="input-group mb-3">
                                            <input type="date" name="fin_occ" id="inscription-fin_occ" class="form-control" placeholder="Veuillez entrer votre date de fin occupation" value="<?= (isset($donnees["fin_occ"]) && !empty($donnees["fin_occ"])) ? $donnees["fin_occ"] : ""; ?>" required>
                                        </div>

                                        <?php if (isset($erreurs["fin_occ"]) && !empty($erreurs["fin_occ"])) { ?>
                                            <span class="text-danger">
                                                <?php echo $erreurs["fin_occ"]; ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <h5 style="font-weight: bold">Nombre total de jours : <span id="nombre_jour">0</span></h5>
                                    <h5 style="font-weight: bold">Montant total : <span id="prix_total">0</span> F</h5>
                                </div>

                                <button type="reset" class="btn btn-danger" style="--bs-btn-color: #fff; --bs-btn-bg: #3b070c; --bs-btn-border-color: #3b070c; --bs-btn-hover-color: #fff; --bs-btn-hover-bg: #b30617; --bs-btn-hover-border-color: #b30617;">
                                    Annuler
                                </button>
                                <button type="submit" name="enregistrer" class="btn btn-success" style="--bs-btn-color: #fff; --bs-btn-bg: #013534; --bs-btn-border-color: #000000; --bs-btn-hover-color: #fff; --bs-btn-hover-bg: #9d6b15; --bs-btn-hover-border-color: #000000;">
                                    Enregistrer
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


<?php
unset($_SESSION['erreurs-reservation'], $_SESSION['donnees-reservation'], $_SESSION['reservation-double-message-success-global'], $_SESSION['reservation-double-message-erreur-global']);
?>
</div>
</div>
</div>
</div>
</section>

<script>
    // Fonction pour calculer le nombre de jours entre deux dates
    function calculerDifferenceJours(debut, fin) {
        const diffTime = Math.abs(fin - debut);
        const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24)) + 1; // Ajouter 1 jour
        return diffDays;
    }

    // Fonction pour mettre à jour le nombre de jours et le prix total
    function mettreAJourPrix() {
        const dateDebut = new Date(document.getElementById('inscription-deb_occ').value);
        const dateFin = new Date(document.getElementById('inscription-fin_occ').value);

        // Vérification que la date de fin est supérieure à la date de début
        if (dateFin <= dateDebut) {
            document.getElementById('nombre_jour').innerText = 'Date de fin doit être après la date de début';
            document.getElementById('prix_total').innerText = '0 F';
            return;
        }

        const jours = calculerDifferenceJours(dateDebut, dateFin);

        const prixParJour = 25000; // Remplacez ceci par le prix réel de la chambre par jour

        const montantTotal = prixParJour * jours;

        document.getElementById('nombre_jour').innerText = `${jours} jour(s)`;
        document.getElementById('prix_total').innerText = montantTotal + ' F';
    }

    // Écouteurs d'événements pour mettre à jour les calculs lorsqu'une date est changée
    document.getElementById('inscription-deb_occ').addEventListener('change', mettreAJourPrix);
    document.getElementById('inscription-fin_occ').addEventListener('change', mettreAJourPrix);
</script>


<?php
$include_icm_footer = true;
include('./app/commum/footer_.php');
?>
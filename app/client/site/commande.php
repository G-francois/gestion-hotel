<?php

include './app/commum/header_client.php';

?>


<section>
    <div class="container">
        <div class="row">
            <h1 class="h3 mt-3">Espace commande de repas</h1>
            <div class="card my-2 border-0 rounded-0">
                <div class="row" style="background-color: #0c0b09">
                    <div class="col-md-6">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?= PATH_PROJECT ?>public/images/specials-1.png" alt="" class="img-fluid" />
                                </div>

                                <div class="carousel-item">
                                    <img src="<?= PATH_PROJECT ?>public/images/menu/caesar.jpg" class="d-block w-100" alt="..." />
                                </div>

                                <div class="carousel-item">
                                    <img src="<?= PATH_PROJECT ?>public/images/menu/caesar.jpg" class="d-block w-100" alt="..." />
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

                    </div>
                    <div class="col-md-6">
                        <div class="card-body px-0">

                            <?php
                            // Vérifie s'il y a un message de succès global à afficher
                            if (isset($_SESSION['reservation-solo-message-success-global']) && !empty($_SESSION['reservation-solo-message-success-global'])) {
                            ?>
                                <div class="alert alert-primary" style="color: white; background-color: #2653d4; text-align:center; border-color: snow;">
                                    <?= $_SESSION['reservation-solo-message-success-global'] ?>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            // Vérifie s'il y a un message d'erreur global à afficher
                            if (isset($_SESSION['reservation-solo-message-erreur-global']) && !empty($_SESSION['reservation-solo-message-erreur-global'])) {
                            ?>
                                <div class="alert alert-primary" style="color: white; background-color: #9f0808; text-align:center; border-color: snow;">
                                    <?= $_SESSION['reservation-solo-message-erreur-global'] ?>
                                </div>
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

                            <form action="<?= PATH_PROJECT ?>client/site/traitement-reservation-solo" method="post" class="user" novalidate>

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

                                <!-- <div class="col-md-12 mb-3">
                                    <label for="nombre-repas">Nombre de repas :</label>
                                    <select name="repas" id="nombre-repas" class="form-control" onchange="togglerepasFields()">
                                        <option value="0">Veuiller sélectionner le nombre de repas</option>
                                        <option value="1">1 repas</option>
                                        <option value="2">2 repas</option>
                                        <option value="3">3 repas</option>
                                        <option value="4">4 repas</option>
                                    </select>
                                </div>
 -->



                                <!-- Conteneur pour les nouveaux champs d'accompagnateurs -->
                                <div id="nouveaux-repas-<?php echo $reservation['num_res']; ?>">
                                
                            </div>


                                <!-- Bouton pour ajouter un accompagnateur -->
                                <button type="button" class="btn btn-success ajouter-accompagnateur" data-reservation-id="<?php echo $reservation['num_res']; ?>">
                                    +
                                </button>


                                <div class="row" id="repas-1" style="display: none;">
                                    <!-- Le champs Nom du Repas -->
                                    <div class="col-md-6 mb-3">
                                        <label for="meal-name">Nom du Repas :</label>
                                        <select class="form-control" id="meal-name" name="meal-name" onchange="updateMealPrice()">
                                            <option value="">Sélectionnez un repas</option>
                                            <?php
                                            $liste_repas = recuperer_nom_prix_repas();

                                            foreach ($liste_repas as $repas) {
                                                echo '<option value="' . $repas['cod_repas'] . '" data-prix="' . $repas['pu_repas'] . '">' . $repas['nom_repas'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <?php if (isset($erreurs["nom_acc"]) && !empty($erreurs["nom_acc"])) { ?>
                                            <span class="text-danger">
                                                <?php echo $erreurs["nom_acc"]; ?>
                                            </span>
                                        <?php } ?>
                                    </div>

                                    <!-- Le champs Prix du Repas -->
                                    <div class="col-md-6 mb-3">
                                        <label for="meal-price">Prix du Repas:</label>
                                        <input type="text" class="form-control" placeholder="Le prix du repas sera automatiquement rempli" id="meal-price" name="meal-price" readonly>

                                        <?php if (isset($erreurs["contact_acc"]) && !empty($erreurs["contact_acc"])) { ?>
                                            <span class="text-danger">
                                                <?php echo $erreurs["contact_acc"]; ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="row" id="repas-2" style="display: none;">
                                    <!-- Le champs Nom du Repas -->
                                    <div class="col-md-6 mb-3">
                                        <label for="meal-name">Nom du Repas :</label>
                                        <select class="form-control" id="meal-name2" name="meal-name2" onchange="updateMealPrice2()">
                                            <option value="">Sélectionnez un repas</option>
                                            <?php
                                            $liste_repas = recuperer_nom_prix_repas();

                                            foreach ($liste_repas as $repas) {
                                                echo '<option value="' . $repas['cod_repas'] . '" data-prix2="' . $repas['pu_repas'] . '">' . $repas['nom_repas'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <?php if (isset($erreurs["nom_acc"]) && !empty($erreurs["nom_acc"])) { ?>
                                            <span class="text-danger">
                                                <?php echo $erreurs["nom_acc"]; ?>
                                            </span>
                                        <?php } ?>
                                    </div>

                                    <!-- Le champs Prix du Repas -->
                                    <div class="col-md-6 mb-3">
                                        <label for="meal-price2">Prix du Repas:</label>
                                        <input type="text" class="form-control" placeholder="Le prix du repas sera automatiquement rempli" id="meal-price2" name="meal-price2" readonly>

                                        <?php if (isset($erreurs["contact_acc"]) && !empty($erreurs["contact_acc"])) { ?>
                                            <span class="text-danger">
                                                <?php echo $erreurs["contact_acc"]; ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="row" id="repas-3" style="display: none;">
                                    <!-- Le champs Nom du Repas -->
                                    <div class="col-md-6 mb-3">
                                        <label for="meal-name">Nom du Repas :</label>
                                        <select class="form-control" id="meal-name3" name="meal-name3" onchange="updateMealPrice3()">
                                            <option value="">Sélectionnez un repas</option>
                                            <?php
                                            $liste_repas = recuperer_nom_prix_repas();

                                            foreach ($liste_repas as $repas) {
                                                echo '<option value="' . $repas['cod_repas'] . '" data-prix3="' . $repas['pu_repas'] . '">' . $repas['nom_repas'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <?php if (isset($erreurs["nom_acc"]) && !empty($erreurs["nom_acc"])) { ?>
                                            <span class="text-danger">
                                                <?php echo $erreurs["nom_acc"]; ?>
                                            </span>
                                        <?php } ?>
                                    </div>

                                    <!-- Le champs Prix du Repas -->
                                    <div class="col-md-6 mb-3">
                                        <label for="meal-price3">Prix du Repas:</label>
                                        <input type="text" class="form-control" placeholder="Le prix du repas sera automatiquement rempli" id="meal-price3" name="meal-price3" readonly>

                                        <?php if (isset($erreurs["contact_acc"]) && !empty($erreurs["contact_acc"])) { ?>
                                            <span class="text-danger">
                                                <?php echo $erreurs["contact_acc"]; ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="row" id="repas-4" style="display: none;">
                                    <!-- Le champs Nom du Repas -->
                                    <div class="col-md-6 mb-3">
                                        <label for="meal-name4">Nom du Repas :</label>
                                        <select class="form-control" id="meal-name4" name="meal-name4" onchange="updateMealPrice4()">
                                            <option value="">Sélectionnez un repas</option>
                                            <?php
                                            $liste_repas = recuperer_nom_prix_repas();

                                            foreach ($liste_repas as $repas) {
                                                echo '<option value="' . $repas['cod_repas'] . '" data-prix4="' . $repas['pu_repas'] . '">' . $repas['nom_repas'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <?php if (isset($erreurs["nom_acc"]) && !empty($erreurs["nom_acc"])) { ?>
                                            <span class="text-danger">
                                                <?php echo $erreurs["nom_acc"]; ?>
                                            </span>
                                        <?php } ?>
                                    </div>

                                    <!-- Le champs Prix du Repas -->
                                    <div class="col-md-6 mb-3">
                                        <label for="meal-price4">Prix du Repas:</label>
                                        <input type="text" class="form-control" placeholder="Le prix du repas sera automatiquement rempli" id="meal-price4" name="meal-price4" readonly>

                                        <?php if (isset($erreurs["contact_acc"]) && !empty($erreurs["contact_acc"])) { ?>
                                            <span class="text-danger">
                                                <?php echo $erreurs["contact_acc"]; ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>



                                <div class="col-lg-12 mt-4">
                                    <h5 style="font-weight: bold">Montant total : <span id="prix_total">0</span> </h5>
                                </div>

                                <div class="float-right" style="text-align: right;">
                                    <button type="reset" class="btn btn-danger">Annuler</button>
                                    <button type="submit" name="enregistrer" class="btn btn-success">Enregistrer</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>



<script>
    // Fonction pour afficher/cacher les ensembles de champs d'accompagnateurs en fonction du nombre sélectionné
    function togglerepasFields() {
        var nombrerepas = parseInt(document.getElementById("nombre-repas").value);

        for (var i = 1; i <= 4; i++) {
            var repasFields = document.getElementById("repas-" + i);

            if (i <= nombrerepas) {
                repasFields.style.display = "flex";
            } else {
                repasFields.style.display = "none";
            }
        }
    }
</script>

<script>
    function updateMealPrice() {
        const selectedOption = document.getElementById("meal-name").options[document.getElementById("meal-name").selectedIndex];
        const mealPrice = selectedOption.getAttribute("data-prix");
        document.getElementById("meal-price").value = mealPrice;
    }

    function updateMealPrice2() {
        const selectedOption = document.getElementById("meal-name2").options[document.getElementById("meal-name2").selectedIndex];
        const mealPrice = selectedOption.getAttribute("data-prix2");
        document.getElementById("meal-price2").value = mealPrice;
    }

    function updateMealPrice3() {
        const selectedOption = document.getElementById("meal-name3").options[document.getElementById("meal-name3").selectedIndex];
        const mealPrice = selectedOption.getAttribute("data-prix3");
        document.getElementById("meal-price3").value = mealPrice;
    }

    function updateMealPrice4() {
        const selectedOption = document.getElementById("meal-name4").options[document.getElementById("meal-name4").selectedIndex];
        const mealPrice = selectedOption.getAttribute("data-prix4");
        document.getElementById("meal-price4").value = mealPrice;
    }
</script>

<?php
// Supprimer les variables de session
// unset($_SESSION['donnees-chambre-solo-modifier'], $_SESSION['erreurs-chambre-solo-modifier'], $_SESSION['message-success-global'], $_SESSION['message-erreur-global']);

include './app/commum/footer_client_icm.php';

?>
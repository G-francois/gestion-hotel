<?php
// Vérifie si l'utilisateur est connecté en tant qu'administrateur
if (!check_if_user_connected_admin()) {
    // Redirige l'utilisateur vers la page de connexion de l'administrateur s'il n'est pas connecté en tant qu'administrateur
    header('location: ' . PATH_PROJECT . 'administrateur/connexion/index');
    exit;
}

include './app/commum/header.php';

include './app/commum/aside.php';

?>

<!-- Commencement du contenu de la page -->
<div class="container-fluid">
    <!-- Titre de la page -->
    <div class="pagetitle ">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item active">Ajouter une réservation de chambre suite</li>
            </ol>
        </nav>
    </div>

    <?php
    // Vérifie s'il y a un message de succès global à afficher
    if (isset($_SESSION['reservation-suite-message-success-global']) && !empty($_SESSION['reservation-suite-message-success-global'])) {
    ?>
        <div class="alert alert-primary" style="color: white; background-color: #2653d4; text-align:center; border-color: snow;">
            <?= $_SESSION['reservation-suite-message-success-global'] ?>
        </div>
    <?php
    }
    ?>

    <?php
    // Vérifie s'il y a un message d'erreur global à afficher
    if (isset($_SESSION['reservation-suite-message-erreur-global']) && !empty($_SESSION['reservation-suite-message-erreur-global'])) {
    ?>
        <div class="alert alert-primary" style="color: white; background-color: #9f0808; text-align:center; border-color: snow;">
            <?= $_SESSION['reservation-suite-message-erreur-global'] ?>
        </div>
    <?php
    }
    ?>

    <form action="<?= PATH_PROJECT ?>administrateur/dashboard/traitement-reservation-suit" method="post" class="user" novalidate>

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

        <div class="col-md-6 mb-3">
            <label for="nombre-accompagnateurs">Nombre d'accompagnateurs :</label>
            <select name="nombre_accompagnateurs" id="nombre-accompagnateurs" class="form-control" onchange="toggleAccompagnateursFields()">
                <option value="0">Aucun</option>
                <option value="1">1 Accompagnateur</option>
                <option value="2">2 Accompagnateurs</option>
                <option value="3">3 Accompagnateurs</option>
                <option value="4">4 Accompagnateurs</option>
            </select>
        </div>

        <div class="row" id="accompagnateur-1" style="display: none;">
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

        <div class="row" id="accompagnateur-2" style="display: none;">
            <!-- Le champs nom accompagnateur -->
            <div class="col-md-6 mb-3">
                <label for="inscription-nom_acc2">Accompagnateur 2 :</label>
                <input type="text" name="nom_acc2" id="inscription-nom_acc2" class="form-control" placeholder="Veuillez entrer le nom de l'accompagnateur 2" value="<?= (isset($donnees["nom_acc2"]) && !empty($donnees["nom_acc2"])) ? $donnees["nom_acc2"] : ""; ?>" required>
                <?php if (isset($erreurs["nom_acc2"]) && !empty($erreurs["nom_acc2"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["nom_acc2"]; ?>
                    </span>
                <?php } ?>
            </div>
            <!-- Le champs contact accompagnateur-->
            <div class="col-md-6 mb-3">
                <label for="inscription-contact-acc2">Contact de l'accompagnateur 2 :</label>
                <input type="text" name="contact_acc2" id="inscription-contact-acc2" class="form-control" placeholder="Veuillez entrer le contact de l'accompagnateur 2" value="<?= (isset($donnees["contact_acc2"]) && !empty($donnees["contact_acc2"])) ? $donnees["contact_acc2"] : ""; ?>" required>
                <?php if (isset($erreurs["contact_acc2"]) && !empty($erreurs["contact_acc2"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["contact_acc2"]; ?>
                    </span>
                <?php } ?>
            </div>
        </div>

        <div class="row" id="accompagnateur-3" style="display: none;">
            <!-- Le champs nom accompagnateur -->
            <div class="col-md-6 mb-3">
                <label for="inscription-nom_acc3">Accompagnateur 3 :</label>
                <input type="text" name="nom_acc3" id="inscription-nom_acc3" class="form-control" placeholder="Veuillez entrer le nom de l'accompagnateur 3" value="<?= (isset($donnees["nom_acc3"]) && !empty($donnees["nom_acc3"])) ? $donnees["nom_acc3"] : ""; ?>" required>
                <?php if (isset($erreurs["nom_acc3"]) && !empty($erreurs["nom_acc3"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["nom_acc3"]; ?>
                    </span>
                <?php } ?>
            </div>
            <!-- Le champs contact accompagnateur-->
            <div class="col-md-6 mb-3">
                <label for="inscription-contact-acc3">Contact de l'accompagnateur 3 :</label>
                <input type="text" name="contact_acc3" id="inscription-contact-acc3" class="form-control" placeholder="Veuillez entrer le contact de l'accompagnateur 3" value="<?= (isset($donnees["contact_acc3"]) && !empty($donnees["contact_acc3"])) ? $donnees["contact_acc3"] : ""; ?>" required>
                <?php if (isset($erreurs["contact_acc3"]) && !empty($erreurs["contact_acc3"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["contact_acc3"]; ?>
                    </span>
                <?php } ?>
            </div>
        </div>

        <div class="row" id="accompagnateur-4" style="display: none;">
            <!-- Le champs nom accompagnateur -->
            <div class="col-md-6 mb-3">
                <label for="inscription-nom_acc4">Accompagnateur 4 :</label>
                <input type="text" name="nom_acc4" id="inscription-nom_acc4" class="form-control" placeholder="Veuillez entrer le nom de l'accompagnateur 4" value="<?= (isset($donnees["nom_acc4"]) && !empty($donnees["nom_acc4"])) ? $donnees["nom_acc4"] : ""; ?>" required>
                <?php if (isset($erreurs["nom_acc4"]) && !empty($erreurs["nom_acc4"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["nom_acc4"]; ?>
                    </span>
                <?php } ?>
            </div>
            <!-- Le champs contact accompagnateur-->
            <div class="col-md-6 mb-3">
                <label for="inscription-contact-acc4">Contact de l'accompagnateur 4 :</label>
                <input type="text" name="contact_acc4" id="inscription-contact-acc4" class="form-control" placeholder="Veuillez entrer le contact de l'accompagnateur 4" value="<?= (isset($donnees["contact_acc4"]) && !empty($donnees["contact_acc4"])) ? $donnees["contact_acc4"] : ""; ?>" required>
                <?php if (isset($erreurs["contact_acc4"]) && !empty($erreurs["contact_acc4"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["contact_acc4"]; ?>
                    </span>
                <?php } ?>
            </div>
        </div>

        <div class="row">
            <!-- Le champs date de  début occupation -->
            <div class="col-md-6 mb-3">
                <label for="inscription-deb_occ">
                    Début de séjour :
                    <span class="text-danger">(*)</span>
                </label>
                <div class="input-group mb-3">
                    <input type="date" name="deb_occ" id="inscription-deb_occ" class="form-control" placeholder="Veuillez entrer votre date de début occupation" value="<?= (isset($donnees["deb_occ"]) && !empty($donnees["deb_occ"])) ? $donnees["deb_occ"] : ""; ?>" required>
                </div>
                <?php if (isset($erreurs["deb_occ"]) && !empty($erreurs["deb_occ"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["deb_occ"]; ?>
                    </span>
                <?php } ?>

            </div>

            <!-- Le champs date de  fin occupation -->
            <div class="col-md-6 mb-3">
                <label for="inscription-fin_occ">
                    Fin de séjour :
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

        <div class="col-lg-12 mt-4">
            <h5 style="font-weight: bold">Nombre total de jours : <span id="nombre_jour">0</span></h5>
            <h5 style="font-weight: bold">Montant total : <span id="prix_total">0</span> </h5>
        </div>

        <div class="float-right" style="text-align: right;">
            <button type="reset" class="btn btn-danger">Annuler</button>
            <button type="submit" name="enregistrer" class="btn btn-success">Enregistrer</button>
        </div>

    </form>
</div>


<?php
unset($_SESSION['erreurs-reservation'], $_SESSION['donnees-reservation'], $_SESSION['reservation-suite-message-success-global'], $_SESSION['reservation-suite-message-erreur-global']);

include './app/commum/footer.php';
?>


<script>
    // Fonction pour afficher/cacher les ensembles de champs d'accompagnateurs en fonction du nombre sélectionné
    function toggleAccompagnateursFields() {
        var nombreAccompagnateurs = parseInt(document.getElementById("nombre-accompagnateurs").value);

        for (var i = 1; i <= 4; i++) {
            var accompagnateurFields = document.getElementById("accompagnateur-" + i);

            if (i <= nombreAccompagnateurs) {
                accompagnateurFields.style.display = "flex";
            } else {
                accompagnateurFields.style.display = "none";
            }
        }
    }
</script>


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

        const prixParJour = 35000; // Remplacez ceci par le prix réel de la chambre par jour

        const montantTotal = prixParJour * jours;

        document.getElementById('nombre_jour').innerText = `${jours} jour(s)`;
        document.getElementById('prix_total').innerText = montantTotal + ' F';
    }

    // Écouteurs d'événements pour mettre à jour les calculs lorsqu'une date est changée
    document.getElementById('inscription-deb_occ').addEventListener('change', mettreAJourPrix);
    document.getElementById('inscription-fin_occ').addEventListener('change', mettreAJourPrix);
</script>


<!-- <script>
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
        var prixParNuit = 25000; // Prix par nuit pour la chambre suite
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
</script> -->

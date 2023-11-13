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
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Ajouter une réservation de chambre double</li>
            </ol>
        </nav>
    </div>


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


    <form action="<?= PATH_PROJECT ?>administrateur/reservations/traitement-reservation-double" method="post" class="user" novalidate>

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
unset($_SESSION['erreurs-reservation'], $_SESSION['donnees-reservation'], $_SESSION['reservation-double-message-success-global'], $_SESSION['reservation-double-message-erreur-global']);

include './app/commum/footer.php';
?>

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
</script> -->


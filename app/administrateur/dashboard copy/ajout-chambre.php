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
                <li class="breadcrumb-item active">Ajouter une chambre</li>
            </ol>
        </nav>
    </div>

    <?php
    // Vérifier s'il y a un message de succès et s'il n'est pas vide
    if (isset($_SESSION['message-success-global']) && !empty($_SESSION['message-success-global'])) {
    ?>
        <div class="alert alert-primary" style="color: white; background-color: #2653d4; text-align:center; border-color: snow;">
            <?= $_SESSION['message-success-global'] ?>
        </div>
    <?php
    }
    ?>

    <?php
    // Vérifier s'il y a un message d'erreur et s'il n'est pas vide
    if (isset($_SESSION['message-erreur-global']) && !empty($_SESSION['message-erreur-global'])) {
    ?>
        <div class="alert alert-danger" style="color: white; background-color: #9f0808; text-align:center; border-color: snow;">
            <?= $_SESSION['message-erreur-global'] ?>
        </div>
    <?php
    }
    ?>

    <!-- Formulaire d'ajout de chambre-->
    <form action="<?= PATH_PROJECT ?>administrateur/dashboard/ajout-chambre-traitement" method="post" class="user">
        <div class="form-group row pt-5">
            <!-- Le champ Code du numéros de chambre -->
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="num_chambre">
                    Numéros de chambre :
                    <span class="text-danger">(*)</span>
                </label>
                <input type="number" name="num_chambre" id="num_chambre" class="form-control" placeholder="Veuillez entrer le code type de chambre" value="<?= (isset($donnees["num_chambre"]) && !empty($donnees["num_chambre"])) ? $donnees["num_chambre"] : ''; ?>" required>

                <?php if (isset($erreurs["num_chambre"]) && !empty($erreurs["num_chambre"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["num_chambre"]; ?>
                    </span>
                <?php } ?>
            </div>

            <!-- Le champ Code du type de chambre -->
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="cod_typ">
                    Code du type de chambre :
                    <span class="text-danger">(*)</span>
                </label>
                <input type="text" name="cod_typ" id="cod_typ" class="form-control" placeholder="Le code du type de chambre sera automatiquement rempli" value="<?= (isset($donnees["cod_typ"]) && !empty($donnees["cod_typ"])) ? $donnees["cod_typ"] : ''; ?>" readonly>

                <?php if (isset($erreurs["cod_typ"]) && !empty($erreurs["code_type"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["code_typ"]; ?>
                    </span>
                <?php } ?>
            </div>

            <!-- Le champ Libellé du type de chambre -->
            <div class="col-sm-6 mt-3">
                <label for="libelle_type">
                    Libellé du type de chambre :
                    <span class="text-danger">(*)</span>
                </label>
                <div style="padding-left: 0px; padding-right: 0px;">
                    <select class="lib_typ form-control" id="libelle_type" name="lib_typ">
                        <option value="" disabled selected>Sélectionnez le libellé du type de chambre</option>
                        <option value="Solo">Solo</option>
                        <option value="Doubles">Doubles</option>
                        <option value="Triples">Triples</option>
                        <option value="Suite">Suite</option>
                    </select>
                    <?php if (isset($erreurs["lib_typ"]) && !empty($erreurs["lib_typ"])) { ?>
                        <span class="text-danger">
                            <?php echo $erreurs["lib_typ"]; ?>
                        </span>
                    <?php } ?>
                </div>
            </div>

            <!-- Le champ Prix unitaire -->
            <div class="col-sm-6 mt-3">
                <label for="prix_unitaire">
                    Prix unitaire :
                    <span class="text-danger">(*)</span>
                </label>
                <input type="text" name="pu" id="prix_unitaire" class="form-control" placeholder="Le prix unitaire sera automatiquement rempli" readonly>

                <?php if (isset($erreurs["pu"]) && !empty($erreurs["pu"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["pu"]; ?>
                    </span>
                <?php } ?>
            </div>


            <!-- Le bouton d'ajout -->
            <div class="col-md-6 offset-md-6" style="padding-top: 47px;">
                <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
            </div>
        </div>
    </form>
</div>
<!-- Fin du contenu de la page -->

<?php
// Supprimer les variables de session
unset($_SESSION['message-success-global'], $_SESSION['message-erreur-global'], $_SESSION['erreurs-chambre'], $_SESSION['donnees-chambre']);

include './app/commum/footer.php';
?>

<script>
    // Fonction pour mettre à jour le champ Code du type de chambre et Prix unitaire
    function updateFields() {
        var libelleType = document.getElementById("libelle_type").value;
        var codTypField = document.getElementById("cod_typ");
        var puField = document.getElementById("prix_unitaire");

        if (libelleType === "Solo") {
            codTypField.value = "01";
            puField.value = "15000";
        } else if (libelleType === "Doubles") {
            codTypField.value = "02";
            puField.value = "25000";
        } else if (libelleType === "Triples") {
            codTypField.value = "03";
            puField.value = "35000";
        } else if (libelleType === "Suite") {
            codTypField.value = "04";
            puField.value = "50000";
        } else {
            codTypField.value = "";
            puField.value = "";
        }
    }

    // Appeler la fonction lorsque le libellé du type de chambre change
    var libelleTypeField = document.getElementById("libelle_type");
    libelleTypeField.addEventListener("change", updateFields);

    // Appeler la fonction au chargement de la page
    updateFields();
</script>

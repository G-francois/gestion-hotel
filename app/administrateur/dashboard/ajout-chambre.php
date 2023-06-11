<?php
if (!check_if_user_connected_admin()) {
    header('location: ' . PATH_PROJECT . 'administrateur/connexion/index');
    exit;
}

include './app/commum/header.php';

include './app/commum/aside.php';

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajouter une chambre </h1>
    </div>

    <?php
    if (isset($_SESSION['message-success-global']) && !empty($_SESSION['message-success-global'])) {
    ?>
        <div class="alert alert-primary" style="color: white; background-color: #2653d4; text-align:center; border-color: snow;">
            <?= $_SESSION['message-success-global'] ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['message-erreur-global']) && !empty($_SESSION['message-erreur-global'])) {
    ?>
        <div class="alert alert-primary" style="color: white; background-color: #9f0808; text-align:center; border-color: snow;">
            <?= $_SESSION['message-erreur-global'] ?>
        </div>
    <?php
    }
    ?>

    <form action="<?= PATH_PROJECT ?>administrateur/dashboard/ajout-chambre-traitement" method="post" class="user">
        <!-- Le champs nom & prénom -->
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="code_type">
                    Code du type de chambre :
                    <span class="text-danger">(*)</span>
                </label>
                <input type="number" name="cod_typ" id="code_type" class="form-control" placeholder="Veuillez entrer le code type de chambre" value="<?= (isset($donnees["code_type"]) && !empty($donnees["code_type"])) ? $donnees["code_type"] : ''; ?>" required>

                <?php if (isset($erreurs["code_type"]) && !empty($erreurs["code_type"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["code_type"]; ?>
                    </span>
                <?php } ?>
            </div>


            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="libelle_type">
                    Libellé du type de chambre :
                    <span class="text-danger">(*)</span>
                </label>
                <input type="text" name="lib_typ" id="libelle_type" class="form-control" placeholder="Veuillez entrer le libelle du type de chambre" value="<?= (isset($donnees["lib_typ"]) && !empty($donnees["lib_typ"])) ? $donnees["lib_typ"] : ''; ?>" required>

                <?php if (isset($erreurs["lib_typ"]) && !empty($erreurs["lib_typ"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["lib_typ"]; ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-sm-6 mt-3">
                <label for="statut">
                    Statut de la chambre :
                    <span class="text-danger">(*)</span>
                </label>
                <input type="text" name="statut" id="statut" class="form-control" placeholder="Veuillez entrer le statuts de la chambre" value="<?= (isset($donnees["statut"]) && !empty($donnees["statut"])) ? $donnees["statut"] : ''; ?>" required>

                <?php if (isset($erreurs["statut"]) && !empty($erreurs["statut"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["statut"]; ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-sm-6 mt-3">
                <label for="prix_unitaire">
                    Prix unitaire :
                    <span class="text-danger">(*)</span>
                </label>
                <input type="number" name="pu" id="prix_unitaire" class="form-control" placeholder="Veuillez entrer le prix de la chambre" value="<?= (isset($donnees["pu"]) && !empty($donnees["pu"])) ? $donnees["pu"] : ''; ?>" required>

                <?php if (isset($erreurs["pu"]) && !empty($erreurs["pu"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["pu"]; ?>
                    </span>
                <?php } ?>
            </div>
        </div>

</div>

<div class="card-footer float-right">
    <button type="reset" class="btn btn-danger">Annuler</button>
    <button type="submit" class="btn btn-success ">Enregistrer</button>
</div>
</form>

</div>
<!-- End of Content Wrapper -->
</div>

</div>


<?php

unset($_SESSION['message-success-global'], $_SESSION['message-erreur-global'], $_SESSION['erreurs-chambre'], $_SESSION['donnees-chambre']);

include './app/commum/footer.php'

?>
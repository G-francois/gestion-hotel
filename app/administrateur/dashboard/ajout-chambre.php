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
    <div class="pagetitle ">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item active">Ajouter une chambre</li>
            </ol>
        </nav>
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
        <!-- Le champs Code du type & Libellé du type -->
        <div class="form-group row pt-5">
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

            <div class="col-md-6" style="padding-top: 47px;">
                <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
            </div>
        </div>


    </form>

</div>


<?php

unset($_SESSION['message-success-global'], $_SESSION['message-erreur-global'], $_SESSION['erreurs-chambre'], $_SESSION['donnees-chambre']);

include './app/commum/footer.php'

?>
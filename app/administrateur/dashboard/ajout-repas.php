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
                <li class="breadcrumb-item active">Ajouter un repas</li>
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
    <form action="<?= PATH_PROJECT ?>administrateur/dashboard/ajout-repas-traitement" method="post" class="user">
        <!-- Le champs nom & prénom -->
        <div class="form-group row pt-5">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="inscription-nom" class="col-sm-4 col-form-label">
                    Nom du repas :
                    <span class="text-danger">(*)</span>
                </label>
                <input type="text" name="nom_repas" id="inscription-nom" class="form-control" placeholder="Veuillez entrer le nom du repas" value=
                "<?= (isset($donnees["nom_repas"]) && !empty($donnees["nom_repas"])) ? $donnees["nom_repas"] : ''; ?>" required>

                <?php
                if (isset($erreurs["nom_repas"]) && !empty($erreurs["nom_repas"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["nom_repas"]; ?>
                    </span>
                <?php } ?>
            </div>


            <div class="col-sm-6">
                <label for="inscription-prix" class="col-sm-4 col-form-label">
                    Prix unitaire :
                    <span class="text-danger">(*)</span>
                </label>
                <input type="number" name="pu_repas" id="inscription-prix" class="form-control" placeholder="Veuillez entrer le prix du repas" value="
                <?= (isset($donnees["pu_repas"]) && !empty($donnees["pu_repas"])) ? $donnees["pu_repas"] : ''; ?>" required>

                <?php if (isset($erreurs["pu_repas"]) && !empty($erreurs["pu_repas"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["pu_repas"]; ?>
                    </span>
                <?php } ?>
            </div>
        </div>

        <div class="col-md-12" style="padding-top: 37px;">
            <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
        </div>
    </form>

</div>
<!-- End of Content Wrapper -->


<?php

unset($_SESSION['message-success-global'], $_SESSION['message-erreur-global'], $_SESSION['erreurs-repas'], $_SESSION['donnees-repas']);

include './app/commum/footer.php'

?>
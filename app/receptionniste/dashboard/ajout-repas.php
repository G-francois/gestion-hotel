<?php

if (!check_if_user_connected_recept()) {
    header('location: ' . PATH_PROJECT . 'receptionniste/connexion/index');
    exit;
}

include './app/commum/header.php';

include './app/commum/aside_recept.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>receptionniste/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item active">Ajouter un repas</li>
            </ol>
        </nav>
    </div>

    <form action="inscription-traitement.php" method="post" novalidate class="user">
        <!-- Le champs nom & prénom -->
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" name="nom_repas" id="inscription-nom" class="form-control" placeholder="Veuillez entrer le nom du repas" value="<?= (isset($donnees["nom_repas"]) && !empty($donnees["nom_repas"])) ? $donnees["nom_repas"] : ""; ?>" required>
                <?php if (isset($erreurs["nom_repas"]) && !empty($erreurs["nom_repas"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["nom_repas"]; ?>
                    </span>
                <?php } ?>
            </div>

            <div class="col-sm-6">
                <input type="text" name="prix_repas" id="inscription-prix" class="form-control" placeholder="Veuillez entrer le prix du repas" value="<?= (isset($donnees["pu_repas"]) && !empty($donnees["pu_repas"])) ? $donnees["pu_repas"] : ""; ?>" required>
                <?php if (isset($erreurs["prix_repas"]) && !empty($erreurs["prix_repas"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["prix_repas"]; ?>
                    </span>
                <?php } ?>
            </div>
        </div>

        <div class="card-footer float-right">
            <button type="reset" class="btn btn-danger">Annuler</button>
            <button type="submit" class="btn btn-success ">Enregistrer</button>
        </div>
    </form>

</div>
<!-- End of Content Wrapper -->


<?php

include './app/commum/footer.php'

?>
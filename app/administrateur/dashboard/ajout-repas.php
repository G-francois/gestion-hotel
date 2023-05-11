<?php
include './app/commum/header.php'
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajouter un repas </h1>
    </div>

    <form action="inscription-traitement.php" method="post" novalidate class="user">
        <!-- Le champs nom & prénom -->
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" name="nom" id="inscription-nom" class="form-control" placeholder="Veuillez entrer le nom du repas" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
            </div>

            <div class="col-sm-6">
                <input type="text" name="prix" id="inscription-prix" class="form-control" placeholder="Veuillez entrer le prix du repas" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
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
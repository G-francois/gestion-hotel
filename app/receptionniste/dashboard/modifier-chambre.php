<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4>Modifer
                la chambre </h4>
        </div>
    </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajouter une chambre </h1>
    </div>

    <form action="inscription-traitement.php" method="post" novalidate class="user">
        <!-- Le champs nom & prénom -->
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" name="nom" id="inscription" class="form-control" placeholder="Veuillez entrer le code type de chambre" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" name="nom" id="inscription" class="form-control" placeholder="Veuillez entrer le libelle du type de chambre" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
            </div>
            </span>
            <div class="col-sm-6 mt-3">
                <input type="text" name="prenom" id="inscription" class="form-control" placeholder="Veuillez entrer le prix de la chambre" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
            </div>
        </div>

        <div class="card-footer float-right">
            <button type="reset" class="btn btn-danger">Annuler</button>
            <button type="submit" class="btn btn-success ">Enregistrer</button>
        </div>
    </form>

</div>
<!-- End of Content Wrapper -->
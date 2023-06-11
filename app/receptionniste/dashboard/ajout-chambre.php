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
    <div class="pagetitle ml-2 mr-2">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>receptionniste/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item active">Listes des commandes</li>
            </ol>
        </nav>
    </div>



    <form action="/soutenance/administrateur/dashboard/ajout-chambre-traitement" method="post" class="user">
        <!-- Le champs nom & prénom -->
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="code_type">Code du type de chambre :</label>
                <input type="text" name="cod_typ" id="code_type" class="form-control" placeholder="Veuillez entrer le code type de chambre" value="<?php if (isset($donnees["cod_typ"]) && !empty($donnees["cod_typ"])) {
                                                                                                                                                        echo $donnees["cod_typ"];
                                                                                                                                                    } else {
                                                                                                                                                        echo '';
                                                                                                                                                    } ?>">

                <span class="text-danger">
                    <?php
                    if (isset($erreurs["cod_typ"]) && !empty($erreurs["cod_typ"])) {
                        echo $erreurs["cod_typ"];
                    }
                    ?>
                </span>
            </div>


            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="libelle_type">Libellé du type de chambre :</label>
                <input type="text" name="lib_typ" id="libelle_type" class="form-control" placeholder="Veuillez entrer le libelle du type de chambre" value="<?php if (isset($donnees["lib_typ"]) && !empty($donnees["lib_typ"])) {
                                                                                                                                                                echo $donnees["lib_typ"];
                                                                                                                                                            } else {
                                                                                                                                                                echo '';
                                                                                                                                                            } ?>">

                <span class="text-danger">
                    <?php
                    if (isset($erreurs["lib_typ"]) && !empty($erreurs["lib_typ"])) {
                        echo $erreurs["lib_typ"];
                    }
                    ?>
                </span>
            </div>

            <div class="col-sm-6 mt-3">
                <label for="statut">Statut de la chambre :</label>
                <input type="text" name="statuts" id="statut" class="form-control" placeholder="Veuillez entrer le statuts du type de chambre" value="<?php if (isset($donnees["statuts"]) && !empty($donnees["statuts"])) {
                                                                                                                                                            echo $donnees["statuts"];
                                                                                                                                                        } else {
                                                                                                                                                            echo '';
                                                                                                                                                        } ?>">

                <span class="text-danger">
                    <?php
                    if (isset($erreurs["statuts"]) && !empty($erreurs["statuts"])) {
                        echo $erreurs["statuts"];
                    }
                    ?>
                </span>
            </div>

            <div class="col-sm-6 mt-3">
                <label for="prix_unitaire">Prix unitaire :</label>
                <input type="text" name="pu" id="prix_unitaire" class="form-control" placeholder="Veuillez entrer le prix de la chambre" value="<?php if (isset($donnees["pu"]) && !empty($donnees["pu"])) {
                                                                                                                                                    echo $donnees["pu"];
                                                                                                                                                } else {
                                                                                                                                                    echo '';
                                                                                                                                                } ?>">

                <span class="text-danger">
                    <?php
                    if (isset($erreurs["pu"]) && !empty($erreurs["pu"])) {
                        echo $erreurs["pu"];
                    }
                    ?>
                </span>
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

include './app/commum/footer.php'

?>
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

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Modifer
                        le repas <?= (isset($repas[0]["nom_repas"]) && !empty($repas[0]["nom_repas"])) ? $repas[0]["nom_repas"] : ""; ?> </h4>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            <?php

            if ((!isset($cod_repas) || empty($cod_repas)) || (!isset($repas) || empty($repas))) {

            ?>
                <div class="alert alert-danger" role="alert">
                    Le repas que vous souhaitez modifier n'existe pas.

                    <a class="btn btn-default" href="?requette=liste-repas">Retour vers la liste des repas</a>
                </div>
                <?php

            } else {

                if (isset($message["statut"]) && 0 == $message["statut"]) {

                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $message["message"]; ?>
                    </div>
                <?php

                } else if (isset($message["statut"]) && 1 == $message["statut"]) {

                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $message["message"]; ?>
                    </div>
                <?php

                }

                ?>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ajout d'un repas</h3>
                    </div>


                    <form class="form-horizontal" action="?requette=modifier-repas-traitement" method="POST">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nom-repas" class="col-sm-2 col-form-label">Nom de l'repas: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nom-repas" id="nom-repas" placeholder="Veuillez entrer le nom de l'repas" value="<?= (isset($donnees["nom-repas"]) && !empty($donnees["nom-repas"])) ? $donnees["nom-repas"] : $repas[0]["nom_repas"]; ?>">

                                    <input type="hidden" name="numero-repas" value="<?= $repas[0]["num_aut"]; ?>">


                                    <span class="text-danger">

                                        <?php
                                        if (isset($erreurs["nom-repas"]) && !empty($erreurs["nom-repas"])) {
                                            echo $erreurs["nom-repas"];
                                        }

                                        ?>

                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="reset" class="btn btn-danger">Annuler</button>
                            <button type="submit" class="btn btn-success  float-right">Modifier l'repas</button>
                        </div>

                    </form>
                </div>
            <?php } ?>

        </div>

    </section>
</div>
<!-- End of Page Wrapper -->
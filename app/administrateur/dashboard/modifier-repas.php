<?php
if (!check_if_user_connected_admin()) {
    header('location: ' . PATH_PROJECT . 'administrateur/connexion/index');
    exit;
}

include './app/commum/header.php';

include './app/commum/aside.php';

$cod_repas = "";

$repas = array();

if (!empty($params[3])) {

    $repas = recuperer_repas_par_son_code_repas($params[3]);
}

?>

<div class="container-fluid">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/liste-repas">Liste des repas</a></li>
                <li class="breadcrumb-item active">Modifier repas</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row mb-2">
            <!-- <div class="col-sm-6">
            <h1>Modifier le repas <?= (isset($repas[0]["nom_repas"]) && !empty($repas[0]["nom_repas"])) ? $repas[0]["nom_repas"] : ""; ?></h1>
        </div> -->
        </div>
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

    <section class="content">
        <?php if (empty($repas)) { ?>
            <div class="alert alert-danger" role="alert">
                Le repas que vous souhaitez modifier n'existe pas.
                <a class="btn btn-default" href="?requete=liste-repas">Retour vers la liste des repas</a>
            </div>
        <?php } else { ?>

            <form action="<?= PATH_PROJECT ?>administrateur/dashboard/modifier-repas-traitement" method="post" class="user">
                <div class="form-group row pt-5">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inscription-nom" class="col-sm-4 col-form-label">
                            Nom du repas :
                            <span class="text-danger">(*)</span>
                        </label>

                        <input type="text" class="form-control" name="nom_repas" id="inscription-nom" placeholder="Veuillez entrer le nom du repas" value="<?= (isset($_POST["nom_repas"]) && !empty($_POST["nom_repas"])) ? $_POST["nom_repas"] : $repas[0]["nom_repas"]; ?>" required>
                        <input type="hidden" name="cod_repas" value="<?= $repas[0]["cod_repas"]; ?>">

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
                        <input type="number" class="form-control" name="pu_repas" id="inscription-prix" placeholder="Veuillez entrer le prix du repas" value="<?= (isset($_POST["pu_repas"]) && !empty($_POST["pu_repas"])) ? $_POST["pu_repas"] : $repas[0]["pu_repas"]; ?>" required>
                        <input type="hidden" name="pu_repas" value="<?= $repas[0]["pu_repas"]; ?>">

                        <?php if (isset($erreurs["pu_repas"]) && !empty($erreurs["pu_repas"])) { ?>
                            <span class="text-danger">
                                <?php echo $erreurs["pu_repas"]; ?>
                            </span>
                        <?php } ?>
                    </div>

                    <div class="col-sm-12 mb-3" style="margin-top: 35px;">
                        <input type="hidden" name="num_chambre" value="<?= $params[3] ?>">
                        <input type="submit" value="Modifier" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>


        <?php } ?>
    </section>
</div>

<?php

unset($_SESSION['message-success-global'], $_SESSION['message-erreur-global'], $_SESSION['erreurs-repas-modifier'], $_SESSION['donnees-repas-modifier']);

include './app/commum/footer.php'

?>
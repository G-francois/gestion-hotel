<?php
if (!check_if_user_connected_admin()) {
    header('location: ' . PATH_PROJECT . 'administrateur/connexion/index');
    exit;
}

include './app/commum/header.php';

include './app/commum/aside.php';

$num_chambre = "";

$chambre = array();

if (!empty($params[3])) {
    $chambre = recuperer_chambre_par_son_num_chambre($params[3]);
}

?>

<div class="container-fluid">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/liste-chambres">Liste des chambres</a></li>
                <li class="breadcrumb-item active">Modifier chambre</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row mb-2">
            <!-- <div class="col-sm-6">
            <h1>Modifier le chambre <?= (isset($chambre[0]["num_chambre"]) && !empty($chambre[0]["num_chambre"])) ? $chambre[0]["num_chambre"] : ""; ?></h1>
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
        <div class="alert alert-danger" style="color: white; background-color: #9f0808; text-align:center; border-color: snow;">
            <?= $_SESSION['message-erreur-global'] ?>
        </div>
    <?php
    }
    ?>

    <section class="content">
        <?php if (empty($chambre)) { ?>
            <div class="alert alert-danger" role="alert">
                La chambre que vous souhaitez modifier n'existe pas.
                <a class="btn btn-default" href="<?= PATH_PROJECT ?>administrateur/dashboard/liste-chambres">Retour vers la liste des chambres</a>
            </div>
        <?php } else { ?>
            <form action="<?= PATH_PROJECT ?>administrateur/dashboard/modifier-chambre-traitement" method="post" class="user">
                <div class="form-group row pt-5">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inscription-code" class="col-sm-4 col-form-label">
                            Code du type:
                            <span class="text-danger">(*)</span>
                        </label>
                        <input type="number" class="form-control" name="cod_typ" id="inscription-code" placeholder="Veuillez entrer le code type de chambre" value="<?= (!empty($donnees_chambre_modifier["cod_typ"])) ? $donnees_chambre_modifier["cod_typ"] : $chambre[0]["cod_typ"]; ?>" required>
                        <?php if (isset($erreurs_chambre_modifier["cod_typ"]) && !empty($erreurs_chambre_modifier["cod_typ"])) { ?>
                            <span class="text-danger">
                                <?= $erreurs_chambre_modifier["cod_typ"]; ?>
                            </span>
                        <?php } ?>
                    </div>
                    <div class="col-sm-6">
                        <label for="inscription-libelle" class="col-sm-4 col-form-label">
                            Libellé:
                            <span class="text-danger">(*)</span>
                        </label>
                        <input type="text" class="form-control" name="lib_typ" id="inscription-libelle" placeholder="Veuillez entrer le libellé de chambre" value="<?= (!empty($donnees_chambre_modifier["lib_typ"])) ? $donnees_chambre_modifier["lib_typ"] : $chambre[0]["lib_typ"]; ?>" required>
                        <?php if (isset($erreurs_chambre_modifier["lib_typ"]) && !empty($erreurs_chambre_modifier["lib_typ"])) { ?>
                            <span class="text-danger">
                                <?= $erreurs_chambre_modifier["lib_typ"]; ?>
                            </span>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inscription-prix" class="col-sm-4 col-form-label">
                            Prix unitaire:
                            <span class="text-danger">(*)</span>
                        </label>
                        <input type="number" class="form-control" name="pu" id="inscription-prix" placeholder="Veuillez entrer le prix unitaire de chambre" value="<?= (!empty($donnees_chambre_modifier["pu"])) ? $donnees_chambre_modifier["pu"] : $chambre[0]["pu"]; ?>" required>
                        <?php if (isset($erreurs_chambre_modifier["pu"]) && !empty($erreurs_chambre_modifier["pu"])) { ?>
                            <span class="text-danger">
                                <?= $erreurs_chambre_modifier["pu"]; ?>
                            </span>
                        <?php } ?>
                    </div>

                    <div class="col-sm-6 mb-3" style="margin-top: 35px;">
                        <input type="hidden" name="num_chambre" value="<?= $params[3] ?>">
                        <input type="submit" value="Modifier" class="btn btn-primary btn-block">
                    </div>
                </div>

            </form>
        <?php } ?>
    </section>
</div>

<?php
unset($_SESSION['donnees-chambre-modifier'], $_SESSION['erreurs-chambre-modifier'], $_SESSION['message-success-global']);

include './app/commum/footer.php';
?>
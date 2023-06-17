<?php
// Vérifie si l'utilisateur est connecté en tant qu'administrateur
if (!check_if_user_connected_admin()) {
    // Redirige l'utilisateur vers la page de connexion de l'administrateur s'il n'est pas connecté en tant qu'administrateur
    header('location: ' . PATH_PROJECT . 'administrateur/connexion/index');
    exit;
}
include './app/commum/header.php';

include './app/commum/aside.php';

$num_chambre = "";

$chambre = array();

// Vérifie si le paramètre contenant le numéro de chambre est présent
if (!empty($params[3])) {
    // Récupère les informations de la chambre à partir de son numéro
    $chambre = recuperer_chambre_par_son_num_chambre($params[3]);
}

?>

<!-- Commencement du contenu de la page -->
<div class="container-fluid">
    <!-- Titre de la page -->
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/liste-chambres">Liste des chambres</a></li>
                <li class="breadcrumb-item active">Modifier chambre</li>
            </ol>
        </nav>
    </div>

    <?php
    // Vérifie s'il y a un message de succès global à afficher
    if (isset($_SESSION['message-success-global']) && !empty($_SESSION['message-success-global'])) {
    ?>
        <div class="alert alert-primary" style="color: white; background-color: #2653d4; text-align:center; border-color: snow;">
            <?= $_SESSION['message-success-global'] ?>
        </div>
    <?php
    }
    ?>

    <?php
    // Vérifie s'il y a un message d'erreur global à afficher
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

            <!-- Affiche un message d'erreur si la chambre n'existe pas -->
            <div class="alert alert-danger" role="alert">
                La chambre que vous souhaitez modifier n'existe pas.
                <a class="btn btn-default" href="<?= PATH_PROJECT ?>administrateur/dashboard/liste-chambres">Retour vers la liste des chambres</a>
            </div>

        <?php } else { ?>

            <!-- Affiche le formulaire de modification de la chambre -->
            <form action="<?= PATH_PROJECT ?>administrateur/dashboard/modifier-chambre-traitement" novalidate method="post" class="user">
                <div class="form-group row pt-5">
                    <!-- Le champ Code du type de chambre -->
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="inscription-code" class="col-sm-4 col-form-label">
                            Code du type:
                            <span class="text-danger">(*)</span>
                        </label>
                        <input type="number" class="form-control" name="cod_typ" id="inscription-code" placeholder="Veuillez entrer le code type de chambre" value="<?= (!empty($donnees["cod_typ"])) ? $donnees["cod_typ"] : $chambre[0]["cod_typ"]; ?>" required>
                        <?php if (isset($erreurs["cod_typ"]) && !empty($erreurs["cod_typ"])) { ?>
                            <span class="text-danger">
                                <?= $erreurs["cod_typ"]; ?>
                            </span>
                        <?php } ?>
                    </div>

                    <!-- Le champ Libellé du type de chambre -->
                    <div class="col-sm-6">
                        <label for="inscription-libelle" class="col-sm-4 col-form-label">
                            Libellé:
                            <span class="text-danger">(*)</span>
                        </label>
                        <select class="form-control" name="lib_typ" id="inscription-libelle" required>
                            <?php
                            $optionsLibelle = array("Solo", "Doubles", "Triple", "Suite");
                            $selectedValue = (!empty($donnees_chambre_modifier["lib_typ"])) ? $donnees_chambre_modifier["lib_typ"] : $chambre[0]["lib_typ"];
                            // Ajoute les options du menu déroulant
                            foreach ($optionsLibelle as $option) {
                                $selected = ($selectedValue === $option) ? "selected" : "";
                            ?>
                                <option value="<?= $option ?>" <?= $selected ?>><?= $option ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <?php if (isset($erreurs["lib_typ"]) && !empty($erreurs["lib_typ"])) { ?>
                            <span class="text-danger">
                                <?= $erreurs["lib_typ"]; ?>
                            </span>
                        <?php } ?>
                    </div>

                </div>

                <div class="form-group row">
                    <!-- Le champ Prix unitaire -->
                    <div class="col-sm-6">
                        <label for="inscription-prix" class="col-sm-4 col-form-label">
                            Prix unitaire:
                            <span class="text-danger">(*)</span>
                        </label>
                        <input type="number" class="form-control" name="pu" id="inscription-prix" placeholder="Veuillez entrer le prix unitaire de chambre" value="<?= (!empty($donnees_chambre_modifier["pu"])) ? $donnees_chambre_modifier["pu"] : $chambre[0]["pu"]; ?>" required>
                        <?php if (isset($erreurs["pu"]) && !empty($erreurs["pu"])) { ?>
                            <span class="text-danger">
                                <?= $erreurs["pu"]; ?>
                            </span>
                        <?php } ?>
                    </div>

                    <!-- Le bouton modifier -->
                    <div class="col-sm-6 mb-3" style="margin-top: 35px;">
                        <input type="hidden" name="num_chambre" value="<?= $params[3] ?>">
                        <input type="submit" value="Modifier" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
            <!-- Fin du formulaire -->

        <?php } ?>
    </section>
</div>

<?php
// Supprimer les variables de session
unset($_SESSION['donnees-chambre-modifier'], $_SESSION['erreurs-chambre-modifier'], $_SESSION['message-success-global']);

include './app/commum/footer.php';
?>
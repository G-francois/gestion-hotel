<?php
if (!check_if_user_connected_admin()) {
    header('location: ' . PATH_PROJECT . 'administrateur/connexion/index');
    exit;
}

include './app/commum/header.php';

include './app/commum/aside.php';

$liste_repas = recuperer_liste_repas();
?>

<div class="container-fluid">
    <div class="pagetitle ">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item active">Listes des repas</li>
            </ol>
        </nav>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php if (isset($liste_repas) && !empty($liste_repas)) {
                ?>
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>Code type</th>
                                <th>Libellés</th>
                                <th>Prix</th>
                                <th>Statut du Repas</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            foreach ($liste_repas as $repas) {
                            ?>
                                <tr>
                                    <td><?php echo $repas['cod_repas']; ?></td>
                                    <td><?php echo $repas['nom_repas']; ?></td>
                                    <td><?php echo $repas['pu_repas']; ?></td>

                                    <td>
                                        <button class="btn <?php echo ($repas['est_actif'] == 1 && $repas['est_supprimer'] == 0) ? 'btn-success' : 'btn-danger'; ?> ">
                                            <?php
                                            if ($repas['est_actif'] == 1 && $repas['est_supprimer'] == 0) {
                                                echo 'Disponible';
                                            } else {
                                                echo 'Supprimé';
                                            }
                                            ?>
                                        </button>
                                    </td>
                                    <td>
                                        <a href="<?= PATH_PROJECT ?>administrateur/dashboard/modifier-repas/<?= $repas['cod_repas'] ?>" class="btn btn-warning">Modifier</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#supprimer-repas-<?= $repas["cod_repas"]; ?>">Supprimer</a>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="supprimer-repas-<?= $repas["cod_repas"]; ?>" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Supprimer le repas <?= $repas["nom_repas"]; ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Etes-vous sûr de vouloir supprimer le repas <?= $repas["nom_repas"]; ?> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="<?= PATH_PROJECT ?>administrateur/dashboard/traitement-supprimer-repas/<?= $repas['cod_repas'] ?>" class="btn btn-danger">Oui</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo "Aucun repas n'a été trouvé!";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include './app/commum/footer.php';
?>
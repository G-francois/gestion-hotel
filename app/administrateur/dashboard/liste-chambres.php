<?php
if (!check_if_user_connected_admin()) {
    header('location: ' . PATH_PROJECT . 'administrateur/connexion/index');
    exit;
}

include './app/commum/header.php';

include './app/commum/aside.php';


$liste_chambre = recuperer_liste_chambres();
?>

<div class="container-fluid">
    <div class="pagetitle ">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item active">Listes des chambres</li>
            </ol>
        </nav>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php if (isset($liste_chambre) && !empty($liste_chambre)) {
                ?>
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" style="text-align:center;">
                        <thead>
                            <tr>
                                <th>Numéro de chambre</th>
                                <th>Code type</th>
                                <th>Libellés</th>
                                <th>Statut</th>
                                <th>Prix Unitaire</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($liste_chambre as $chambre) {
                            ?>
                                <tr>
                                    <td><?php echo $chambre['num_chambre']; ?></td>
                                    <td><?php echo $chambre['cod_typ']; ?></td>
                                    <td><?php echo $chambre['lib_typ']; ?></td>
                                    <td><?php echo $chambre['statut']; ?></td>
                                    <td><?php echo $chambre['pu']; ?></td>
                                    <td>
                                        <a href="?requette=modifier-chambre&num-chambre=<?= $chambre["cod_typ"]; ?>" class="btn btn-warning">Modifier</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#supprimer-chambre-<?= $chambre["cod_typ"]; ?>">Supprimer</a>
                                    </td>

                                    <div class="modal fade" id="supprimer-chambre-<?= $chambre["cod_typ"]; ?>" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Supprimer
                                                        le chambre <?= $chambre["lib_typ"]; ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Etes vous sur de vouloir supprimer
                                                        la chambre <?= $chambre["lib_typ"]; ?> ?</p>
                                                </div>
                                                <div class="modal-footer ">

                                                    <a href="<?= PATH_PROJECT ?>receptionniste/dashboard/supprimer-chambre-traitement<?= $chambre["cod_typ"]; ?>" class="btn btn-danger">Oui</a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Annuler
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

                                <?php
                            }

                                ?>
                                </tr>
                        </tbody>
                    </table>
                <?php
                } else {

                    echo "Aucune chambre n'a été trouvés!!!";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <?php

    include './app/commum/footer.php'

    ?>
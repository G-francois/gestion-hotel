<?php
if (!check_if_user_connected_admin()) {
    header('location: ' . PATH_PROJECT . 'administrateur/connexion/index');
    exit;
}

include './app/commum/header.php';

include './app/commum/aside.php';

$liste_utilisateur = recuperer_liste_utilisateurs();
?>

<div class="container-fluid">
    <div class="pagetitle ">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item active">Listes des utilisateurs</li>
            </ol>
        </nav>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php if (isset($liste_utilisateur) && !empty($liste_utilisateur)) {
                ?>
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom(s)</th>
                                <th>Sexe</th>
                                <th>Profil</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($liste_utilisateur as $utilisateur) {
                            ?>
                                <tr>
                                    <td><?php echo $utilisateur['id']; ?></td>
                                    <td><?php echo $utilisateur['nom']; ?></td>
                                    <td><?php echo $utilisateur['prenom']; ?></td>
                                    <td><?php echo $utilisateur['sexe']; ?></td>
                                    <td><?php echo $utilisateur['profil']; ?></td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                            Détails
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p><strong>Téléphone : </strong><?php echo $utilisateur['telephone']; ?></p>
                                                        <p><strong>Email : </strong><?php echo $utilisateur['email']; ?></p>
                                                        <p><strong>Nom d'utilisateur : </strong><?php echo $utilisateur['nom_utilisateur']; ?></p>
                                                        <p><strong>Est Actif : </strong>
                                                            <button class="btn <?php echo ($utilisateur['est_actif'] == 1 && $utilisateur['est_supprimer'] == 0) ? 'btn-success' : (($utilisateur['est_actif'] == 0 && $utilisateur['est_supprimer'] == 1) ? 'btn-danger' : 'btn-warning'); ?> ">
                                                                <?php
                                                                if ($utilisateur['est_actif'] == 1 && $utilisateur['est_supprimer'] == 0) {
                                                                    echo 'Compte actif';
                                                                } elseif ($utilisateur['est_actif'] == 0 && $utilisateur['est_supprimer'] == 1) {
                                                                    echo 'Compte supprimé';
                                                                } else {
                                                                    echo 'Compte désactivé';
                                                                }
                                                                ?>
                                                            </button>
                                                        </p>

                                                        <p><strong>Créer le : </strong><?php echo $utilisateur['creer_le']; ?></p>
                                                    </div>
                                                    <div class="modal-footer float-right">
                                                        <a href="?requette=modifier-utilisateur&num-utilisateur=<?= $utilisateur["nom_utilisateur"]; ?>" class="btn btn-warning">Modifier</a>

                                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#supprimer-utilisateur-<?= $utilisateur["nom_utilisateur"]; ?>">Supprimer</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                            Activer
                                        </button>

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                                            Désactiver
                                        </button>
                                    </td>

                                    <div class="modal fade" id="supprimer-utilisateur-<?= $utilisateur["nom_utilisateur"]; ?>" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Supprimer
                                                        l'utilisateur <?= $utilisateur["nom_utilisateur"]; ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Etes vous sur de vouloir supprimer
                                                        l'utilisateur <?= $utilisateur["nom_utilisateur"]; ?> ?</p>
                                                </div>
                                                <div class="modal-footer ">

                                                    <a href="<?= PATH_PROJECT ?>administrateur/dashboard/supprimer-utilisateur-traitement<?= $utilisateur["nom_utilisateur"]; ?>" class="btn btn-danger">Oui</a>
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

                    echo "Aucun utlisateur n'a été trouvés!!!";
                }
                ?>

            </div>

        </div>
    </div>

</div>


<?php

include './app/commum/footer.php'

?>
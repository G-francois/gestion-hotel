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
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#details-utilisateur-<?php echo $utilisateur['id']; ?>">
                                            Détails
                                        </button>

                                        <!-- Modal de détails -->
                                        <div class="modal fade" id="details-utilisateur-<?php echo $utilisateur['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p><strong>Téléphone : </strong><?php echo $utilisateur['telephone']; ?></p>
                                                        <p><strong>Email : </strong><?php echo $utilisateur['email']; ?></p>
                                                        <p><strong>Nom d'utilisateur : </strong><?php echo $utilisateur['nom_utilisateur']; ?></p>
                                                        <p><strong>Créer le : </strong><?php echo $utilisateur['creer_le']; ?></p>
                                                        <p>
                                                            <button class="btn <?php echo ($utilisateur['est_actif'] == 1 && $utilisateur['est_supprimer'] == 0) ? 'btn-success' : (($utilisateur['est_actif'] == 0 && $utilisateur['est_supprimer'] == 1) ? 'btn-danger' : 'btn-warning'); ?> ">
                                                                <?php
                                                                if ($utilisateur['est_actif'] == 1 && $utilisateur['est_supprimer'] == 1) {
                                                                    echo 'Compte actif mais supprimé';
                                                                } elseif ($utilisateur['est_actif'] == 0 && $utilisateur['est_supprimer'] == 1) {
                                                                    echo 'Compte supprimé';
                                                                } elseif ($utilisateur['est_actif'] == 1 && $utilisateur['est_supprimer'] == 0) {
                                                                    echo 'Compte actif';
                                                                } else {
                                                                    echo 'Compte désactivé';
                                                                }
                                                                ?>
                                                            </button>
                                                        </p>

                                                    </div>
                                                    <div class="modal-footer float-right">
                                                        <!-- Formulaire d'activation -->
                                                        <form action="<?= PATH_PROJECT ?>administrateur/dashboard/traitement_activer_compte_user" method="POST">
                                                            <input type="hidden" name="utilisateur_id" value="<?php echo $utilisateur['id']; ?>">
                                                            <button type="submit" class="btn btn-success">Activer</button>
                                                        </form>

                                                        <!-- Formulaire désactivation -->
                                                        <form action="<?= PATH_PROJECT ?>administrateur/dashboard/traitement_desactiver_compte_user" method="POST">
                                                            <input type="hidden" name="utilisateur_id" value="<?php echo $utilisateur['id']; ?>">
                                                            <button type="submit" class="btn btn-warning">Désactiver</button>
                                                        </form>

                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimer-utilisateur-<?php echo $utilisateur['id']; ?>">
                                                            Supprimer
                                                        </button>

                                                        <!-- Modal de suppression -->
                                                        <div class="modal fade" id="supprimer-utilisateur-<?php echo $utilisateur['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Supprimer l'utilisateur <?php echo $utilisateur['nom_utilisateur']; ?></h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Etes-vous sûr de vouloir supprimer l'utilisateur <?php echo $utilisateur['nom_utilisateur']; ?> ?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="<?= PATH_PROJECT ?>administrateur/dashboard/traitement_suppression_compte_users" method="POST">
                                                                            <input type="hidden" name="utilisateur_id" value="<?php echo $utilisateur['id']; ?>">
                                                                            <button type="submit" class="btn btn-danger">Oui</button>
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    echo "Aucun utilisateur n'a été trouvé !!!";
                }
                ?>

            </div>

        </div>
    </div>
</div>


<?php

unset($_SESSION['message-success-global'], $_SESSION['message-erreur-global']);

include './app/commum/footer.php'
?>
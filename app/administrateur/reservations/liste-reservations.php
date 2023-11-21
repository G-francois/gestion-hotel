<?php
// Vérifie si l'utilisateur est connecté en tant qu'administrateur
if (!check_if_user_connected_admin()) {
    // Redirige l'utilisateur vers la page de connexion de l'administrateur s'il n'est pas connecté en tant qu'administrateur
    header('location: ' . PATH_PROJECT . 'administrateur/connexion/index');
    exit;
}
include './app/commum/header.php';

include './app/commum/aside.php';

?>

<!-- Commencement du contenu de la page -->
<div class="container-fluid">
    <!-- Titre de la page -->
    <div class="pagetitle ">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste des réservations</li>
            </ol>
        </nav>
    </div>


    <!-- Tableau de données liste reservations -->
    <div class="card shadow mb-4">

        <?php
        // Affiche un message de succès s'il existe et n'est pas vide
        if (isset($_SESSION['message-success-global']) && !empty($_SESSION['message-success-global'])) {
        ?>
            <div class="alert alert-primary" style="color: white; background-color: #2653d4; text-align:center; border-color: snow;">
                <?= $_SESSION['message-success-global'] ?>
            </div>
        <?php
        }
        ?>

        <?php
        // Affiche un message d'erreur s'il existe et n'est pas vide
        if (isset($_SESSION['message-erreur-global']) && !empty($_SESSION['message-erreur-global'])) {
        ?>
            <div class="alert alert-danger" style="color: white; background-color: #9f0808; text-align:center; border-color: snow;">
                <?= $_SESSION['message-erreur-global'] ?>
            </div>
        <?php
        }
        ?>

        <div class="card-body">
            <div class="table-responsive">
                <?php
                // Récupérer la liste des réservations avec les informations du client et des accompagnateurs
                $liste_reservations = recuperer_liste_des_reservations();

                // Obtenez la date actuelle
                $currentDate = date('Y-m-d'); // Format 'YYYY-MM-DD'

                // Vérifiez s'il y a des réservations
                if (!empty($liste_reservations)) {
                ?>
                    <!-- <div class="form-check">
                        <input type="checkbox" id="selectAllCheckbox">
                        <label class="form-check-label" for="selectAllCheckbox">Tout Sélectionner</label>
                    </div> -->

                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                        <thead>
                            <tr>
                                <!-- <th scope="col">Sélection</th> Nouvelle colonne pour la sélection -->
                                <th scope="col">N° de Réservation</th>
                                <th scope="col">Date & Heure</th>
                                <th scope="col">Nom du Client</th>
                                <th scope="col">Date de Début</th>
                                <th scope="col">Date de Fin</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($liste_reservations as $reservation) {
                            ?>

                                <tr>
                                    <!-- <td><input type="checkbox" name="selection[]" value="<?= $reservation['num_res']; ?>"></td> Case à cocher pour la sélection -->
                                    <td><?php echo $reservation['num_res']; ?></td>
                                    <td><?php echo $reservation['creer_le']; ?></td>
                                    <td><?php echo "Inconnue" ?></td>
                                    <td>
                                        <?= $reservation['deb_occ'] ?>
                                    </td>
                                    <td>
                                        <?= $reservation['fin_occ'] ?>
                                    </td>


                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <!-- Button Détails modal -->
                                            <i class="far fa-eye details-icon" style="margin-right: 20px;" data-toggle="modal" data-target="#details-reservation-<?= $reservation['num_res']; ?>" title="Voir les détails">
                                            </i>

                                            <!-- Modal Détails-->
                                            <div class="modal fade" id="details-reservation-<?= $reservation["num_res"]; ?>" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Détails de la réservation <?php echo $reservation['num_res']; ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Nom(s) & Contact Accompagnateur(s) : </strong> <br>
                                                                <?php
                                                                // Récupérer la liste des accompagnateurs pour cette réservation
                                                                $accompagnateurs_res = recuperer_liste_accompagnateurs($reservation['num_res']);

                                                                // die(var_dump($accompagnateurs_res));

                                                                if (empty($accompagnateurs_res)) {
                                                                    echo '---';
                                                                } else {
                                                                    foreach ($accompagnateurs_res as $accompagnateur) {
                                                                        echo recuperer_info_accompagnateur($accompagnateur['num_acc'])['nom_acc'] . '   :  ' . recuperer_info_accompagnateur($accompagnateur['num_acc'])['contact'] . '<br>';
                                                                    }
                                                                }
                                                                ?>
                                                            </p>

                                                            <p>
                                                                <strong>N° de Chambre : </strong>
                                                                <?= $reservation['num_chambre'] ?>
                                                            </p>

                                                            <p>
                                                                <strong>Type de chambre: </strong>
                                                                <?php
                                                                // Récupérer le type de chambre pour cette réservation
                                                                $type_chambre = recuperer_type_chambre_pour_affichage($reservation['num_chambre']);

                                                                if ($type_chambre) {
                                                                    echo $type_chambre;
                                                                } else {
                                                                    echo 'Type de chambre inconnu';
                                                                }
                                                                ?>
                                                            </p>

                                                            <p>
                                                                <strong>Prix Total: </strong>
                                                                <?= $reservation['prix_total'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Formulaire de modification -->



                                            <!-- Button Modifier modal -->
                                            <i class="far fa-edit modifier-icon" style="margin-right: 20px;" data-bs-toggle="modal" data-bs-target="#exampleModal1-<?= $reservation['num_res']; ?>" data-accompagnateurs='<?php echo json_encode(recuperer_noms_et_contacts_accompagnateurs($reservation['num_res'])); ?>' title="Modifier la réservation">
                                            </i>

                                            <!-- Modal Modifier -->
                                            <div class="modal fade" id="exampleModal1-<?= $reservation['num_res']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier la réservation <?php echo $reservation['num_res']; ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= PATH_PROJECT ?>client/liste_des_reservations/traitement-modifier-reservations" method="POST">
                                                                <input type="hidden" name="reservation_id" value="<?php echo $reservation['num_res']; ?>">
                                                                <input type="hidden" name="type_chambre" value="<?php echo $type_chambre; ?>">
                                                                <input type="hidden" name="num_chambre" value="<?php echo $reservation['num_chambre']; ?>">

                                                                <?php
                                                                if (!empty($accompagnateurs_res)) {
                                                                    foreach ($accompagnateurs_res as $key => $accompagnateur) {
                                                                        $info = recuperer_info_accompagnateur($accompagnateur['num_acc']);
                                                                ?>
                                                                        <div class="row">
                                                                            <!-- Le champs nom_acc -->
                                                                            <div class="col-md-6 mb-3">
                                                                                <label for="modification-nom_acc-<?php echo $reservation['num_res']; ?>">
                                                                                    Nom de l'accompagnateur:
                                                                                </label>
                                                                                <input type="text" name="nom_acc[]" id="modification-nom_acc-<?php echo $reservation['num_res'] . '-' . $accompagnateur['num_acc']; ?>" class="form-control" value="<?= !empty($info['nom_acc']) ? $info['nom_acc'] : '' ?>" required>
                                                                            </div>

                                                                            <!-- Le champs contact_acc -->
                                                                            <div class="col-md-4 mb-3">
                                                                                <label for="modification-contact_acc-<?php echo $reservation['num_res']; ?>">
                                                                                    Contact:
                                                                                </label>
                                                                                <input type="text" name="contact_acc[]" id="modification-contact_acc-<?php echo $reservation['num_res'] . '-' . $accompagnateur['num_acc']; ?>" class="form-control" value="<?= !empty($info['contact']) ? $info['contact'] : '' ?>" required>
                                                                            </div>

                                                                            <div class="col-md-2 mb-3" style="display: flex; align-items: flex-end; justify-content: center;">
                                                                                <button type="button" class="btn btn-danger" onclick="supprimerAccompagnateur(this)" style="--bs-btn-color: #fff; --bs-btn-bg: #3b070c; --bs-btn-border-color: #3b070c; --bs-btn-hover-color: #fff; --bs-btn-hover-bg: #b30617; --bs-btn-hover-border-color: #b30617;">-</button>
                                                                            </div>
                                                                        </div>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>


                                                                <!-- Conteneur pour les nouveaux champs d'accompagnateurs -->
                                                                <div id="nouveaux-accompagnateurs-<?php echo $reservation['num_res']; ?>">
                                                                </div>


                                                                <!-- Bouton pour ajouter un accompagnateur -->
                                                                <button type="button" class="btn btn-success ajouter-accompagnateur" data-reservation-id="<?php echo $reservation['num_res']; ?>">
                                                                    +
                                                                </button>

                                                                <!-- Champ de saisie de mot de passe -->
                                                                <div class="form-group">
                                                                    <label for="passwordInput1-<?php echo $reservation['num_res']; ?>">Mot de passe :</label>
                                                                    <input type="password" name="password" id="passwordInput1-<?php echo $reservation['num_res']; ?>" class="form-control" placeholder="Veuillez entrer votre mot de passe" required>
                                                                </div>


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Button supprimer modal -->
                                            <a href="#" data-toggle="modal" data-target="#supprimer-reservation-<?= $reservation["num_res"]; ?>">
                                                <i class="far fa-trash-alt supprimer-icon"></i>
                                            </a>

                                            <!-- Modal supprimer -->
                                            <div class="modal fade" id="supprimer-reservation-<?= $reservation["num_res"]; ?>" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Supprimer la réservation du client <?= $reservation["num_res"]; ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Etes-vous sûr de vouloir supprimer la réservation du client <?= $reservation["num_clt"]; ?> ?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="<?= PATH_PROJECT ?>administrateur/reservations/traitement-supprimer-reservation/<?= $reservation['num_res'] ?>" class="btn btn-danger">Oui</a>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Fin Modal supprimer -->

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
                    // Aucune réservation n'a été trouvée, affichez le message en couleur noire
                ?>
                    <p style="color: black;">Aucune réservation n'a été trouvée!</p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</div>







<?php
// Supprime les messages de succès et d'erreur globaux de la session
unset($_SESSION['message-success-global'], $_SESSION['message-erreur-global']);

include './app/commum/footer.php'

?>
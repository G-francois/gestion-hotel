<?php

include './app/commum/header_client.php';

?>

<!-- Commencement du contenu de la page -->
<div class="container-fluid">
    <!-- Titre de la page -->
    <div class="pagetitle" style="padding-top: 126px;">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste des reservations</li>
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
                $liste_reservations = recuperer_liste_reservations($_SESSION['utilisateur_connecter_client']['id']);

                //die(var_dump($liste_reservations));

                // $liste_client = recuperer_liste_client();

                $liste_accompagnateur = [];

                if (!empty($liste_reservations)) {
                    foreach ($liste_reservations as $reservation) {
                        $liste_accompagnateur[] = recuperer_liste_accompagnateurs($reservation['num_res']);
                    }
                }

                if (!empty($liste_reservations)) {
                ?>
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">Date & Heure</th>
                                <th scope="col">Nom du Client</th>
                                <th scope="col">Date de Début</th>
                                <th scope="col">Date de Fin</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            // Parcours de la liste des chambres
                            foreach ($liste_reservations as $reservation) {
                            ?>
                                <tr>
                                    <td><?php echo $reservation['creer_le']; ?></td>
                                    <td><?php echo $_SESSION['utilisateur_connecter_client']['nom_utilisateur'] ?></td>
                                    <td>
                                        <?= $reservation['deb_occ'] ?>
                                    </td>
                                    <td>
                                        <?= $reservation['fin_occ'] ?>
                                    </td>


                                    <td>
                                        <!-- Button de détails modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#details-reservation-<?php echo $reservation['num_res']; ?>">
                                            Détails
                                        </button>

                                        <!-- Modal de détails -->
                                        <div class="modal fade" id="details-reservation-<?php echo $reservation['num_res']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p><strong>Accompagnateur(s) : </strong> <br>
                                                            <?php
                                                            // Récupérer la liste des accompagnateurs pour cette réservation
                                                            $accompagnateurs_res = recuperer_liste_accompagnateurs($reservation['num_res']);

                                                            if (empty($accompagnateurs_res)) {
                                                                echo '---';
                                                            } else {
                                                                foreach ($accompagnateurs_res as $accompagnateur) {
                                                                    echo recuperer_nom_accompagnateur($accompagnateur['num_acc'])['nom_acc'] . '<br>';
                                                                }
                                                            }
                                                            ?>
                                                        </p>

                                                        <p><strong>N° de Chambre : </strong>
                                                            <?= $reservation['num_chambre'] ?>
                                                        </p>

                                                        <p><strong>Type de chambre: </strong>
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

                                                        <p><strong>Prix Total: </strong>
                                                            <?= $reservation['prix_total'] ?>
                                                        </p>

                                                    </div>
                                                    <div class="modal-footer float-right">
                                                        <!-- Formulaire de désactivation -->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-modifier-<?php echo $reservation['num_res']; ?>">
                                                            Modifier
                                                        </button>

                                                        <!-- Modal de modification -->
                                                        <div class="modal fade" id="modal-modifier-<?php echo $reservation['num_res']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Modifier la réservation</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="traitement_modifier_reservation.php" method="POST">
                                                                            <input type="hidden" name="reservation_id" value="<?php echo $reservation['num_res']; ?>">
                                                                            <input type="hidden" name="type_chambre" value="<?php echo $type_chambre; ?>">
                                                                            <?php include 'modifier-reservations.php'; ?>
                                                                            <!-- ... Vos champs de formulaire ... -->
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Button de suppression modal -->
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimer-reservation-<?php echo $reservation['num_res']; ?>">
                                                            Supprimer
                                                        </button>

                                                        <!-- Modal de suppression -->
                                                        <div class="modal fade" id="supprimer-reservation-<?php echo $reservation['num_res']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Supprimer l'reservation <?php echo $reservation['nom_reservation']; ?></h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Etes-vous sûr de vouloir supprimer l'reservation <?php echo $reservation['nom_reservation']; ?> ?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="<?= PATH_PROJECT ?>administrateur/dashboard/traitement_suppression_compte_users" method="POST">
                                                                            <input type="hidden" name="reservation_id" value="<?php echo $reservation['num_res']; ?>">
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
                    // Affiche un message s'il n'y a aucune réservation trouvée
                    echo "Aucune réservation n'a été trouvée!";
                }
                ?>
            </div>
        </div>

    </div>
</div>

<!-- FIN -->

<script>
    $(document).ready(function() {
        $('.btn-modifier').click(function() {
            var reservationId = $(this).data('reservation-id');
            var typeChambre = "<?php echo $type_chambre; ?>"; // Récupérez le type de chambre de la réservation

            // Réinitialisez les champs du modal
            // ...

            // Afficher le modal de modification
            $('#modal-modifier-' + reservationId).modal('show');

            // Manipulez les champs en fonction du type de chambre
            if (typeChambre === 'Solo') {
                // Affichez et pré-remplissez les champs pour le type Solo
            } else if (typeChambre === 'Doubles') {
                // Affichez et pré-remplissez les champs pour le type Doubles
            } else if (typeChambre === 'Triples') {
                // Affichez et pré-remplissez les champs pour le type Triples
            } else if (typeChambre === 'Suite') {
                // Affichez et pré-remplissez les champs pour le type Suite
            }
        });
    });
</script>

<?php

include './app/commum/footer_client_icm.php';

?>
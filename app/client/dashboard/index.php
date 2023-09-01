<?php

include './app/commum/header_client.php';

?>

<!-- Commencement du contenu de la page -->
<div class="container-fluid">
    <!-- Titre de la page -->
    <div class="pagetitle" style="padding-top: 126px;">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>client/dashboard/index">Dashboard</a></li>
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

                                                            // die(var_dump($accompagnateurs_res));

                                                            if (empty($accompagnateurs_res)) {
                                                                echo '---';
                                                            } else {
                                                                foreach ($accompagnateurs_res as $accompagnateur) {
                                                                    echo recuperer_info_accompagnateur($accompagnateur['num_acc'])['nom_acc'] . '<br>';
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
                                                        <!-- Formulaire de modification -->
                                                        <?php if ($type_chambre !== 'Solo') { ?>
                                                            <!-- Button de modification modal -->
                                                            <button type="button" class="btn btn-warning btn-modifier" style="color: white;" data-toggle="modal" data-target="#modal-modifier-<?php echo $reservation['num_res']; ?>" data-accompagnateurs='<?php echo json_encode(recuperer_noms_et_contacts_accompagnateurs($reservation['num_res'])); ?>'>
                                                                Modifier
                                                            </button>
                                                        <?php } ?>


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
                                                                        <form action="<?= PATH_PROJECT ?>client/dashboard/traitement-modifier-reservations" method="POST" novalidate>
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
                                                                                            <label for="modification-nom_acc">
                                                                                                Nom de l'accompagnateur:
                                                                                            </label>
                                                                                            <input type="text" name="nom_acc[]" id="modification-nom_acc" class="form-control" value="<?= !empty($info['nom_acc']) ? $info['nom_acc'] : '' ?>">
                                                                                        </div>

                                                                                        <!-- Le champs contact_acc -->
                                                                                        <div class="col-md-6 mb-3">
                                                                                            <label for="modification-contact_acc">
                                                                                                Contact de l'accompagnateur:
                                                                                            </label>
                                                                                            <input type="text" name="contact_acc[]" id="modification-contact_acc" class="form-control" value="<?= !empty($info['contact']) ? $info['contact'] : '' ?>">
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

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <form action="<?= PATH_PROJECT ?>client/dashboard/traitement_supprimer_reservation" method="post" enctype="multipart/form-data"> <!-- Début du formulaire de modification du profil -->
                                                            <input type="hidden" name="reservation_id" value="<?php echo $reservation['num_res']; ?>">
                                                            <!-- Button de suppression modal -->
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimer-reservation-<?php echo $reservation['num_res']; ?>">
                                                                Supprimer
                                                            </button>

                                                            <!-- Modal de suppression -->
                                                            <div class="modal fade" id="supprimer-reservation-<?php echo $reservation['num_res']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Supprimer la réservationde la chambre <?php echo $reservation['num_chambre']; ?></h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="passwordImput" class="col-12 col-form-label" style="color: #070b3a;">Veuillez entrer votre mot de passe pour supprimer la réservation de la chambre <?php echo $reservation['num_chambre']; ?></label>
                                                                                <input type="password" name="password" id="passwordImput" class="form-control" placeholder="Veuillez entrer votre mot de passe" value="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" name="supprimer" class="btn btn-primary">Valider</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
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
            </div>

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
            var accompagnateursInfo = JSON.parse($(this).data('accompagnateurs'));

            // Réinitialisez les champs du modal
            // ...

            // Afficher le modal de modification
            $('#modal-modifier-' + reservationId).modal('show');

            // Manipulez les champs en fonction du type de chambre
            if (typeChambre === 'Doubles') {
                // Affichez et pré-remplissez les champs pour le type Doubles
            } else if (typeChambre === 'Triples') {
                // Affichez et pré-remplissez les champs pour le type Triples
            } else if (typeChambre === 'Suite') {
                // Affichez et pré-remplissez les champs pour le type Suite
            }
        });
    });
</script>


<!-- Ajoutez cette balise script à la fin de la page -->
<script>
    $(document).ready(function() {
        $('.ajouter-accompagnateur').click(function() {
            var reservationId = $(this).data('reservation-id');
            var nouveauChamp = `
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nom de l'accompagnateur</label>
                    <input type="text" name="nom_acc[]" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Contact de l'accompagnateur</label>
                    <input type="text" name="contact_acc[]" class="form-control">
                </div>
            </div>
        `;

            $('#nouveaux-accompagnateurs-' + reservationId).append(nouveauChamp);
        });
    });
</script>

<?php
// Supprimer les variables de session
unset($_SESSION['donnees-chambre-solo-modifier'], $_SESSION['erreurs-chambre-solo-modifier'], $_SESSION['message-success-global'], $_SESSION['message-erreur-global']);

include './app/commum/footer_client_icm.php';

?>


<?php
// Supprimer les variables de session
unset($_SESSION['donnees-chambre-solo-modifier'], $_SESSION['erreurs-chambre-solo-modifier'], $_SESSION['message-success-global'], $_SESSION['message-erreur-global']);

include './app/commum/footer_client_icm.php';

?>
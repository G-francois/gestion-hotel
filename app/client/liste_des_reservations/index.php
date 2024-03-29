<?php
if (!check_if_user_connected_client()) {
    header('location: ' . PATH_PROJECT . 'client/connexion/index');
    exit;
}
$include_client_header = true;
include('./app/commum/header_.php');

?>

<style>
    .card-body {
        color: black;
    }
</style>

<!-- Commencement du contenu de la page -->
<div class="container-fluid">
    <!-- Titre de la page -->
    <div class="pagetitle" style="padding-top: 126px;">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                                // Comparez la date de fin de séjour avec la date actuelle
                                $dateFinSejour = $reservation['fin_occ'];

                                if ($dateFinSejour < $currentDate) {
                                    // La date de fin de séjour est passée, affichez le bouton "Supprimer"
                                    $afficherBoutonSupprimer = true;
                                    // Ne pas afficher le bouton "Modifier"
                                    $afficherBoutonModifier = false;
                                } else {
                                    // La date de fin de séjour n'est pas encore passée, n'affichez pas le bouton "Supprimer"
                                    $afficherBoutonSupprimer = false;
                                    // Récupérer le type de chambre pour cette réservation
                                    $type_chambre = recuperer_type_chambre_pour_affichage($reservation['num_chambre']);
                                    // Afficher le bouton "Modifier" uniquement si le type de chambre n'est pas 'Solo'
                                    $afficherBoutonModifier = $type_chambre !== 'Solo';
                                }
                            ?>
                                <tr>
                                    <!-- <td><input type="checkbox" name="selection[]" value="<?= $reservation['num_res']; ?>"></td> Case à cocher pour la sélection -->
                                    <td><?php echo $reservation['num_res']; ?></td>
                                    <td><?php echo $reservation['creer_le']; ?></td>
                                    <td><?php echo $_SESSION['utilisateur_connecter_client']['nom_utilisateur'] ?></td>
                                    <td>
                                        <?= $reservation['deb_occ'] ?>
                                    </td>
                                    <td>
                                        <?= $reservation['fin_occ'] ?>
                                    </td>


                                    <td>


                                        <div style="display: flex; align-items: center;">
                                            <!-- Button Détails modal -->
                                            <i class="far fa-eye details-icon " style="margin-right: 20px;" data-bs-toggle="modal" data-bs-target="#exampleModal-<?= $reservation['num_res']; ?>" title="Voir les détails">
                                            </i>

                                            <!-- Modal Détails-->
                                            <div class="modal fade" id="exampleModal-<?= $reservation['num_res']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Détails de la réservation <?php echo $reservation['num_res']; ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php if ($type_chambre !== 'Solo') : ?>
                                                                <p><strong>Nom(s) & Contact Accompagnateur(s) </strong> <br>
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
                                                            <?php endif; ?>

                                                            <!-- <p><strong>Nom(s) & Contact Accompagnateur(s) </strong> <br>
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
                                                            </p> -->

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
                                            <?php
                                            if ($afficherBoutonModifier) {
                                                // La date de fin de séjour n'est pas passée et le type de chambre n'est pas 'Solo', affichez le bouton "Modifier"
                                            ?>


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
                                            <?php
                                            }

                                            if ($afficherBoutonSupprimer) {
                                                // La date de fin de séjour est passée, affichez le bouton "Supprimer"
                                            ?>

                                                <!-- Button supprimer modal -->
                                                <i class="far fa-trash-alt supprimer-icon" data-bs-toggle="modal" data-bs-target="#exampleModal2-<?= $reservation['num_res']; ?>" title="Supprimer la réservation">
                                                </i>

                                                <!-- Modal supprimer -->
                                                <div class="modal fade" id="exampleModal2-<?= $reservation['num_res']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer la réservation <?php echo $reservation['num_res']; ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= PATH_PROJECT ?>client/dashboard/traitement_supprimer_reservation" method="post" enctype="multipart/form-data">
                                                                    <!-- Début du formulaire de modification du profil -->
                                                                    <input type="hidden" name="reservation_id" value="<?php echo $reservation['num_res']; ?>">
                                                                    <div class="form-group">
                                                                        <label for="passwordImput2-<?php echo $reservation['num_res']; ?>" class="col-12 col-form-label" style="color: #070b3a;">Veuillez entrer votre mot de passe pour supprimer la réservation de la chambre <?php echo $reservation['num_chambre']; ?></label>
                                                                        <input type="password" name="password" id="passwordImput2-<?php echo $reservation['num_res']; ?>" class="form-control" placeholder="Veuillez entrer votre mot de passe" value="" required>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="supprimer" class="btn btn-primary">Valider</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            <?php
                                            }
                                            ?>
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

<!-- FIN -->


<!-- Ajoutez cette balise script à la fin de votre page pour gérer la sélection/désélection
<script>
    $(document).ready(function() {
        // Gérez la sélection/désélection de toutes les cases à cocher lorsque la case à cocher globale est cliquée
        $('#selectAllCheckbox').click(function() {
            var isChecked = $(this).prop('checked');
            $('input[name="selection[]"]').prop('checked', isChecked);
        });
    });
</script> -->


<script>
    $(document).ready(function() {
        // Gestionnaire de clic pour l'icône de détails
        $('.details-icon').click(function() {
            var targetModal = $(this).data('target');
            $(targetModal).modal('show');
        });

        // Gestionnaire de clic pour l'icône de modification
        $('.modifier-icon').click(function() {
            var targetModal = $(this).data('target');
            $(targetModal).modal('show');
        });

        // Gestionnaire de clic pour l'icône de suppression
        $('.supprimer-icon').click(function() {
            var targetModal = $(this).data('target');
            $(targetModal).modal('show');
        });
    });


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
                <label>Nom de l'accompagnateur <span class="text-danger">(*)</span> </label>
                <input type="text" name="nom_acc[]" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Contact <span class="text-danger">(*)</span> : </label>
                <input type="text" name="contact_acc[]" class="form-control" required>
            </div>

            <div class="col-md-2 mb-3" style="display: flex; align-items: flex-end; justify-content: center;">
                <button type="button" class="btn btn-danger" onclick="supprimerAccompagnateur(this)" style="--bs-btn-color: #fff; --bs-btn-bg: #3b070c; --bs-btn-border-color: #3b070c; --bs-btn-hover-color: #fff; --bs-btn-hover-bg: #b30617; --bs-btn-hover-border-color: #b30617;">-</button>
            </div>
        </div>
    `;

            $('#nouveaux-accompagnateurs-' + reservationId).append(nouveauChamp);

            // Ajoutez une validation pour le champ "Contact de l'accompagnateur" ici
            $('#nouveaux-accompagnateurs-' + reservationId + ' input[name="contact_acc[]"]').on('input', function() {
                var contactAcc = $(this).val();

                // Utilisez une expression régulière pour vérifier si contact_acc contient uniquement des nombres
                var numbersOnlyRegex = /^[0-9]+$/;

                if (!numbersOnlyRegex.test(contactAcc)) {
                    alert('Le champ Contact de l\'accompagnateur doit contenir uniquement des nombres.');
                    $(this).val(''); // Effacez la saisie incorrecte
                }
            });
        });
    });

    // Function to remove an accompagnateur
    function supprimerAccompagnateur(button) {
        $(button).closest('.row').remove();
    }
</script>


<!-- Ajoutez cette balise script à la fin de votre page pour gérer la sélection/désélection -->
<!-- <script>
    $(document).ready(function() {
        // Gérez la sélection/désélection de toutes les cases à cocher lorsque la case à cocher globale est cliquée
        $('#selectAllCheckbox').click(function() {
            var isChecked = $(this).prop('checked');

            // Parcourez toutes les lignes du tableau
            $('tbody tr').each(function() {
                var row = $(this);
                var dateFin = new Date(row.find('td:eq(6)').text()); // La septième colonne contient la date de fin (fin_occ)

                // Comparez la date de fin avec la date actuelle
                if (dateFin < new Date()) {
                    row.find('input[name="selection[]"]').prop('checked', isChecked);
                }
            });
        });

        // Désactivez la case à cocher globale lorsque toutes les cases à cocher individuelles ne sont pas cochées
        $('input[name="selection[]"]').click(function() {
            if ($('input[name="selection[]"]:checked').length === 0) {
                $('#selectAllCheckbox').prop('checked', false);
            }
        });
    });
</script> -->




<?php
// Supprimer les variables de session
unset($_SESSION['donnees-chambre-solo-modifier'], $_SESSION['erreurs-chambre-solo-modifier'], $_SESSION['message-success-global'], $_SESSION['message-erreur-global']);

$include_icm_footer = true;
include('./app/commum/footer_.php');
?>
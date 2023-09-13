<?php
if (!check_if_user_connected_client()) {
    header('location: ' . PATH_PROJECT . 'client/connexion/index');
    exit;
}
$include_client_header = true;
include('./app/commum/header_.php');

?>

<!-- Commencement du contenu de la page -->
<div class="container-fluid">
    <!-- Titre de la page -->
    <div class="pagetitle" style="padding-top: 126px;">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>client/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item active">Liste des commandes</li>
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

        <div class="card-body" style="color: black;">
            <div class="table-responsive">
                <?php
                // Récupérer la liste des réservations avec les informations du client et des accompagnateurs

                // $liste_reservations = recuperer_liste_reservations($_SESSION['utilisateur_connecter_client']['id']);

                $clientConnecteID = $_SESSION['utilisateur_connecter_client']['id'];

                $liste_commandes_client = recuperer_liste_commandes_client($clientConnecteID);

                if (!empty($liste_commandes_client)) {
                ?>
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">Date & Heure</th>
                                <th scope="col">Numéro de Commande</th>
                                <th scope="col">Numéro de Réservation</th>
                                <th scope="col">Liste des Repas</th>
                                <th scope="col">Prix Unitaire</th>
                                <th scope="col">Prix Total</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            // Parcours de la liste des chambres
                            foreach ($liste_commandes_client as $commande) {
                            ?>
                                <tr>
                                    <td><?php echo $commande['creer_le']; ?></td>
                                    <td><?php echo $commande['num_cmd']; ?></td>
                                    <td><?php echo $commande['num_res']; ?></td>
                                    <td>
                                        <?php
                                        $num_cmd = $commande['num_cmd'];

                                        // Récupérer la liste des repas pour cette commande
                                        $repas_commande = recuperer_liste_repas_par_commande($num_cmd);

                                        if (empty($repas_commande)) {
                                            echo '---';
                                        } else {
                                            foreach ($repas_commande as $repas) {
                                                $info_repas = recuperer_info_repas($repas['cod_repas']);
                                                if ($info_repas !== null) {
                                                    echo $info_repas['nom_repas'] . '<br>';
                                                } else {
                                                    echo 'Nom du repas non disponible<br>';
                                                }
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $num_cmd = $commande['num_cmd'];

                                        // Récupérer la liste des repas pour cette commande
                                        $repas_commande = recuperer_liste_repas_par_commande($num_cmd);

                                        if (empty($repas_commande)) {
                                            echo '---';
                                        } else {
                                            foreach ($repas_commande as $repas) {
                                                $info_repas = recuperer_info_repas($repas['cod_repas']);
                                                if ($info_repas !== null) {
                                                    echo $info_repas['pu_repas'] . '<br>';
                                                } else {
                                                    echo 'Nom du repas non disponible<br>';
                                                }
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $commande['prix_total']; ?></td>

                                    <td>
                                        <div class="modal-footer float-right">
                                            <!-- Formulaire de modification -->


                                            <form action="<?= PATH_PROJECT ?>client/dashboard/traitement_supprimer_commande" method="post" enctype="multipart/form-data">
                                                <!-- Début du formulaire de modification du profil -->
                                                <input type="hidden" name="commande_id" value="<?php echo $num_cmd ?>">

                                                <!-- Button de suppression modal -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#supprimer-commande-<?php echo $num_cmd ?>">
                                                    Supprimer
                                                </button>

                                                <!-- Modal de suppression -->
                                                <div class="modal fade" id="supprimer-commande-<?php echo $num_cmd ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Supprimer la commande <?php echo $num_cmd ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="passwordImput" class="col-12 col-form-label" style="color: #070b3a;">Veuillez entrer votre mot de passe </label>
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
                <input type="text" name="nom_acc[]" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Contact de l'accompagnateur</label>
                <input type="text" name="contact_acc[]" class="form-control" required>
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
</script>


<!-- Ajoutez cette balise script à la fin de votre page pour gérer la sélection/désélection -->
<script>
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
</script>




<?php
// Supprimer les variables de session
unset($_SESSION['donnees-chambre-solo-modifier'], $_SESSION['erreurs-chambre-solo-modifier'], $_SESSION['message-success-global'], $_SESSION['message-erreur-global']);

$include_icm_footer = true;
include('./app/commum/footer_.php');
?>
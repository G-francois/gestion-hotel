<?php
if (!check_if_user_connected_admin()) {
    header('location: ' . PATH_PROJECT . 'administrateur/connexion/index');
    exit;
}

include './app/commum/header.php';

include './app/commum/aside.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Réservations</h1>
    <p class="mb-4">Imprimer la liste des réservations <a target="_blank" href="#">Liste des réservations</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listes des réservations</h6>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                    <?php
                    // Récupérer la liste des réservations avec les informations du client et des accompagnateurs
                    $liste_reservations = recuperer_liste_des_reservations();

                    //die(var_dump($liste_reservations));

                    $liste_client = recuperer_liste_client();

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
                                    <th scope="col">Date de Réservation</th>
                                    <th scope="col">Nom du Client</th>
                                    <th scope="col">Date de Début</th>
                                    <th scope="col">Date de Fin</th>
                                    <th scope="col">Accompagnateurs</th>
                                    <th scope="col">Type de chambre</th>
                                    <th scope="col">Prix Total</th>
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
                                            <?php
                                            $accompagnateurs = recuperer_liste_accompagnateurs($reservation['num_res']);

                                            if (empty($accompagnateurs)) {
                                                echo '---';
                                            } else {
                                                foreach ($accompagnateurs as $accompagnateurs) {
                                                    echo recuperer_nom_accompagnateur($accompagnateurs['num_acc'])['nom_acc'] . '<br>';
                                                }
                                            }

                                            ?>
                                        </td>

                                        <td>
                                            <?= $reservation['type_chambre'] ?>
                                        </td>

                                        <td>
                                            <?= $reservation['prix_total'] ?>
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
<!-- /.container-fluid -->


<?php

include './app/commum/footer.php'

?>
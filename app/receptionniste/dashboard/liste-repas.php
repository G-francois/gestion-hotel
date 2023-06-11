<?php
if (!check_if_user_connected_recept()) {
    header('location: ' . PATH_PROJECT . 'receptionniste/connexion/index');
    exit;
}

include './app/commum/header.php';

include './app/commum/aside_recept.php';

$liste_repas = recuperer_liste_repas();
?>

<div class="pagetitle ml-2 mr-2">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>receptionniste/dashboard/index">Dashboard</a></li>
            <li class="breadcrumb-item active">Listes des chambres</li>
        </ol>
    </nav>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4  ml-2 mr-2">

    <div class="card-body">
        <div class="table-responsive">
            <?php if (isset($liste_repas) && !empty($liste_repas)) {
            ?>
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                    <thead>
                        <tr>
                            <th>Code type </th>
                            <th>Libellés</th>
                            <th>Prix</th>
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
                            <?php
                        }

                            ?>
                            </tr>
                    </tbody>
                </table>
            <?php
            } else {

                echo "Aucun repas n'a été trouvés!!!";
            }
            ?>
        </div>

    </div>

</div>



<?php

include './app/commum/footer.php'

?>
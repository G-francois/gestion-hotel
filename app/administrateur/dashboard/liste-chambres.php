<?php
include './app/commum/header.php'
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chambres</h1>
    <p class="mb-4">Imprimer la liste des Chambres <a target="_blank" href="#">Liste des chambres</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listes des chambres</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <?php
                if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
                ?>
                    <div class="alert alert-primary" style="color: white; background-color: #1cc88a; border-color: snow;">
                        <?= $_SESSION['success'] ?>
                    </div>
                <?php
                }
                ?>
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Code type </th>
                            <th>Libellés</th>
                            <th>Prix Unitaire</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>A101</td>
                            <td>Solo</td>
                            <td>290 €</td>
                            <td><button type="" class="btn btn-warning">Réservé</button></td>
                            <td>
                                <button type="reset" class="btn btn-danger">Supprimer</button>
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </td>
                        </tr>

                        <tr>
                            <td>A102</td>
                            <td>Solo</td>
                            <td>290 €</td>
                            <td><button type="submit" class="btn btn-info">Réserver une chambre</button></td>
                            <td>
                                <button type="reset" class="btn btn-danger">Supprimer</button>
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </td>
                        </tr>

                        <tr>
                            <td>A103</td>
                            <td>Solo</td>
                            <td>290 €</td>
                            <td><button type="" class="btn btn-warning">Réservé</button></td>
                            <td>
                                <button type="reset" class="btn btn-danger">Supprimer</button>
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </td>
                        </tr>

                        <tr>
                            <td>B101</td>
                            <td>Doubles</td>
                            <td>350 €</td>
                            <td><button type="submit" class="btn btn-info">Réserver une chambre</button></td>
                            <td>
                                <button type="reset" class="btn btn-danger">Supprimer</button>
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </td>
                        </tr>

                        <tr>
                            <td>B102</td>
                            <td>Doubles</td>
                            <td>350 €</td>
                            <td><button type="submit" class="btn btn-info">Réserver une chambre</button></td>
                            <td>
                                <button type="reset" class="btn btn-danger">Supprimer</button>
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </td>
                        </tr>

                        <tr>
                            <td>B103</td>
                            <td>Doubles</td>
                            <td>350 €</td>
                            <td><button type="submit" class="btn btn-info">Réserver une chambre</button></td>
                            <td>
                                <button type="reset" class="btn btn-danger">Supprimer</button>
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->




<?php

include './app/commum/footer.php'

?>
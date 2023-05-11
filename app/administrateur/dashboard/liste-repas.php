<?php
include './app/commum/header.php'
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Repas</h1>
    <p class="mb-4">Imprimer la liste des repas <a target="_blank" href="#">Liste des repas</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listes des repas</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Code type </th>
                            <th>Libellés</th>
                            <th>Prix</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>A</td>
                            <td>Attiéké</td>
                            <td>5.95 €</td>
                            <td><button type="submit" class="btn btn-info">Disponible</button></td>
                            <td>
                                <button type="reset" class="btn btn-danger">Supprimer</button>
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </td>
                        </tr>

                        <tr>
                            <td>B</td>
                            <td>Baril de pain</td>
                            <td>6.95 €</td>
                            <td><button type="submit" class="btn btn-info">Disponible</button></td>
                            <td>
                                <button type="reset" class="btn btn-danger">Supprimer</button>
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </td>
                        </tr>

                        <tr>
                            <td>G</td>
                            <td>Gâtaeu au Crabe</td>
                            <td>7.95 €</td>
                            <td><button type="submit" class="btn btn-warning">Rupture</button></td>
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


<?php

include './app/commum/footer.php'

?>
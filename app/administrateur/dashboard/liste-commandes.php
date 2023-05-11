<?php
include './app/commum/header.php'
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Commandes</h1>
    <p class="mb-4">Imprimer la liste des commandes <a target="_blank" href="#">Liste des commandes</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listes des commandes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th data-sortable="true" data-field="Date de commande">Date de commande</th>
                            <th data-sortable="true" data-field="Numéros de réservation">Numéros de réservation</th>
                            <th data-sortable="true" data-field="Nom du client">Nom du client</th>
                            <th data-sortable="true" data-field="Actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01/12/22</td>
                            <td>001</td>
                            <td>Tiger Nixon</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                                    Détails
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p><strong>Nom des repas commandés : </strong>Attiékê; Nouïlle</p>
                                                <p><strong>Numéros de chambre(s) : </strong>B102, A101</p>
                                                <p><strong>Quantité de repas commandés : </strong>10</p>
                                                <p><strong>Montant dû : </strong>35000 €</p>
                                            </div>
                                            <div class="modal-footer float-right">
                                                <button type="reset" class="btn btn-danger">Supprimer</button>
                                                <button type="submit" class="btn btn-success">Modifier</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
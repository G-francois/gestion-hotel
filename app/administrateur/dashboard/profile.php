<?php
include './app/commum/header.php'
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Profile Utilisateur</h2>
    </div>

    <div class="main-body">

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/soutenancepublic/images/profile.jpg" alt="Admin" class="rounded-circle" width="180">
                            <div class="mt-3">
                                <h4>Douglas McGee</h4>
                                <p class="text-secondary mb-1">Administrateur</p>
                                <p class="text-muted font-size-sm">SOUS LES COCOTIERS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nom complet</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Douglas McGee
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Douglas.McGee@gmail.com
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Sexe</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Masculin
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Date de naissance</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                24/02/2014
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info " target="__blank" href="/soutenance/administrateur/dashboard/edit-profile">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

<?php

include './app/commum/footer.php'

?>
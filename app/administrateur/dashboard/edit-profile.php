<?php
include './app/commum/header.php'
?>

<div class="container">
    <div class="main-body">
        <h2>Informations personnelles</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/soutenance/public/images/profile.jpg" alt="Admin" class="rounded-circle p-1 " width="130">
                            <div class="mt-3">
                                <h4>Douglas McGee</h4>
                                <p class="text-secondary mb-1">Administrateur</p>
                                <p class="text-muted font-size-sm">SOUS LES COCOTIERS</p>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-12 text-secondary">
                                <label class="form-label" for="customFile">Changer la photo de profile</label>
                                <input type="file" class="form-control" id="customFile" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Prénom(s)</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="Douglas">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nom</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="McGee">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Sexe</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="Masculin">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Date de naissance</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="24/02/2014">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nom d'utilisateur</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="Douglas McGee">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="Douglas.McGee@gmail.com">
                            </div>
                        </div>

                        <div class="card-footer float-right" style="background-color: #ffffff; border-top: 0px solid #ffffff;">
                            <button type="reset" class="btn btn-danger">Annuler</button>
                            <button type="submit" class="btn btn-success ">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-12 mt-5">
                <h5>Voulez-vous modifier votre mot de passe ?</h5>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mot de passe</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="Entrer le nouveau mot de passe">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0"> Retaper mot de passe</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="Retaper le nouveau mot de passe">
                            </div>
                        </div>
                        <div class="card-footer float-right" style="background-color: #ffffff; border-top: 0px solid #ffffff;">
                            <button type="reset" class="btn btn-danger">Annuler</button>
                            <button type="submit" class="btn btn-success ">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of Content Wrapper -->
    </div>
</div>

<?php

include './app/commum/footer.php'

?>
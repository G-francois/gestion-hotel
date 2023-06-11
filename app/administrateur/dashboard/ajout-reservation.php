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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajouter une réservation </h1>
    </div>

    <form class="form-horizontal" action="?requette=ajout-auteur-traitement" method="POST">
        <div class="card-body">

            <!-- Le champs nom & prénom -->
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="nom-auteur" class="col-sm-4 col-form-label">Nom du client</label>
                    <input type="text" name="nom" id="inscription-nom" class="form-control" placeholder="Veuillez entrer le nom du client" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
                </div>
                <div class="col-sm-6">
                    <label for="nom-auteur" class="col-sm-5 col-form-label">Nom de l'accompagnateur</label>
                    <input type="text" name="prenom" id="inscription-prenom" class="form-control" placeholder="Veuillez entrer le(s) nom(s) de l'accompagnateur par rapport au type de chambre" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
                </div>
            </div>

            <!-- Le champs date -->
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="nom-auteur" class="col-sm-4 col-form-label">Date de début</label>
                    <input type="date" name="date-naissance" id="inscription-date-naissance" class="form-control" placeholder="Veuillez entrer votre date de naissance" value="<?= (isset($donnees["date-naissance"]) && !empty($donnees["date-naissance"])) ? $donnees["date-naissance"] : ""; ?>" required>
                </div>

                <div class="col-sm-6">
                    <label for="nom-auteur" class="col-sm-4 col-form-label">Date de fin</label>
                    <input type="date" name="date-naissance" id="inscription-date-naissance" class="form-control" placeholder="Veuillez entrer votre date de naissance" value="<?= (isset($donnees["date-naissance"]) && !empty($donnees["date-naissance"])) ? $donnees["date-naissance"] : ""; ?>" required>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="nom-auteur" class="col-sm-4 col-form-label">Type de chambre</label>
                    <div class="input-group">
                        <select class="form-control" name="type" id="type">
                            <option value="" disabled selected>Sélectionnez le type de chambre</option>
                            <option value="admin">Solo</option>
                            <option value="user">Doubles</option>
                            <option value="admin">Triples</option>
                            <option value="user">Suites</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="nom-auteur" class="col-sm-4 col-form-label">Numéros de chambre</label>
                    <div class="input-group">
                        <select class="form-control" name="type" id="type">
                            <option value="" disabled selected>Veuillez choisir le numéro de chambre</option>
                            <option value="">A-101</option>
                            <option value="">A-102</option>
                            <option value="">A-103</option>
                            <option value="">A-104</option>
                            <option value="">B-101</option>
                            <option value="">B-102</option>
                            <option value="">B-103</option>
                            <option value="">B-104</option>
                            <option value="">C-101</option>
                            <option value="">C-102</option>
                            <option value="">C-103</option>
                            <option value="">C-104</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <h5 style="font-weight: bold">Total Days : <span id="staying_day">0</span> Days</h5>
                <h5 style="font-weight: bold">Price: /-</h4>
                    <h5 style="font-weight: bold">Total Amount : <span id="total_price">0</span> /-</h5>
            </div>

        </div>

        <div class="card-footer float-right">
            <button type="reset" class="btn btn-danger">Annuler</button>
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>

    </form>
</div>


<?php

include './app/commum/footer.php'

?>
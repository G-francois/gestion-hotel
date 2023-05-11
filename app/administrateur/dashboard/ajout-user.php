<?php
include './app/commum/header.php'
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajouter un utilisateur </h1>
    </div>

    <form action="/soutenance/administrateur/dashboard/ajout-user--traitement" method="post" class="user">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <!-- Le champs nom -->
                <label for="inscription-nom">Nom:
                    <span class="text-danger">(*)</span>
                </label>
                <input type="text" name="nom" id="inscription-nom" class="form-control" placeholder="Veuillez entrer votre nom" value="<?php if (isset($donnees["nom"]) && !empty($donnees["nom"])) {
                                                                                                                                            echo $donnees["nom"];
                                                                                                                                        } else {
                                                                                                                                            echo '';
                                                                                                                                        } ?>">
                <span class="text-danger">
                    <?php
                    if (isset($erreurs["nom"]) && !empty($erreurs["nom"])) {
                        echo $erreurs["nom"];
                    }
                    ?>
                </span>
            </div>


            <!-- Le champs prénom -->
            <div class="col-sm-6">
                <label for="inscription-prenom">Prénom(s):
                    <span class="text-danger">(*)</span>
                </label>
                <input type="text" name="prenom" id="inscription-prenom" class="form-control" placeholder="Veuillez entrer votre prénom" value="<?php if (isset($donnees["prenom"]) && !empty($donnees["prenom"])) {
                                                                                                                                                    echo $donnees["prenom"];
                                                                                                                                                } else {
                                                                                                                                                    echo '';
                                                                                                                                                } ?>">
                <span class="text-danger">
                    <?php
                    if (isset($erreurs["prenom"]) && !empty($erreurs["prenom"])) {
                        echo $erreurs["prenom"];
                    }
                    ?>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6">
                <!-- Le champs date de naissance & sexe -->
                <label for="inscription-date-naissance">Date de naissance:
                    <span class="text-danger">(*)</span>
                </label>
                <input type="date" name="date-naissance" id="inscription-date-naissance" class="form-control" value="<?php if (isset($donnees["date-naissance"]) && !empty($donnees["date-naissance"])) {
                                                                                                                            echo $donnees["date-naissance"];
                                                                                                                        } else {
                                                                                                                            echo '';
                                                                                                                        }  ?>">
                <span class="text-danger">
                    <?php
                    if (isset($erreurs["date-naissance"]) && !empty($erreurs["date-naissance"])) {
                        echo $erreurs["date-naissance"];
                    }
                    ?>
                </span>
            </div>

            <!-- Le champs sexe -->
            <div class="col-sm-6 mt-3">
                <label for="inscription-sexe">Sexe: <br>
                    <div class="form-group clearfix d-inline-flex pl-5">
                        <div class="icheck-primary d-inline">
                            <input type="radio" name="sexe" checked="" id="sexe-m" value="M">
                            <label for="sexe-m">M</label>
                        </div>

                        <div class="icheck-primary d-inline pl-5">
                            <input type="radio" name="sexe" checked="" id="sexe-f" value="F">
                            <label for="sexe-f">F</label>
                        </div>
                    </div>
                </label>
            </div>
            <span class="text-danger">
                <?php
                if (isset($erreurs["sexe"]) && !empty($erreurs["sexe"])) {
                    echo $erreurs["sexe"];
                }
                ?>
            </span>
        </div>


        <div class="form-group row">
            <!-- Le champs type d'utilisateur -->
            <div class="col-sm-6">
                <label for="inscription-type">Profile Utilisateur: <br>
                    <div class="form-group clearfix d-inline-flex pl-5">
                        <div class="icheck-primary d-inline">
                            <input type="radio" name="profile" checked="" id="profile-a" value="Administrateur">
                            <label for="profile-a">Administrateur</label>
                        </div>

                        <div class="icheck-primary d-inline pl-5">
                            <input type="radio" name="profile" checked="" id="profile-r" value="Réceptionniste">
                            <label for="profile-r">Receptionniste</label>
                        </div>

                        <div class="icheck-primary d-inline pl-5">
                            <input type="radio" name="profile" checked="" id="profile-r" value="Client">
                            <label for="profile-c">Client</label>
                        </div>
                    </div>
                </label>
            </div>
            <span class="text-danger">
                <?php
                if (isset($erreurs["type"]) && !empty($erreurs["type"])) {
                    echo $erreurs["type"];
                }
                ?>
            </span>


            <!-- Le champs email -->
            <div class="form-group">
                <input type="email" name="email" id="inscription-email" class="form-control" placeholder="Veuiller entrer votre address email" value="<?= (isset($donnees["email"]) && !empty($donnees["email"])) ? $donnees["email"] : ""; ?>" required>
            </div>

            <!-- Le champs nom d'utilisateur -->
            <div class="form-group">
                <input type="text" name="nom-utilisateur" id="inscription-nom-utilisateur" class="form-control" placeholder="Veuillez entrer votre nom d'utilisateur" value="<?= (isset($donnees["nom-utilisateur"]) && !empty($donnees["nom-utilisateur"])) ? $donnees["nom-utilisateur"] : ""; ?>" required>
            </div>

            <!-- Le champs mot de passe -->
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="mot-passe" id="inscription-mot-passe" class="form-control" placeholder="Veuillez entrer votre mot de passe" value="<?= (isset($donnees["mot-passe"]) && !empty($donnees["mot-passe"])) ? $donnees["mot-passe"] : ""; ?>" required>
                </div>
                <!-- Le champs retapez mot de passe -->
                <div class="col-sm-6">
                    <input type="password" name="retapez-mot-passe" id="inscription-retapez-mot-passe" class="form-control" placeholder="retaper votre mot de passe" value="<?= (isset($donnees["retapez-mot-passe"]) && !empty($donnees["retapez-mot-passe"])) ? $donnees["retapez-mot-passe"] : ""; ?>" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Inscription</button>
    </form>

</div>
<!-- End of Content Wrapper -->


<?php

include './app/commum/footer.php'

?>
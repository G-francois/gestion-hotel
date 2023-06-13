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
    
    <div class="pagetitle ">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= PATH_PROJECT ?>administrateur/dashboard/index">Dashboard</a></li>
                <li class="breadcrumb-item active">Ajouter un utilisateur</li>
            </ol>
        </nav>
    </div>

    <?php
    if (isset($_SESSION['ajout-message-success-global']) && !empty($_SESSION['ajout-message-success-global'])) {
    ?>
        <div class="alert alert-primary" style="color: white; background-color: #2653d4; text-align:center; border-color: snow;">
            <?= $_SESSION['ajout-message-success-global'] ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['ajout-message-erreur-global']) && !empty($_SESSION['ajout-message-erreur-global'])) {
    ?>
        <div class="alert alert-primary" style="color: white; background-color: #9f0808; text-align:center; border-color: snow;">
            <?= $_SESSION['ajout-message-erreur-global'] ?>
        </div>
    <?php
    }
    ?>

    <form action="<?= PATH_PROJECT ?>administrateur/dashboard/ajout-user-traitement" method="post" class="user" novalidate>
        <div class="form-group row">
            <!-- Le champ nom -->
            <div class="col-sm-6  mb-2">
                <label for="inscription-nom">
                    Nom:
                    <span class="text-danger">(*)</span>
                </label>
                <input type="text" name="nom" id="inscription-nom" class="form-control" placeholder="Veuillez entrer votre nom" value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ''; ?>" required>
                <?php if (isset($erreurs["nom"]) && !empty($erreurs["nom"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["nom"]; ?>
                    </span>
                <?php } ?>
            </div>

            <!-- Le champ prénom -->
            <div class="col-sm-6 mb-2">
                <label for="inscription-prenom">
                    Prénoms:
                    <span class="text-danger">(*)</span>
                </label>
                <input type="text" name="prenom" id="inscription-prenom" class="form-control" placeholder="Veuillez entrer vos prénoms" value="<?= (isset($donnees["prenom"]) && !empty($donnees["prenom"])) ? $donnees["prenom"] : ''; ?>" required>
                <?php if (isset($erreurs["prenom"]) && !empty($erreurs["prenom"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["prenom"]; ?>
                    </span>
                <?php } ?>
            </div>
        </div>

        <div class="form-group row">
            <!-- Le champs sexe -->
            <div class="col-sm-6  mb-2">
                <label for="sexe">
                    Sexe :
                    <span class="text-danger">(*)</span>
                </label>
                <div style="padding-left: 0px; padding-right: 0px;">
                    <select class="sexe form-control" id="sexe" name="sexe">
                        <option value="" disabled selected>Sélectionnez le sexe</option>
                        <option value="Masculin">Masculin</option>
                        <option value="Féminin">Féminin</option>
                    </select>
                    <?php if (isset($erreurs["sexe"]) && !empty($erreurs["sexe"])) { ?>
                        <span class="text-danger">
                            <?php echo $erreurs["sexe"]; ?>
                        </span>
                    <?php } ?>
                </div>
            </div>

            <!-- Le champ téléphone -->
            <div class="col-sm-6 mb-2">
                <label for="inscription-telephone">
                    Téléphone:
                    <span class="text-danger">(*)</span>
                </label>
                <input type="text" name="telephone" id="inscription-telephone" class="form-control" placeholder="Veuillez entrer votre numéro de téléphone" value="<?= (isset($donnees["telephone"]) && !empty($donnees["telephone"])) ? $donnees["telephone"] : ''; ?>" required>
                <?php if (isset($erreurs["telephone"]) && !empty($erreurs["telephone"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["telephone"]; ?>
                    </span>
                <?php } ?>
            </div>
        </div>

        <div class="form-group row">
            <!-- Le champ email -->
            <div class="col-sm-6 mb-2">
                <label for="inscription-email">
                    Adresse mail:
                    <span class="text-danger">(*)</span>
                </label>
                <input type="email" name="email" id="inscription-email" class="form-control" placeholder="Veuillez entrer votre adresse mail" value="<?= (isset($donnees["email"]) && !empty($donnees["email"])) ? $donnees["email"] : ''; ?>" required>
                <?php if (isset($erreurs["email"]) && !empty($erreurs["email"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["email"]; ?>
                    </span>
                <?php } ?>
            </div>

            <!-- Le champ nom d'utilisateur -->
            <div class="col-sm-6 mb-2">
                <label for="inscription-nom-utilisateur">
                    Nom d'utilisateur:
                    <span class="text-danger">(*)</span>
                </label>
                <input type="text" name="nom-utilisateur" id="inscription-nom-utilisateur" class="form-control" placeholder="Veuillez entrer votre nom d'utilisateur" value="<?= (isset($donnees["nom-utilisateur"]) && !empty($donnees["nom-utilisateur"])) ? $donnees["nom-utilisateur"] : ''; ?>" required>
                <?php if (isset($erreurs["nom-utilisateur"]) && !empty($erreurs["nom-utilisateur"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["nom-utilisateur"]; ?>
                    </span>
                <?php } ?>
            </div>
        </div>

        <div class="form-group row ">
            <!-- Le champs type d'utilisateur -->
            <div class="col-sm-6  mb-2">
                <label for="profile">
                    Profile :
                    <span class="text-danger">(*)</span>
                </label>
                <div style="padding-left: 0px; padding-right: 0px;">
                    <select class="sexe form-control" id="profile" name="profil">
                        <option value="" disabled selected>Sélectionnez le type d'utilisateur</option>
                        <option value="ADMINISTRATEUR">ADMINISTRATEUR</option>
                        <option value="RECEPTIONNISTE">RECEPTIONNISTE</option>
                        <option value="CLIENT">CLIENT</option>
                    </select>
                    <?php if (isset($erreurs["profil"]) && !empty($erreurs["profil"])) { ?>
                        <span class="text-danger">
                            <?php echo $erreurs["profil"]; ?>
                        </span>
                    <?php } ?>
                </div>
            </div>

            <!-- Le champ mot de passe -->
            <div class="col-sm-6 mb-2">
                <label for="inscription-mot-passe">
                    Mot de passe:
                    <span class="text-danger">(*)</span>
                </label>
                <input type="password" name="mot-passe" id="inscription-mot-passe" class="form-control" placeholder="Veuillez entrer votre mot de passe" value="<?= (isset($donnees["mot-passe"]) && !empty($donnees["mot-passe"])) ? $donnees["mot-passe"] : ''; ?>" required>
                <?php if (isset($erreurs["mot-passe"]) && !empty($erreurs["mot-passe"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["mot-passe"]; ?>
                    </span>
                <?php } ?>
            </div>
        </div>

        <div class="form-group row ">
            <!-- Le champ retapez mot de passe -->
            <div class="col-sm-6 mb-2">
                <label for="inscription-retapez-mot-passe">
                    Retaper mot de passe:
                    <span class="text-danger">(*)</span>
                </label>
                <input type="password" name="retapez-mot-passe" id="inscription-retapez-mot-passe" class="form-control" placeholder="Veuillez retaper votre mot de passe" value="<?= (isset($donnees["retapez-mot-passe"]) && !empty($donnees["retapez-mot-passe"])) ? $donnees["retapez-mot-passe"] : ''; ?>" required>
                <?php if (isset($erreurs["retapez-mot-passe"]) && !empty($erreurs["retapez-mot-passe"])) { ?>
                    <span class="text-danger">
                        <?php echo $erreurs["retapez-mot-passe"]; ?>
                    </span>
                <?php } ?>
            </div>

            <!-- Le boutton ajouter -->
            <div class="col-sm-6" style="margin-top: 31px;">
                <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
            </div>
        </div>
    </form>

</div>
<!-- End of Content Wrapper -->


<?php
unset($_SESSION['ajout-message-success-global'], $_SESSION['ajout-message-erreur-global'], $_SESSION['donnees-utilisateur'], $_SESSION['erreurs-utilisateur']);

include './app/commum/footer.php'

?>
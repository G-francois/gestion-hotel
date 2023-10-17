<?php
$include_icm_header = true;
include('./app/commum/header_.php');
?>


<div class="container" style="margin-top: 145px;">
    <div class="row justify-content-center;" style="color:black; justify-content:center;">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg ">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <?php
                            if (isset($_SESSION['validation-compte-message-success']) && !empty($_SESSION['validation-compte-message-success'])) {
                            ?>
                                <div class="alert alert-primary" style="color: white; background-color: #2653d4; text-align:center; border-color: snow;">
                                    <?= $_SESSION['validation-compte-message-success'] ?>
                                </div>
                            <?php
                            }

                            if (isset($_SESSION['validation-compte-message-erreur']) && !empty($_SESSION['validation-compte-message-erreur'])) {
                            ?>
                                <div class="alert alert-primary" style="color: white; text-align:center; background-color: red; border-color: snow;">
                                    <?= $_SESSION['validation-compte-message-erreur'] ?>
                                </div>
                            <?php
                            }
                            ?>

                            <div class="p-5">

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Nouveau mot de passe</h1>
                                </div>


                                <form action="<?= PATH_PROJECT ?>client/mot_de_passe/traitement_nv_mot_passe" method="post" class="user">

                                    <!-- Le champ mot de passe -->
                                    <div class="form-group">
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

                                    <!-- Le champ retapez mot de passe -->
                                    <div class="form-group">
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

                                    <button type="submit" class="btn btn-primary btn-block">Enrégistrer</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= PATH_PROJECT ?>client/connexion">
                                        Vous avez déjà un compte ? Connectez-vous!
                                    </a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= PATH_PROJECT ?>client/inscription">
                                        Créez un compte !
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<?php
$include_icm_footer = true;
include('./app/commum/footer_.php');
?>
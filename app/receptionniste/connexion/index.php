<?php
include './app/commum/header_admin_icm.php';
?>


<div class="container" style="margin-top: 120px;">
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image2"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <?php
                                if (isset($_SESSION['inscription-message-success-global']) && !empty($_SESSION['inscription-message-success-global'])) {
                                ?>
                                    <div class="alert alert-primary" style="color: white; background-color: #2653d4; text-align:center; border-color: snow;">
                                        <?= $_SESSION['inscription-message-success-global'] ?>
                                    </div>
                                <?php
                                }
                                ?>

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bienvenue <?= isset($_SESSION['nom-utilisateur-inscrit']) ?  $_SESSION['nom-utilisateur-inscrit'][1] . " " . $_SESSION['nom-utilisateur-inscrit'][0] : '' ?></h1>
                                </div>

                                <form action="<?= PATH_PROJECT ?>receptionniste/connexion/traitement" method="post" class="user">
                                    <!-- Le champs email ou nom utilisateur-->
                                    <div class="form-group">
                                        <label for="inscription-email">
                                            Email ou Nom d'utilisateur:
                                            <span class="text-danger">(*)</span>
                                        </label>
                                        <input type="text" name="email-nom-utilisateur" id="inscription-email" class="form-control" placeholder="Entrer votre adresse mail ou nom d'utilisateur" value="<?= (isset($donnees["email-nom-utilisateur"]) && !empty($donnees["email-nom-utilisateur"])) ? $donnees["email-nom-utilisateur"] : ''; ?>" required>
                                        <?php if (isset($erreurs["email-nom-utilisateur"]) && !empty($erreurs["email-nom-utilisateur"])) { ?>
                                            <span class="text-danger">
                                                <?php echo $erreurs["email-nom-utilisateur"]; ?>
                                            </span>
                                        <?php } ?>
                                    </div>

                                    <!-- Le champs mot de passe -->
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

                                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= PATH_PROJECT ?>/receptionniste/mot_de_passe">Mot de passe oublié ?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= PATH_PROJECT ?>/receptionniste/inscription">Créez un compte !</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
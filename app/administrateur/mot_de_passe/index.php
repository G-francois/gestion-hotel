<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sous les Cocotiers - Register</title>

    <!-- Custom fonts for this template-->
    <link href="/soutenancepublic/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/soutenancepublic/css/sb-admin-2.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="margin-top: 120px; ">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image1"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Vous avez oublié votre mot de passe ?</h1>
                                        <p class="mb-4">
                                            Nous comprenons, des choses arrivent. Entrez simplement votre adresse e-mail
                                            ci-dessous et nous vous enverrons un lien pour réinitialiser votre mot de passe!</p>
                                    </div>


                                    <form class="user">
                                        <!-- Le champs email -->
                                        <div class="form-group">
                                            <input type="text" name="email-nom-utilisateur" id="inscription-email" class="form-control" placeholder="Veuillez entrer votre address email" value="<?= (isset($donnees["Entrer votre adresse email ou nom-utilisateur"]) && !empty($donnees["email-nom-utilisateur"])) ? $donnees["email-nom-utilisateur"] : ""; ?>" required>
                                        </div>

                                        <span class="text-danger">

                                        </span>

                                        <button type="submit" class="btn btn-primary btn-block">Réinitialiser le mot de passe</button>

                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/soutenance/administrateur/mot_de_passe">Mot de passe oublié ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/soutenance/administrateur/connexion">Vous avez déjà un compte ? Connectez-vous!</a>
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
    session_destroy();

    ?>


    <!-- Template Main JS File -->
    <script src="/soutenancepublic/js/main.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="/soutenancepublic/vendor/jquery/jquery.min.js"></script>
    <script src="/soutenancepublic/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/soutenancepublic/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/soutenancepublic/js/sb-admin-2.min.js"></script>

</body>

</html>
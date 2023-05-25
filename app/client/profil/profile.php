<?php

if (isset($_SESSION['utilisateur_connecter']['0']['id']) and !empty($_SESSION['utilisateur_connecter']['0']['id'])) {
}

if (isset($_SESSION['changement-erreurs']) && !empty($_SESSION['changement-erreurs'])) {
  $erreurs = $_SESSION['changement-erreurs'];
}

if (isset($_SESSION['sauvegarder-erreurs']) && !empty($_SESSION['sauvegarder-erreurs'])) {
  $erreurs = $_SESSION['sauvegarder-erreurs'];
}

if (isset($_SESSION['suppression-erreurs']) && !empty($_SESSION['suppression-erreurs'])) {
  $erreurs = $_SESSION['suppression-erreurs'];
}

if (isset($_SESSION['suppression-photo-erreurs']) && !empty($_SESSION['suppression-photo-erreurs'])) {
  $erreurs = $_SESSION['suppression-photo-erreurs'];
}

if (isset($_SESSION['desactivation-erreurs']) && !empty($_SESSION['desactivation-erreurs'])) {
  $erreurs = $_SESSION['desactivation-erreurs'];
}

if (isset($_SESSION['photo-erreurs']) && !empty($_SESSION['photo-erreurs'])) {
  $erreurs = $_SESSION['photo-erreurs'];
}

?>

<?php
if (check_if_user_conneted()) {
?>

  <!DOCTYPE html>
  <html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SLC Client - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= PATH_PROJECT ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- outils CSS Files -->
    <link href="<?= PATH_PROJECT ?>public/outils/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <!-- Favicons -->

    <link href="<?= PATH_PROJECT ?>public/images/al_copyrighter.png" rel="icon" />

    <link href="<?= PATH_PROJECT ?>public/images/al_copyrighter.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- outils CSS Files -->

    <link href="<?= PATH_PROJECT ?>public/outils/animate.css/animate.min.css" rel="stylesheet" />

    <link href="<?= PATH_PROJECT ?>public/outils/aos/aos.css" rel="stylesheet" />

    <link href="<?= PATH_PROJECT ?>public/vendor/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">

    <link href="<?= PATH_PROJECT ?>public/outils/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link href="<?= PATH_PROJECT ?>public/outils/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <link href="<?= PATH_PROJECT ?>public/outils/boxicons/css/boxicons.min.css" rel="stylesheet" />

    <link href="<?= PATH_PROJECT ?>public/outils/glightbox/css/glightbox.min.css" rel="stylesheet" />

    <link href="<?= PATH_PROJECT ?>public/outils/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->

    <link href="<?= PATH_PROJECT ?>public/css/style.css" rel="stylesheet" />


    <style>
      label {
        color: black;
      }

      .card-title {
        font-size: 18px;
        font-weight: 500;
        color: rgb(1, 41, 112);
        font-family: Poppins, sans-serif;
        padding: 20px 0px 15px;
      }

      .profile.card-title {
        color: rgb(1, 41, 112);
      }

      .profile .label {
        font-weight: 600;
        color: #cda45e;
      }

      .profile .row {
        margin-bottom: 20px;
      }

      .profile .card-title {
        color: rgb(1, 41, 112);
      }

      .profile .profile-card h2 {
        font-size: 24px;
        font-weight: 700;
        color: rgb(44, 56, 78);
        margin: 10px 0px 0px;
      }

      .profile .profile-edit label {
        font-weight: 600;
        color: rgba(1, 41, 112, 0.6);
      }

      .col-form-label {
        padding-top: calc(0.375rem + 1px);
        padding-bottom: calc(0.375rem + 1px);
        margin-bottom: 0px;
        font-size: inherit;
        line-height: 1.5;
      }

      .btn-primary {
        background-color: black;
        border-color: black;
      }

      .card {
        background-color: #1a1814;
      }

      .col-form-label {
        color: white;
      }
    </style>

  </head>

  <body>
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
        <h1 class="logo me-auto me-lg-0">
          <a href="<?= PATH_PROJECT ?>client/site/home" style="font-size: 26px;">Sous les Cocotiers</a>
        </h1>

        <!-- Uncomment below if you prefer to use an image logo -->

        <!-- <a href="home.html" class="logo me-auto me-lg-0"><img src="publics/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a class="nav-link scrollto active " href="<?= PATH_PROJECT ?>client/site/home">Acceuil</a></li>

            <li>
              <a class="nav-link scrollto" href="<?= PATH_PROJECT ?>client/site/chambres">Chambres</a>
            </li>

            <li>
              <a class="nav-link scrollto" href="<?= PATH_PROJECT ?>client/site/restaurant">Restaurant</a>
            </li>

            <li>
              <a class="nav-link scrollto" href="<?= PATH_PROJECT ?>client/site/galeries">Galeries</a>
            </li>

            <li>
              <a class="nav-link scrollto" href="<?= PATH_PROJECT ?>client/site/contact">Contact</a>
            </li>



            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <img src="<?= $_SESSION['utilisateur_connecter'][0]['avatar'] == 'no_image' ? PATH_PROJECT . 'public/images/default_profil.jpg' : $_SESSION['utilisateur_connecter'][0]['avatar'] ?>" style="margin-right: 12px; width: 2rem; height: 2rem;" alt="Profile" class="rounded-circle">

                <h5 class="ml-2" style="color: white;"><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom_utilisateur'] : 'Pseudo' ?></h5>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-center shadow animated--grow-in text-center" style="min-width: 12rem;" aria-labelledby="userDropdown">
                <div class="dropdown">
                  <p style="color: black;"> <strong><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom_utilisateur'] : 'Pseudo' ?></strong> <br>
                    <span><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['profil'] : 'Profil' ?></span>
                </div>
                <hr>
                <a class="dropdown-item d-flex align-items-center mb-3" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= PATH_PROJECT ?>client/profil/profile">
                  <i class="bi bi-person" style="margin-right: 12px;"></i>
                  <span>Mon Profile</span>
                </a>
                <a class="dropdown-item d-flex align-items-center mb-3" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= PATH_PROJECT ?>client/dashboard/index">
                  <i class="bi bi-gear" style="margin-right: 12px;"></i>
                  <span>Tableau de bord</span>
                </a>
                <a class="dropdown-item d-flex align-items-center" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= PATH_PROJECT ?>client/profil/notification">
                  <i class="bi bi-bell" style="margin-right: 12px;"></i>
                  <span>Notification(s)</span>
                </a>
                <hr>
                <a class="dropdown-item d-flex align-items-center" style="justify-content: unset; color: black; padding: 0px 0 0px 20px;" href="<?= PATH_PROJECT ?>client/deconnexion/index">
                  <i class="bi bi-box-arrow-right" style="margin-right: 12px;"></i>
                  <span>Déconnexion</span>
                </a>
              </div>
            </li>
            <!-- End Profile Nav -->

          </ul>

          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

      </div>
    </header>
    <!-- End Header -->

    <main id="main" class="container-fluid" style="padding-top: 14px;">

      <section class="profile" style="padding-top: 80px;">
        <div class="row">
          <div class="col-lg-4">
            <!-- ======= Hero Section ======= -->
            <section id="hero4" class="d-flex align-items-center">
              <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
                <div class="row">
                  <div class="col-lg-8">
                    <h1>Espace<span> Profil</span></h1>
                  </div>
                </div>
              </div>
            </section>
            <!-- End Hero -->
            <div class="card">
              <?php
              if (isset($_SESSION['suppression-erreurs']) && !empty($_SESSION['suppression-erreurs'])) {
              ?>
                <div class="alert alert-primary" style="color: white; background-color: #9f0808; border-color: snow; text-align:center">
                  <?= $_SESSION['suppression-erreurs'] ?>
                </div>
              <?php
              }
              ?>

              <?php
              if (isset($_SESSION['desactivation-erreurs']) && !empty($_SESSION['desactivation-erreurs'])) {
              ?>
                <div class="alert alert-primary" style="color: white; background-color: #9f0808; border-color: snow; text-align:center">
                  <?= $_SESSION['desactivation-erreurs'] ?>
                </div>
              <?php
              }
              ?>

              <?php
              if (isset($_SESSION['photo-erreurs']) && !empty($_SESSION['photo-erreurs'])) {
              ?>
                <div class="alert alert-primary" style="color: white; background-color: #9f0808; border-color: snow; text-align:center">
                  <?= $_SESSION['photo-erreurs'] ?>
                </div>
              <?php
              }
              ?>

              <?php
              if (isset($_SESSION['suppression-photo-erreurs']) && !empty($_SESSION['suppression-photo-erreurs'])) {
              ?>
                <div class="alert alert-primary" style="color: white; background-color: #9f0808; border-color: snow; text-align:center">
                  <?= $_SESSION['suppression-photo-erreurs'] ?>
                </div>
              <?php
              }
              ?>

              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center" style="color: #cda45e;">
                  <a href="<?= $_SESSION['utilisateur_connecter'][0]['avatar'] == 'no_image' ?  PATH_PROJECT . 'public/images/default_profil.JPG' : $_SESSION['utilisateur_connecter'][0]['avatar'] ?>" class="gallery-lightbox" data-gall="gallery-item">
                    <img src="<?= $_SESSION['utilisateur_connecter'][0]['avatar'] == 'no_image' ?  PATH_PROJECT . 'public/images/default_profil.JPG' : $_SESSION['utilisateur_connecter'][0]['avatar'] ?>" style="width: 130px;" alt="Profile" class="rounded-circle" class="img-fluid">
                  </a>


                  <div class="mt-3">
                    <h4><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom_utilisateur'] : 'Pseudo' ?></h4>
                    <p class="mb-1" style="color: white;"><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['profil'] : 'Profil' ?></p>
                    <p class="font-size-sm" style="color: white;">SOUS LES COCOTIERS</p>
                  </div>
                </div>
                <form action="<?= PATH_PROJECT ?>client/profil/traitement_photo" method="post" enctype="multipart/form-data">
                  <div class="row" style="text-align: center; display:flex;">
                    <div class="col-sm-9 text-secondary">
                      <label class="form-label" for="customFile" style="color: gray;">Changer ma photo de profil</label>
                      <input type="file" class="form-control" id="image" name="image" />
                    </div>

                    <!-- maj_photo Form -->
                    <div class="modal-footer text-center col-sm-3" style="justify-content: center; margin-top: 31px;">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal0" style="font-size: revert; padding: 9px;">Mettre à jour</button>
                      <div class="col-md-8 col-lg-12">
                        <div class="text-center" style="color: #070b3a;">
                          <!-- Modal -->
                          <div class="modal fade" id="modal0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel" style="text-transform: uppercase;">Mettre à jour la photo de profil</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="row mb-3">
                                    <label for="MP" class="col-12 col-form-label" style="color: #070b3a;">Veuiller entrer votre mot de passe pour modifier la photo. </label>
                                    <br>
                                    <div class="col-md-8 col-lg-12">
                                      <input type="password" id="MP" name="password" class="form-control" placeholder="Veuillez entrer votre mot de passe" value="">
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                  <button type="submit" name="change_photo" class="btn btn-primary">Valider</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                </form>
              </div>
            </div>

            <!-- suppression_photo Form -->
            <form action="<?= PATH_PROJECT ?>client/profil/traitement_suppression_photo" method="post" enctype="multipart/form-data" style="display: flex; justify-content: center; align-items: center;">
              <div class="row">
                <button type="reset" class="btn btn-secondary" data-toggle="modal" data-target="#modal5"><i class="fa fa-trash"></i> Supprimer</button>
                <div class="col-md-8 col-lg-12">
                  <div class="text-center" style="color: #070b3a;">
                    <!-- Modal -->
                    <div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-transform: uppercase;">Supprimer la photo de profil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row mb-3">
                              <label for="MP" class="col-12 col-form-label" style="color: #070b3a;">Veuiller entrer votre mot de passe pour supprimer la photo. </label>
                              <br>
                              <div class="col-md-8 col-lg-12">
                                <input type="password" id="MP" name="password" class="form-control" placeholder="Veuillez entrer votre mot de passe" value="">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="supprimer_photo" class="btn btn-primary">Valider</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </form>
            <hr>

            <div class="profile" style="color: white;">
              <div class="row">
                <div class="col-lg-5 col-md-4 label ">Nom et Prénom(s):</div>
                <div class="col-lg-7 col-md-8"><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom'] : 'Nom' ?> <?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['prenom'] : 'Prenom' ?></div>
              </div>

              <div class="row">
                <div class="col-lg-5 col-md-4 label ">Nom utilisateur :</div>
                <div class="col-lg-7 col-md-8"><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom_utilisateur'] : 'Nom utilisateur' ?></div>
              </div>

              <div class="row">
                <div class="col-lg-5 col-md-4 label ">Email :</div>
                <div class="col-lg-7 col-md-8"><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['email'] : 'Email' ?></div>
              </div>

              <div class="row">
                <div class="col-lg-5 col-md-4 label ">Contact :</div>
                <div class="col-lg-7 col-md-8"><?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['telephone'] : 'Contact' ?></div>
              </div>

            </div>
            <hr>

            <div>
              <!-- suppression Form -->
              <form action="<?= PATH_PROJECT ?>client/profil/traitement_suppression" method="post" enctype="multipart/form-data">
                <div class="row mb-3 text-center">
                  <div class="col-md-8 col-lg-12">
                    <button type="button" style="padding: 10px; background-color:#9f0808;" name="supprimer-compte" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal2 "><i class="bi bi-trash"></i> Supprimer mon compte</button>

                    <div class="text-center" style="color: #070b3a;">
                      <!-- Modal -->
                      <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel" style="text-transform: uppercase;">Supprimer mon compte</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row mb-3">
                                <label for="MP" class="col-12 col-form-label" style="color: #d11818;">Vous êtes sûre d'effectuer cette action ? Après cette action votre compte sera supprimer de façon définitive.
                                  Si oui veuiller entrer votre mot de passe pour appliquer l'action. </label>
                                <br>
                                <div class="col-md-8 col-lg-12">
                                  <input type="password" id="MP" name="password" class="form-control" placeholder="Veuillez entrer votre mot de passe" value="">
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                              <button type="submit" name="suppression" class="btn btn-primary">Valider</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </form>

              <!-- desactivation Form -->
              <form action="<?= PATH_PROJECT ?>client/profil/traitement_desactivation" method="post" enctype="multipart/form-data">
                <div class="row mb-3 text-center">
                  <div class="col-md-8 col-lg-12">
                    <button type="button" style="padding: 10px; background-color:#9f0808;" name="désactiver-compte" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal3" style="margin-top: 8px;">Désactiver mon compte</button>

                    <div class="text-center" style="color: #070b3a;">
                      <!-- Modal -->
                      <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel" style="text-transform: uppercase;">Désactiver mon compte</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row mb-3">
                                <label for="MP" class="col-12 col-form-label" style="color: #d11818;">Vous êtes sûre d'effectuer cette action ? Après cette action vous ne serez plus en mesure de vous connecter.
                                  Si oui veuiller entrer votre mot de passe pour appliquer l'action. Pour réactiver votre compte veuiller nous écrire par mail.</label>
                                <br>
                                <div class="col-md-8 col-lg-12">
                                  <input type="password" id="MP" name="password" class="form-control" placeholder="Veuillez entrer votre mot de passe" value="">
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                              <button type="submit" name="desactivation" class="btn btn-primary">Valider</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
        </div>

        <div class="col-xl-8">
          <div class="col-lg-12">
            <h5 style="margin-bottom: 13px; margin-top: 80px; font-size: 32px; font-weight: 700; color: #cda45e;">Modification(s) des informations usuelles</h5>
            <div class="card">
              <div class="card-body">
                <form action="<?= PATH_PROJECT ?>client/profil/traitement_edit_profil" method="post" enctype="multipart/form-data">
                  <?php
                  if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
                  ?>
                    <div class="alert alert-primary" style="color: white; background-color: #1cc88a; text-align:center; border-color: snow;">
                      <?= $_SESSION['success'] ?>
                    </div>
                  <?php
                  }
                  ?>

                  <?php
                  if (isset($_SESSION['sauvegarder-erreurs']) && !empty($_SESSION['sauvegarder-erreurs'])) {
                  ?>
                    <div class="alert alert-primary" style="color: white; background-color: #9f0808; text-align:center; border-color: snow;">
                      <?= $_SESSION['sauvegarder-erreurs'] ?>
                    </div>
                  <?php
                  }
                  ?>

                  <div>
                    <div class="row mb-3">
                      <label for="Name" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nom" type="text" class="form-control <?= isset($_SESSION['erreurs']['nom']) ? 'is-invalid' : '' ?>" id="Name" value="<?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom'] : 'Nom' ?>">
                        
                        <?php if (isset($erreurs["nom"])) { ?>
									<span class="text-danger">
										<?php echo $erreurs["nom"]; ?>
									</span>
								<?php } ?>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Name1" class="col-md-4 col-lg-3 col-form-label">Prénom(s)</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="prenom" type="text" class="form-control <?= isset($_SESSION['erreurs']['prenom']) ? 'is-invalid' : '' ?>" id="Name1" value="<?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['prenom'] : 'Prenom' ?>">

                        <?php
                        if (isset($_SESSION['erreurs']['prenom'])) {
                        ?>
                          <div class="invalid-feedback">
                            <?= $_SESSION['erreurs']['prenom'] ?>
                          </div>
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="user" class="col-md-4 col-lg-3 col-form-label">Nom utilisateur</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nom_utilisateur" type="text" class="form-control <?= isset($_SESSION['erreurs']['nom_utilisateur']) ? 'is-invalid' : '' ?>" id="user" value="<?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['nom_utilisateur'] : 'Nom utilisateur' ?>">

                      <?php
                      if (isset($_SESSION['erreurs']['nom_utilisateur'])) {
                      ?>
                        <div class="invalid-feedback">
                          <?= $_SESSION['erreurs']['nom_utilisateur'] ?>
                        </div>
                      <?php
                      }
                      ?>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Contact</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="telephone" type="text" class="form-control <?= isset($_SESSION['erreurs']['telephone']) ? 'is-invalid' : '' ?>" id="Phone" value="<?= isset($_SESSION['utilisateur_connecter']) ?  $_SESSION['utilisateur_connecter'][0]['telephone'] : 'Téléphone' ?>">

                      <?php
                      if (isset($_SESSION['erreurs']['telephone'])) {
                      ?>
                        <div class="invalid-feedback">
                          <?= $_SESSION['erreurs']['telephone'] ?>
                        </div>
                      <?php
                      }
                      ?>
                    </div>
                  </div>

                  <div class="text-center" style="color: #070b3a;">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary text-center" data-toggle="modal" data-target="#modal1">
                      Sauvegarder
                    </button>

                    <div class="text-center" style="color: #070b3a;">
                      <!-- Modal -->
                      <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel" style="text-transform: uppercase;">Modifier les informations de mon compte</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="passwordImput" class="col-12 col-form-label" style="color: #070b3a;">Veuiller entrer votre mot de passe pour appliquer les modifications.</label>
                                <input type="password" name="password" id="passwordImput" class="form-control" placeholder="Veuillez entrer votre mot de passe" value="">

                              </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="submit" name="sauvegarder" class="btn btn-primary">Valider</button>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
        </form><!-- End Profile Edit Form -->
        </div>
        </div>
        </div>

        <!-- Changed password Form -->
        <div class="col-lg-12 mt-5">

          <h5 style="margin-bottom: 13px; font-size: 32px; font-weight: 700; color: #cda45e;">Changement de mot de passe</h5>
          <div class="card">
            <div class="card-body">
              <form action="<?= PATH_PROJECT ?>client/profil/traitement_password" method="post" enctype="multipart/form-data">
                <h5 style="color: #cda45e; text-align:center; "> Sachez qu'après le changement de votre mot de passe vous serez déconnecté(e).</h5>
                <br>
                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-5 col-lg-4 col-form-label" require>Mot de passe actuel</label>
                  <div class="col-md-7 col-lg-8">
                    <input name="password" type="password" class="form-control" placeholder="Veuillez entrer votre mot de passe actuel" id="currentPassword">
                    <span class="text-danger">
                      <?php
                      if (isset($erreurs["password"]) && !empty($erreurs["password"])) {
                        echo $erreurs["password"];
                      }
                      ?>
                    </span>
                  </div>

                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-5 col-lg-4 col-form-label">Nouveau Mot de passe</label>
                  <div class="col-md-7 col-lg-8">
                    <input name="newpassword" type="password" class="form-control" placeholder="Veuillez entrer votre nouveau mot de passe" id="newPassword" requi#9f0808>
                    <span class="text-danger">
                      <?php
                      if (isset($erreurs["newpassword"]) && !empty($erreurs["newpassword"])) {
                        echo $erreurs["newpassword"];
                      }
                      ?>
                    </span>
                  </div>

                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-5 col-lg-4 col-form-label">Retaper Nouveau Mot de passe</label>
                  <div class="col-md-7 col-lg-8">
                    <input name="renewpassword" type="password" class="form-control" placeholder="Veuillez retaper votre nouveau mot de passe" id="renewPassword" requi#9f0808>
                    <span class="text-danger">
                      <?php
                      if (isset($erreurs["renewpassword"]) && !empty($erreurs["renewpassword"])) {
                        echo $erreurs["renewpassword"];
                      }
                      ?>
                    </span>
                  </div>

                </div>

                <div style="text-align: center;">
                  <button type="submit" name="change_password" class="btn btn-primary text-center"> Changer mot de passe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        </div>

        </div>
        </div>
      </section>

    </main><!-- End #main -->

    <?php
    unset($_SESSION['changement-erreurs'], $_SESSION['suppression-erreurs'],  $_SESSION['desactivation-erreurs'], $_SESSION['success'], $_SESSION['sauvegarder-erreurs'], $_SESSION['photo-erreurs'], $_SESSION['suppression-photo-erreurs']);
    ?>




    <!-- Bootstrap core JavaScript-->
    <script src="<?= PATH_PROJECT ?>public/vendor/jquery/jquery.min.js"></script>
    <script src="<?= PATH_PROJECT ?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= PATH_PROJECT ?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= PATH_PROJECT ?>public/js/sb-admin-2.min.js"></script>


    <!-- Page level plugins -->
    <script src="<?= PATH_PROJECT ?>public/vendor/chart.js/Chart.min.js"></script>
    <script src="<?= PATH_PROJECT ?>public/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?= PATH_PROJECT ?>public/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= PATH_PROJECT ?>public/js/demo/chart-area-demo.js"></script>
    <script src="<?= PATH_PROJECT ?>public/js/demo/chart-pie-demo.js"></script>
    <script src="<?= PATH_PROJECT ?>public/js/demo/datatables-demo.js"></script>



    <!-- outils JS Files -->

    <script src="<?= PATH_PROJECT ?>public/outils/aos/aos.js"></script>

    <script src="<?= PATH_PROJECT ?>public/outils/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= PATH_PROJECT ?>public/outils/glightbox/js/glightbox.min.js"></script>

    <script src="<?= PATH_PROJECT ?>public/outils/isotope-layout/isotope.pkgd.min.js"></script>

    <script src="<?= PATH_PROJECT ?>public/outils/swiper/swiper-bundle.min.js"></script>

    <script src="<?= PATH_PROJECT ?>public/outils/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->

    <script src="<?= PATH_PROJECT ?>public/js/main.js"></script>

    <script src="<?= PATH_PROJECT ?>public/js/jquery.js"></script>

    <script src="<?= PATH_PROJECT ?>public/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

    <script src="<?= PATH_PROJECT ?>public/js/init.js"></script>



  </body>

  </html>

<?php
} else {
  header('location: ' . PATH_PROJECT . 'client/dashboard/index');
}
?>
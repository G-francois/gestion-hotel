<?php

$include_client_header = true;
include('./app/commum/header_.php');


$chambre = array();

// Vérifie si le paramètre contenant le numéro de chambre est présent
if (!empty($params[3])) {
  // Récupère les informations de la chambre à partir de son numéro
  $chambre = recuperer_chambre_par_son_num_chambre($params[3]);
}

?>

<style>
  .zoom-effect-container {
    overflow: hidden;
  }

  .zoom-effect {
    transition: transform 0.5s;
  }

  .zoom-effect:hover {
    transform: scale(1.1);
  }
</style>

<!-- Commencement du contenu de la page -->
<div class="container-fluid">
  <section class="content">
    <?php if (empty($chambre)) { ?>

      <!-- Affiche un message d'erreur si la chambre n'existe pas -->
      <div class="mt-5">
        La chambre que vous souhaitez voir n'existe pas.
        <a class="" href="<?= PATH_PROJECT ?>client/chambres" style="color: #cda45e;">Retour vers la liste des chambres</a>
      </div>

    <?php } else { ?>

      <div class="row mt-5">
        <div class="card my-2 border-0 rounded-0">
          <div class="row" style="background-color: #0c0b09">
            <div class="col-md-6">
              <div class="card mb-4 shadow-sm zoom-effect-container">
                <img class="bd-placeholder-img card-img-top zoom-effect" width="100%" height="auto" src="<?php echo $chambre['photos']; ?>" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
              </div>
            </div>

            <div class="col-md-6">
              <h3 class="card-title">
                Détails de la chambre <?php echo $chambre['num_chambre']; ?> : <?php echo $chambre['lib_typ']; ?>
              </h3>
              <p class="card-text">
                <?php echo $chambre['details']; ?>
              </p>
              <div>
                <div style="display: flex">
                  <p><i class="fas fa-user-circle"></i> <?php echo $chambre['personnes']; ?> VOYAGEURS</p>
                  <p style="margin-left: 2rem">
                    <i class="fas fa-vector-square"></i> <?php echo $chambre['superficies']; ?>
                  </p>
                  <p style="margin-left: 2rem">
                    <i class="bi bi-house"></i> <?php echo $chambre['pu']; ?>F/nuit
                  </p>
                </div>
              </div>
              <div class="row d-flex">
                <div class="col-md-6">
                  <a title="Cocktail De Bienvenue" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Cocktail De Bienvenue" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-13.png" /></a>
                  <a title="Salle de bains privée" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Salle de bains privée" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-10.png" /></a>
                  <a title="satellite-tv" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="satellite-tv" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-18.png" /></a>
                  <a title="Blanchisserie" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Blanchisserie" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-15.png" /></a>
                  <a title="Wifi" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Wifi" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-12-1.png" /></a>
                </div>

                <div class="col-md-6">
                  <?php
                  if (!check_if_user_connected_client()) {
                  ?>
                    <div class="mt-4" style="text-align: center;">
                      <a href="<?= PATH_PROJECT ?>client/connexion" class="btn btn-primary">Réserver maintenant</a>
                    </div>
                  <?php
                  }
                  ?>

                  <?php
                  if (check_if_user_connected_client()) {
                  ?>
                    <button class="btn btn-primary mt-1" id="toggleButton" onclick="toggleBlock()">
                      Réserver maintenant
                    </button>
                  <?php
                  }
                  ?>
                </div>
              </div>


              <div class="card-body px-0" id="contentBlock" style="display: none;">
                <?php
                // Vérifie s'il y a un message de succès global à afficher
                if (isset($_SESSION['reservation-message-success-global']) && !empty($_SESSION['reservation-message-success-global'])) {
                ?>
                  <div class="alert alert-primary" style="color: white; background-color: #2653d4; text-align:center; border-color: snow;">
                    <?= $_SESSION['reservation-message-success-global'] ?>
                  </div>
                <?php
                }
                ?>

                <?php
                // Vérifie s'il y a un message d'erreur global à afficher
                if (isset($_SESSION['reservation-message-erreur-global']) && !empty($_SESSION['reservation-message-erreur-global'])) {
                ?>
                  <div class="alert alert-primary" style="color: white; background-color: #9f0808; text-align:center; border-color: snow;">
                    <?= $_SESSION['reservation-message-erreur-global'] ?>
                  </div>
                <?php
                }
                ?>

                <?php
                if (check_if_user_connected_client()) {
                ?>
                  <h5 style=" text-align:center; margin-bottom: 20px;">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    Bienvenue cher client <?= $_SESSION['utilisateur_connecter_client']['nom_utilisateur'] ?>. Après une réservation vous pouvez consulter la liste de vos réservations dans le tableau de bord.
                  </h5>

                  <?php if ($chambre['lib_typ'] === 'Solo') { ?>
                    <form action="<?= PATH_PROJECT . "client/chambres/traitement-reservation-solo" ?><?= !empty($params[3]) ? "/" . $params[3] : "" ?>" method="post" class="user">

                      <div class="row">
                        <!-- Le champs date de début occupation -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-deb_occ">
                            Début de séjour:
                            <span class="text-danger">(*)</span>
                          </label>
                          <div class="input-group mb-3">
                            <input type="date" name="deb_occ" id="inscription-deb_occ" class="form-control" placeholder="Veuillez entrer votre date de début occupation" value="<?= (isset($donnees["deb_occ"]) && !empty($donnees["deb_occ"])) ? $donnees["deb_occ"] : ""; ?>" min="<?= date('Y-m-d'); ?>" required>
                          </div>
                          <?php if (isset($erreurs["deb_occ"]) && !empty($erreurs["deb_occ"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["deb_occ"]; ?>
                            </span>
                          <?php } ?>

                        </div>

                        <!-- Le champs date de fin occupation -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-fin_occ">
                            Fin de séjour:
                            <span class="text-danger">(*)</span>
                          </label>
                          <div class="input-group mb-3">
                            <input type="date" name="fin_occ" id="inscription-fin_occ" class="form-control" placeholder="Veuillez entrer votre date de fin occupation" value="<?= (isset($donnees["fin_occ"]) && !empty($donnees["fin_occ"])) ? $donnees["fin_occ"] : ""; ?>" min="<?= date('Y-m-d'); ?>" required>
                          </div>

                          <?php if (isset($erreurs["fin_occ"]) && !empty($erreurs["fin_occ"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["fin_occ"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                      </div>

                      <div class="col-lg-12 mt-4">
                        <h5 style="font-weight: bold">Nombre total de jours : <span id="nombre_jour">0</span></h5>
                        <h5 style="font-weight: bold">Montant total : <span id="prix_total">0</span> </h5>
                      </div>

                      <div class="float-right" style="text-align: right;">
                        <button type="reset" class="btn btn-danger" style="--bs-btn-color: #fff; --bs-btn-bg: #3b070c; --bs-btn-border-color: #3b070c; --bs-btn-hover-color: #fff; --bs-btn-hover-bg: #b30617; --bs-btn-hover-border-color: #b30617;">
                          Annuler
                        </button>
                        <button type="submit" name="enregistrer" class="btn btn-success" style="--bs-btn-color: #fff; --bs-btn-bg: #013534; --bs-btn-border-color: #000000; --bs-btn-hover-color: #fff; --bs-btn-hover-bg: #9d6b15; --bs-btn-hover-border-color: #000000;">
                          Enregistrer
                        </button>
                      </div>

                    </form>
                  <?php } ?>

                  <?php if ($chambre['lib_typ'] === 'Doubles') { ?>
                    <form action="<?= PATH_PROJECT . "client/chambres/traitement-reservation-double" ?><?= !empty($params[3]) ? "/" . $params[3] : "" ?>" method="post" class="user" novalidate>
                      <div class="row">
                        <!-- Le champs nom accompagnateur -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-nom_acc">Accompagnateur :</label>
                          <input type="text" name="nom_acc" id="inscription-nom_acc" class="form-control" placeholder="Veuillez entrer le nom de l'accompagnateur" value="<?= (isset($donnees["nom_acc"]) && !empty($donnees["nom_acc"])) ? $donnees["nom_acc"] : ""; ?>" required>
                          <?php if (isset($erreurs["nom_acc"]) && !empty($erreurs["nom_acc"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["nom_acc"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                        <!-- Le champs contact accompagnateur-->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-contact-acc">Contact de l'accompagnateur :</label>
                          <input type="text" name="contact_acc" id="inscription-contact-acc" class="form-control" placeholder="Veuillez entrer le contact de l'accompagnateur" value="<?= (isset($donnees["contact_acc"]) && !empty($donnees["contact_acc"])) ? $donnees["contact_acc"] : ""; ?>" required>
                          <?php if (isset($erreurs["contact_acc"]) && !empty($erreurs["contact_acc"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["contact_acc"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                      </div>


                      <div class="row">
                        <!-- Le champs date de début occupation -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-deb_occ">
                            Début de séjour:
                            <span class="text-danger">(*)</span>
                          </label>
                          <div class="input-group mb-3">
                            <input type="date" name="deb_occ" id="inscription-deb_occ" class="form-control" placeholder="Veuillez entrer votre date de début occupation" value="<?= (isset($donnees["deb_occ"]) && !empty($donnees["deb_occ"])) ? $donnees["deb_occ"] : ""; ?>" min="<?= date('Y-m-d'); ?>" required>
                          </div>
                          <?php if (isset($erreurs["deb_occ"]) && !empty($erreurs["deb_occ"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["deb_occ"]; ?>
                            </span>
                          <?php } ?>

                        </div>

                        <!-- Le champs date de fin occupation -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-fin_occ">
                            Fin de séjour:
                            <span class="text-danger">(*)</span>
                          </label>
                          <div class="input-group mb-3">
                            <input type="date" name="fin_occ" id="inscription-fin_occ" class="form-control" placeholder="Veuillez entrer votre date de fin occupation" value="<?= (isset($donnees["fin_occ"]) && !empty($donnees["fin_occ"])) ? $donnees["fin_occ"] : ""; ?>" min="<?= date('Y-m-d'); ?>" required>
                          </div>

                          <?php if (isset($erreurs["fin_occ"]) && !empty($erreurs["fin_occ"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["fin_occ"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <h5 style="font-weight: bold">Nombre total de jours : <span id="nombre_jour">0</span></h5>
                        <h5 style="font-weight: bold">Montant total : <span id="prix_total">0</span></h5>
                      </div>

                      <button type="reset" class="btn btn-danger" style="--bs-btn-color: #fff; --bs-btn-bg: #3b070c; --bs-btn-border-color: #3b070c; --bs-btn-hover-color: #fff; --bs-btn-hover-bg: #b30617; --bs-btn-hover-border-color: #b30617;">
                        Annuler
                      </button>
                      <button type="submit" name="enregistrer" class="btn btn-success" style="--bs-btn-color: #fff; --bs-btn-bg: #013534; --bs-btn-border-color: #000000; --bs-btn-hover-color: #fff; --bs-btn-hover-bg: #9d6b15; --bs-btn-hover-border-color: #000000;">
                        Enregistrer
                      </button>
                    </form>
                  <?php } ?>

                  <?php if ($chambre['lib_typ'] === 'Triples') { ?>
                    <form action="<?= PATH_PROJECT . "client/chambres/traitement-reservation-triple" ?><?= !empty($params[3]) ? "/" . $params[3] : "" ?>" method="post" class="user" novalidate>
                      <div class="col-md-6 mb-3">
                        <label for="nombre-accompagnateurs">Nombre d'accompagnateurs :</label>
                        <select name="nombre_accompagnateurs" id="nombre-accompagnateurs" class="form-control" onchange="toggleAccompagnateursFields()">
                          <option value="0">Aucun</option>
                          <option value="1">1 Accompagnateur</option>
                          <option value="2">2 Accompagnateurs</option>
                        </select>
                      </div>


                      <div class="row" id="accompagnateur-1" style="display: none;">
                        <!-- Le champs nom accompagnateur -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-nom_acc">Accompagnateur :</label>
                          <input type="text" name="nom_acc" id="inscription-nom_acc" class="form-control" placeholder="Veuillez entrer le nom de l'accompagnateur" value="<?= (isset($donnees["nom_acc"]) && !empty($donnees["nom_acc"])) ? $donnees["nom_acc"] : ""; ?>" required>
                          <?php if (isset($erreurs["nom_acc"]) && !empty($erreurs["nom_acc"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["nom_acc"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                        <!-- Le champs contact accompagnateur-->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-contact-acc">Contact de l'accompagnateur :</label>
                          <input type="text" name="contact_acc" id="inscription-contact-acc" class="form-control" placeholder="Veuillez entrer le contact de l'accompagnateur" value="<?= (isset($donnees["contact_acc"]) && !empty($donnees["contact_acc"])) ? $donnees["contact_acc"] : ""; ?>" required>
                          <?php if (isset($erreurs["contact_acc"]) && !empty($erreurs["contact_acc"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["contact_acc"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                      </div>

                      <div class="row" id="accompagnateur-2" style="display: none;">
                        <!-- Le champs nom accompagnateur -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-nom_acc2">Accompagnateur 2 :</label>
                          <input type="text" name="nom_acc2" id="inscription-nom_acc2" class="form-control" placeholder="Veuillez entrer le nom de l'accompagnateur 2" value="<?= (isset($donnees["nom_acc2"]) && !empty($donnees["nom_acc2"])) ? $donnees["nom_acc2"] : ""; ?>" required>
                          <?php if (isset($erreurs["nom_acc2"]) && !empty($erreurs["nom_acc2"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["nom_acc2"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                        <!-- Le champs contact accompagnateur-->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-contact-acc2">Contact de l'accompagnateur 2 :</label>
                          <input type="text" name="contact_acc2" id="inscription-contact-acc2" class="form-control" placeholder="Veuillez entrer le contact de l'accompagnateur 2" value="<?= (isset($donnees["contact_acc2"]) && !empty($donnees["contact_acc2"])) ? $donnees["contact_acc2"] : ""; ?>" required>
                          <?php if (isset($erreurs["contact_acc2"]) && !empty($erreurs["contact_acc2"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["contact_acc2"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                      </div>


                      <div class="row">
                        <!-- Le champs date de  début occupation -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-deb_occ">
                            Début de séjour :
                            <span class="text-danger">(*)</span>
                          </label>
                          <div class="input-group mb-3">
                            <input type="date" name="deb_occ" id="inscription-deb_occ" class="form-control" placeholder="Veuillez entrer votre date de début occupation" value="<?= (isset($donnees["deb_occ"]) && !empty($donnees["deb_occ"])) ? $donnees["deb_occ"] : ""; ?>" min="<?= date('Y-m-d'); ?>" required>
                          </div>
                          <?php if (isset($erreurs["deb_occ"]) && !empty($erreurs["deb_occ"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["deb_occ"]; ?>
                            </span>
                          <?php } ?>

                        </div>

                        <!-- Le champs date de  fin occupation -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-fin_occ">
                            Fin de séjour :
                            <span class="text-danger">(*)</span>
                          </label>
                          <div class="input-group mb-3">
                            <input type="date" name="fin_occ" id="inscription-fin_occ" class="form-control" placeholder="Veuillez entrer votre date de fin occupation" value="<?= (isset($donnees["fin_occ"]) && !empty($donnees["fin_occ"])) ? $donnees["fin_occ"] : ""; ?>" min="<?= date('Y-m-d'); ?>" required>
                          </div>

                          <?php if (isset($erreurs["fin_occ"]) && !empty($erreurs["fin_occ"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["fin_occ"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                      </div>

                      <div class="col-lg-12 mt-4">
                        <h5 style="font-weight: bold">Nombre total de jours : <span id="nombre_jour">0</span></h5>
                        <h5 style="font-weight: bold">Montant total : <span id="prix_total">0</span> </h5>
                      </div>

                      <button type="reset" class="btn btn-danger" style="--bs-btn-color: #fff; --bs-btn-bg: #3b070c; --bs-btn-border-color: #3b070c; --bs-btn-hover-color: #fff; --bs-btn-hover-bg: #b30617; --bs-btn-hover-border-color: #b30617;">
                        Annuler
                      </button>
                      <button type="submit" name="enregistrer" class="btn btn-success" style="--bs-btn-color: #fff; --bs-btn-bg: #013534; --bs-btn-border-color: #000000; --bs-btn-hover-color: #fff; --bs-btn-hover-bg: #9d6b15; --bs-btn-hover-border-color: #000000;">
                        Enregistrer
                      </button>

                    </form>
                  <?php } ?>

                  <?php if ($chambre['lib_typ'] === 'Suite') { ?>
                    <form action="<?= PATH_PROJECT . "client/chambres/traitement-reservation-suit" ?><?= !empty($params[3]) ? "/" . $params[3] : "" ?>" method="post" class="user" novalidate>
                      <div class="col-md-6 mb-3">
                        <label for="nombre-accompagnateurs">Nombre d'accompagnateurs :</label>
                        <select name="nombre_accompagnateurs" id="nombre-accompagnateurs" class="form-control" onchange="toggleAccompagnateursFields()">
                          <option value="0">Aucun</option>
                          <?php
                          for ($i = 1; $i < 5; $i++) {
                          ?>
                            <option value="<?= $i ?>" <?php echo (!empty($donnees['nombre_accompagnateurs']) && $donnees['nombre_accompagnateurs'] == $i) ? 'selected' : '' ?>><?= $i . ' Accompagnateur' ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>

                      <div class="row" id="accompagnateur-1" style="display: none;">
                        <!-- Le champs nom accompagnateur -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-nom_acc">Accompagnateur :</label>
                          <input type="text" name="nom_acc" id="inscription-nom_acc" class="form-control" placeholder="Veuillez entrer le nom de l'accompagnateur" value="<?= (isset($donnees["nom_acc"]) && !empty($donnees["nom_acc"])) ? $donnees["nom_acc"] : ""; ?>" data-validation="nom_acc" required>
                          <?php if (isset($erreurs["nom_acc"]) && !empty($erreurs["nom_acc"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["nom_acc"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                        <!-- Le champs contact accompagnateur-->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-contact-acc">Contact de l'accompagnateur :</label>
                          <input type="text" name="contact_acc" id="inscription-contact-acc" class="form-control" placeholder="Veuillez entrer le contact de l'accompagnateur" value="<?= (isset($donnees["contact_acc"]) && !empty($donnees["contact_acc"])) ? $donnees["contact_acc"] : ""; ?>" data-validation="contact_acc" required>
                          <?php if (isset($erreurs["contact_acc"]) && !empty($erreurs["contact_acc"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["contact_acc"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                      </div>

                      <div class="row" id="accompagnateur-2" style="display: none;">
                        <!-- Le champs nom accompagnateur -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-nom_acc2">Accompagnateur 2 :</label>
                          <input type="text" name="nom_acc2" id="inscription-nom_acc2" class="form-control" placeholder="Veuillez entrer le nom de l'accompagnateur 2" value="<?= (isset($donnees["nom_acc2"]) && !empty($donnees["nom_acc2"])) ? $donnees["nom_acc2"] : ""; ?>" data-validation="nom_acc2" required>
                          <?php if (isset($erreurs["nom_acc2"]) && !empty($erreurs["nom_acc2"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["nom_acc2"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                        <!-- Le champs contact accompagnateur-->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-contact-acc2">Contact de l'accompagnateur 2 :</label>
                          <input type="text" name="contact_acc2" id="inscription-contact-acc2" class="form-control" placeholder="Veuillez entrer le contact de l'accompagnateur 2" value="<?= (isset($donnees["contact_acc2"]) && !empty($donnees["contact_acc2"])) ? $donnees["contact_acc2"] : ""; ?>" data-validation="contact_acc2" required>
                          <?php if (isset($erreurs["contact_acc2"]) && !empty($erreurs["contact_acc2"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["contact_acc2"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                      </div>

                      <div class="row" id="accompagnateur-3" style="display: none;">
                        <!-- Le champs nom accompagnateur -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-nom_acc3">Accompagnateur 3 :</label>
                          <input type="text" name="nom_acc3" id="inscription-nom_acc3" class="form-control" placeholder="Veuillez entrer le nom de l'accompagnateur 3" value="<?= (isset($donnees["nom_acc3"]) && !empty($donnees["nom_acc3"])) ? $donnees["nom_acc3"] : ""; ?>" data-validation="nom_acc3" required>
                          <?php if (isset($erreurs["nom_acc3"]) && !empty($erreurs["nom_acc3"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["nom_acc3"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                        <!-- Le champs contact accompagnateur-->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-contact-acc3">Contact de l'accompagnateur 3 :</label>
                          <input type="text" name="contact_acc3" id="inscription-contact-acc3" class="form-control" placeholder="Veuillez entrer le contact de l'accompagnateur 3" value="<?= (isset($donnees["contact_acc3"]) && !empty($donnees["contact_acc3"])) ? $donnees["contact_acc3"] : ""; ?>" data-validation="contact_acc3" required>
                          <?php if (isset($erreurs["contact_acc3"]) && !empty($erreurs["contact_acc3"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["contact_acc3"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                      </div>

                      <div class="row" id="accompagnateur-4" style="display: none;">
                        <!-- Le champs nom accompagnateur -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-nom_acc4">Accompagnateur 4 :</label>
                          <input type="text" name="nom_acc4" id="inscription-nom_acc4" class="form-control" placeholder="Veuillez entrer le nom de l'accompagnateur 4" value="<?= (isset($donnees["nom_acc4"]) && !empty($donnees["nom_acc4"])) ? $donnees["nom_acc4"] : ""; ?>" data-validation="nom_acc4" required>
                          <?php if (isset($erreurs["nom_acc4"]) && !empty($erreurs["nom_acc4"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["nom_acc4"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                        <!-- Le champs contact accompagnateur-->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-contact-acc4">Contact de l'accompagnateur 4 :</label>
                          <input type="text" name="contact_acc4" id="inscription-contact-acc4" class="form-control" placeholder="Veuillez entrer le contact de l'accompagnateur 4" value="<?= (isset($donnees["contact_acc4"]) && !empty($donnees["contact_acc4"])) ? $donnees["contact_acc4"] : ""; ?>" data-validation="contact_acc4" required>
                          <?php if (isset($erreurs["contact_acc4"]) && !empty($erreurs["contact_acc4"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["contact_acc4"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                      </div>

                      <div class="row">
                        <!-- Le champs date de  début occupation -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-deb_occ">
                            Début de séjour :
                            <span class="text-danger">(*)</span>
                          </label>
                          <div class="input-group mb-3">
                            <input type="date" name="deb_occ" id="inscription-deb_occ" class="form-control" placeholder="Veuillez entrer votre date de début occupation" value="<?= (isset($donnees["deb_occ"]) && !empty($donnees["deb_occ"])) ? $donnees["deb_occ"] : ""; ?>" min="<?= date('Y-m-d'); ?>" required>
                          </div>
                          <?php if (isset($erreurs["deb_occ"]) && !empty($erreurs["deb_occ"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["deb_occ"]; ?>
                            </span>
                          <?php } ?>

                        </div>

                        <!-- Le champs date de  fin occupation -->
                        <div class="col-md-6 mb-3">
                          <label for="inscription-fin_occ">
                            Fin de séjour :
                            <span class="text-danger">(*)</span>
                          </label>
                          <div class="input-group mb-3">
                            <input type="date" name="fin_occ" id="inscription-fin_occ" class="form-control" placeholder="Veuillez entrer votre date de fin occupation" value="<?= (isset($donnees["fin_occ"]) && !empty($donnees["fin_occ"])) ? $donnees["fin_occ"] : ""; ?>" min="<?= date('Y-m-d'); ?>" required>
                          </div>

                          <?php if (isset($erreurs["fin_occ"]) && !empty($erreurs["fin_occ"])) { ?>
                            <span class="text-danger">
                              <?php echo $erreurs["fin_occ"]; ?>
                            </span>
                          <?php } ?>
                        </div>
                      </div>

                      <div class="col-lg-12 mt-4">
                        <h5 style="font-weight: bold">Nombre total de jours : <span id="nombre_jour">0</span></h5>
                        <h5 style="font-weight: bold">Montant total : <span id="prix_total">0</span> </h5>
                      </div>

                      <button type="reset" class="btn btn-danger" style="--bs-btn-color: #fff; --bs-btn-bg: #3b070c; --bs-btn-border-color: #3b070c; --bs-btn-hover-color: #fff; --bs-btn-hover-bg: #b30617; --bs-btn-hover-border-color: #b30617;">
                        Annuler
                      </button>
                      <button type="submit" name="enregistrer" class="btn btn-success" style="--bs-btn-color: #fff; --bs-btn-bg: #013534; --bs-btn-border-color: #000000; --bs-btn-hover-color: #fff; --bs-btn-hover-bg: #9d6b15; --bs-btn-hover-border-color: #000000;">
                        Enregistrer
                      </button>

                    </form>
                  <?php } ?>
                <?php
                }
                ?>

              </div>

            </div>
          </div>
        </div>
      </div>

      
  </section>
</div>
<?php } ?>


<script>
  function toggleBlock() {
    var block = document.getElementById('contentBlock');
    var button = document.getElementById('toggleButton');
    if (block.style.display === 'none') {
      block.style.display = 'block';
      button.textContent = 'Masquer';
    } else {
      block.style.display = 'none';
      button.textContent = 'Réserver maintenant';
    }
  }
</script>

<script>
  // Fonction pour afficher/cacher les ensembles de champs d'accompagnateurs en fonction du nombre sélectionné
  function toggleAccompagnateursFields() {
    var nombreAccompagnateurs = parseInt(document.getElementById("nombre-accompagnateurs").value);

    for (var i = 1; i <= 4; i++) {
      var accompagnateurFields = document.getElementById("accompagnateur-" + i);

      if (i <= nombreAccompagnateurs) {
        accompagnateurFields.style.display = "flex";
      } else {
        accompagnateurFields.style.display = "none";
      }
    }
  }
</script>

<script>
  // Fonction pour calculer le nombre de jours entre deux dates
  function calculerDifferenceJours(debut, fin) {
    const diffTime = Math.abs(fin - debut);
    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24)) + 1; // Ajouter 1 jour
    return diffDays;
  }

  function mettreAJourPrix() {
    const dateDebut = new Date(document.getElementById('inscription-deb_occ').value);
    const dateFin = new Date(document.getElementById('inscription-fin_occ').value);

    // Vérification que la date de fin est supérieure à la date de début
    if (dateFin <= dateDebut) {
      document.getElementById('nombre_jour').innerText = 'Date de fin doit être après la date de début';
      document.getElementById('prix_total').innerText = '0 F';
      return;
    }

    const jours = calculerDifferenceJours(dateDebut, dateFin);

    const prixParJour = <?php echo $chambre['pu']; ?>; // Utilisation du prix réel de la chambre par jour

    const montantTotal = prixParJour * jours;

    document.getElementById('nombre_jour').innerText = `${jours} jour(s)`;
    document.getElementById('prix_total').innerText = montantTotal + ' F';
  }
  // Écouteurs d'événements pour mettre à jour les calculs lorsqu'une date est changée
  document.getElementById('inscription-deb_occ').addEventListener('change', mettreAJourPrix);
  document.getElementById('inscription-fin_occ').addEventListener('change', mettreAJourPrix);
</script>


<?php
unset($_SESSION['erreurs-reservation'], $_SESSION['donnees-reservation'], $_SESSION['reservation-message-success-global'], $_SESSION['reservation-message-erreur-global']);


$include_icm_footer = true;
include('./app/commum/footer_.php');
?>
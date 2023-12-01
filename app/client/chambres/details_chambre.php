<?php

$include_client_header = true;
include('./app/commum/header_.php');


$chambre = array();

// Vérifie si le paramètre contenant le numéro de chambre est présent
if (!empty($params[3])) {
  // Récupère les informations de la chambre à partir de son numéro
  $chambre = recuperer_chambre_par_son_num_chambre($params[3]);
}

$liste_chambre = recuperer_infos_chambre();


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

<style>
  .btn-custom {
    --bs-btn-color: #fff;
    --bs-btn-border-color: #000000;
    --bs-btn-bg: #cda45e;
    --bs-btn-hover-bg: #9d6b15;
    --bs-btn-hover-border-color: #9d6b15;
  }

  .btn-danger-custom {
    --bs-btn-color: #fff;
    --bs-btn-bg: #3b070c;
    --bs-btn-border-color: #3b070c;
    --bs-btn-hover-bg: #b30617;
    --bs-btn-hover-border-color: #b30617;
  }

  .btn-success-custom {
    --bs-btn-color: #fff;
    --bs-btn-bg: #013534;
    --bs-btn-border-color: #000000;
    --bs-btn-hover-bg: #9d6b15;
    --bs-btn-hover-border-color: #000000;
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

      <div class="row mt-4">
        <div class="card my-2 border-0 rounded-0" style="background-color: #0c0b09">
          <!-- ======= Hero Section ======= -->
          <section id="hero4" class="d-flex align-items-center">
            <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="row">
                <div class="col-lg-12 mb-3">
                  <h1>Espace Détails <span>chambre <?php echo $chambre['num_chambre']; ?> : <?php echo $chambre['lib_typ']; ?></span></h1>
                </div>
              </div>
            </div>
          </section>
          <!-- End Hero -->
          <div class="col-12 container d-flex">
            <div class="col-md-6" style="margin-right: 48px;">
              <div class="card mb-4 shadow-sm zoom-effect-container">
                <img class="bd-placeholder-img card-img-top zoom-effect" width="100%" height="auto" src="<?php echo $chambre['photos']; ?>" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
              </div>

              <!-- <h3 class="card-title">
                  Détails de la chambre <?php echo $chambre['num_chambre']; ?> : <?php echo $chambre['lib_typ']; ?>
                </h3> -->

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

                  <!-- <?php
                        if (check_if_user_connected_client()) {
                        ?>
                    <button class="btn btn-primary mt-1" id="toggleButton" onclick="toggleBlock()">
                      Réserver maintenant
                    </button>
                  <?php
                        }
                  ?> -->
                </div>
              </div>


            </div>

            <div class="col-md-6">
              <div class="card-body px-0">

                <h5 style=" text-align:center; margin-bottom: 20px;">
                  Faire une réservation !
                </h5>
                
                <!-- <div style="border-radius: 30px; border: beige solid; padding: 20px;"> -->

                <!-- Le champ Numéro de chambre -->
                <div class="col-md-12 mb-3">
                  <label for="num_res">Numéro de chambre :
                    <span class="text-danger">(*)</span>
                  </label>
                  <select class="form-control" id="num_res" name="num_res[]" onchange="mettreAJourPrix()">
                    <option value="" data-type="standard" data-prix="0">Sélectionnez le numéro de chambre</option>

                    <?php
                    foreach ($liste_chambre as $chambre) {
                      $option_value = $chambre['num_chambre'] . ' - ' . $chambre['lib_typ'];
                      $prix_par_chambre = $chambre['pu'];
                      echo '<option value="' . $chambre['num_chambre'] . '" data-type="' . $chambre['lib_typ'] . '" data-prix="' . $prix_par_chambre[$chambre['num_chambre']] . '">' . $option_value . '</option>';
                    }
                    ?>

                  </select>
                  <?php if (isset($erreurs["num_res"]) && !empty($erreurs["num_res"])) { ?>
                    <span class="text-danger">
                      <?= $erreurs["num_res"]; ?>
                    </span>
                  <?php } ?>
                </div>


                <!-- Le champ nom et contact accompagnateur -->
                <div class="row">
                  <!-- Le champ nom_acc -->
                  <div class="col-md-6 mb-1">
                    <label for="modification-nom_acc">
                      Nom de l'accompagnateur:
                    </label>
                    <input type="text" name="nom_acc[]" id="modification-nom_acc" class="form-control" value="<?= !empty($info['nom_acc']) ? $info['nom_acc'] : '' ?>" required>
                  </div>

                  <!-- Le champ contact_acc -->
                  <div class="col-md-5 mb-1">
                    <label for="modification-contact_acc">
                      Contact de l'accompagnateur:
                    </label>
                    <input type="text" name="contact_acc[]" id="modification-contact_acc" class="form-control" value="<?= !empty($info['contact']) ? $info['contact'] : '' ?>" required>
                  </div>

                  <!-- Bouton pour ajouter un accompagnateur -->
                  <div class="col-md-1 mb-3" style="display: flex; align-items: flex-end; justify-content: center; margin-top: 21px;">
                    <button type="button" class="btn btn-custom ajouter-accompagnateur-btn">+</button>
                  </div>


                  <!-- Conteneur pour les champs d'accompagnateur dynamiques -->
                  <div id="champs-accompagnateur-dynamiques-container">
                    <!-- Les champs d'accompagnateur seront ajoutés ici en fonction des boutons "+" -->
                  </div>
                </div>

                <!-- Le champ début et fin occupation -->
                <div class="row">
                  <!-- Le champ date de début occupation -->
                  <div class="col-md-6 mb-1">
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

                  <!-- Le champ date de fin occupation -->
                  <div class="col-md-6 mb-1">
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
                <!-- </div> -->


                <div class="col-lg-12 mt-4">
                  <h5 style="font-weight: bold">Nombre total de jours : <span id="nombre_jour">0</span></h5>
                  <h5 style="font-weight: bold">Montant total : <span id="prix_total">0</span> </h5>
                </div>

                <!-- Bouton pour ajouter un conteneur -->
                <div class="col-md-12 mb-3" style="justify-content: center; display: flex;">
                  <button type="button" class="btn btn-custom" id="ajouter-chambres">Ajouter une chambre</button>
                </div>


                <!-- Conteneur pour les champs de chambre dynamiques -->
                <div id="champs-chambres-dynamiques-container">
                  <!-- Les champs de chambre seront ajoutés ici en fonction des boutons "+" et "-" -->
                </div>

                <!-- Bouton pour supprimer un conteneur (initialisé comme caché) -->
                <div class="col-md-12 mb-3" style="justify-content: center; display: flex; display: none;" id="retirer-chambre-container">
                  <button type="button" class="btn btn-danger" id="retirer-chambre" style="--bs-btn-color: #fff; --bs-btn-bg: #b30617; --bs-btn-border-color: #b30617;">Retirer une chambre</button>
                </div>

                <div class="float-right" style="text-align: right;">
                  <button type="reset" class="btn btn-danger-custom">
                    Annuler
                  </button>
                  <button type="submit" name="enregistrer" class="btn btn-success-custom">
                    Enregistrer
                  </button>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>


  </section>
</div>
<?php } ?>



<script>
  document.addEventListener('DOMContentLoaded', function() {
    var ajouterAccompagnateurBtn = document.querySelector('.ajouter-accompagnateur-btn');
    var ajouterAccompagnateur2Btn = document.querySelector('.ajouter-accompagnateur2-btn');
    var ajouterChambreBtn = document.querySelector('#ajouter-chambres');
    var retirerChambreBtn = document.querySelector('#retirer-chambre');

    // Écouteur d'événement pour le bouton "+" (ajouter accompagnateur)
    ajouterAccompagnateurBtn.addEventListener('click', function() {
      // Ajoutez ici le code pour ajouter dynamiquement les champs d'accompagnateur
      var container = document.getElementById('champs-accompagnateur-dynamiques-container');
      var nouvelAccompagnateur = document.createElement('div');
      nouvelAccompagnateur.innerHTML = `
            <div class="row">
                <div class="col-md-6 mb-1">
                    <label for="nouveau-nom_acc">Nom de l'accompagnateur:</label>
                    <input type="text" name="nom_acc[]" class="form-control" required>
                </div>
                <div class="col-md-5 mb-1">
                    <label for="nouveau-contact_acc">Contact de l'accompagnateur:</label>
                    <input type="text" name="contact_acc[]" class="form-control" required>
                </div>

                <div class="col-md-1 mb-3" style="display: flex; align-items: flex-end; justify-content: center; margin-top: 21px;">
                    <button type="button" class="btn btn-danger" onclick="supprimerAccompagnateur(this)">-</button>
                </div>
            </div>
        `;
      container.appendChild(nouvelAccompagnateur);
    });


    // Écouteur d'événement pour le bouton "Ajouter une chambre"
    ajouterChambreBtn.addEventListener('click', function() {
      // Ajoutez ici le code pour ajouter dynamiquement les champs pour une nouvelle chambre
      var container = document.getElementById('champs-chambres-dynamiques-container');
      var nouvelleChambre = document.createElement('div');
      nouvelleChambre.innerHTML = `
            <!-- Le champ Numéro de chambre -->
            <div class="col-md-12 mb-3">
                <label for="num_res">Numéro de chambre :
                    <span class="text-danger">(*)</span>
                </label>
                <select class="form-control num_res" name="num_res[]">
                    <option value="" data-type="standard">Sélectionnez le numéro de chambre</option>
                    <?php
                    $liste_chambre = recuperer_infos_chambre();
                    foreach ($liste_chambre as $chambre) {
                      $option_value = $chambre['num_chambre'] . ' - ' . $chambre['lib_typ'];
                      echo '<option value="' . $chambre['num_chambre'] . '" data-type="' . $chambre['lib_typ'] . '">' . $option_value . '</option>';
                    }
                    ?>
                </select>
                <?php if (isset($erreurs["num_res"]) && !empty($erreurs["num_res"])) { ?>
                    <span class="text-danger"><?= $erreurs["num_res"]; ?></span>
                <?php } ?>
            </div>

            <!-- Le champ nom et contact accompagnateur -->
            <div class="row">
                <!-- Le champ nom_acc -->
                <div class="col-md-6 mb-1">
                    <label for="modification-nom_acc">Nom de l'accompagnateur:</label>
                    <input type="text" name="nom_acc[]" class="form-control" required>
                </div>

                <!-- Le champ contact_acc -->
                <div class="col-md-5 mb-1">
                    <label for="modification-contact_acc">Contact de l'accompagnateur:</label>
                    <input type="text" name="contact_acc[]" class="form-control" required>
                </div>

                <!-- Bouton pour ajouter un accompagnateur -->
                <div class="col-md-1 mb-3" style="display: flex; align-items: flex-end; justify-content: center; margin-top: 21px;">
                    <button type="button" class="btn btn-success ajouter-accompagnateur2-btn">+</button>
                </div>

                <!-- Conteneur pour les champs d'accompagnateur dynamiques -->
                <div class="champs-accompagnateur2-dynamiques-container">
                    <!-- Les champs d'accompagnateur seront ajoutés ici en fonction des boutons "+" -->
                </div>
            </div>

            <!-- Le champ début et fin occupation -->
            <div class="row">
                <!-- Le champ date de début occupation -->
                <div class="col-md-6 mb-1">
                    <label for="inscription-deb_occ">Début de séjour:
                        <span class="text-danger">(*)</span>
                    </label>
                    <div class="input-group mb-3">
                        <input type="date" name="deb_occ" class="form-control" placeholder="Veuillez entrer votre date de début occupation" value="<?= (isset($donnees["deb_occ"]) && !empty($donnees["deb_occ"])) ? $donnees["deb_occ"] : ""; ?>" min="<?= date('Y-m-d'); ?>" required>
                    </div>
                    <?php if (isset($erreurs["deb_occ"]) && !empty($erreurs["deb_occ"])) { ?>
                        <span class="text-danger"><?= $erreurs["deb_occ"]; ?></span>
                    <?php } ?>
                </div>

                <!-- Le champ date de fin occupation -->
                <div class="col-md-6 mb-1">
                    <label for="inscription-fin_occ">Fin de séjour:
                        <span class="text-danger">(*)</span>
                    </label>
                    <div class="input-group mb-3">
                        <input type="date" name="fin_occ" class="form-control" placeholder="Veuillez entrer votre date de fin occupation" value="<?= (isset($donnees["fin_occ"]) && !empty($donnees["fin_occ"])) ? $donnees["fin_occ"] : ""; ?>" min="<?= date('Y-m-d'); ?>" required>
                    </div>

                    <?php if (isset($erreurs["fin_occ"]) && !empty($erreurs["fin_occ"])) { ?>
                        <span class="text-danger"><?= $erreurs["fin_occ"]; ?></span>
                    <?php } ?>
                </div>

                <div class="col-lg-12 mt-4">
                    <h5 style="font-weight: bold">Nombre total de jours : <span id="nombre_jour2">0</span></h5>
                    <h5 style="font-weight: bold">Montant total : <span id="prix_total2">0</span> </h5>
                </div>

                <!-- Bouton pour supprimer un conteneur -->
                <div class="col-md-12 mb-3" style="justify-content: center; display: flex;">
                    <button type="button" class="btn btn-danger" onclick="retirerChambre(this)" style="--bs-btn-color: #fff; --bs-btn-bg: #b30617; --bs-btn-border-color: #b30617;">Retirer une chambre</button>
                </div>
            </div>
        `;
      container.appendChild(nouvelleChambre);

      // Get the newly created elements
      var numResSelect = nouvelleChambre.querySelector('.num_res');
      var ajouterAccompagnateur2Btn = nouvelleChambre.querySelector('.ajouter-accompagnateur2-btn');

      // Add event listeners to the new elements
      numResSelect.addEventListener('change', function() {
        var selectedOption = numResSelect.options[numResSelect.selectedIndex];
        var typeChambre = selectedOption.getAttribute('data-type');
        var typeChambreInput = nouvelleChambre.querySelector('.typeChambre');
        typeChambreInput.value = typeChambre;
      });

      ajouterAccompagnateur2Btn.addEventListener('click', function() {
        // Ajoutez ici le code pour ajouter dynamiquement les champs d'accompagnateur
        var container = nouvelleChambre.querySelector('.champs-accompagnateur2-dynamiques-container');
        var nouvelAccompagnateur2 = document.createElement('div');
        nouvelAccompagnateur2.innerHTML = `
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <label for="nouveau-nom_acc">Nom de l'accompagnateur:</label>
                        <input type="text" name="nom_acc[]" class="form-control" required>
                    </div>
                    <div class="col-md-5 mb-1">
                        <label for="nouveau-contact_acc">Contact de l'accompagnateur:</label>
                        <input type="text" name="contact_acc[]" class="form-control" required>
                    </div>

                    <div class="col-md-1 mb-3" style="display: flex; align-items: flex-end; justify-content: center; margin-top: 21px;">
                        <button type="button" class="btn btn-danger" onclick="supprimerAccompagnateur(this)">-</button>
                    </div>
                </div>
            `;
        container.appendChild(nouvelAccompagnateur2);
      });
    });

    // Écouteur d'événement pour le bouton "+" (ajouter accompagnateur2)
    ajouterAccompagnateur2Btn.addEventListener('click', function() {
      // Ajoutez ici le code pour ajouter dynamiquement les champs d'accompagnateur
      var container = document.getElementById('champs-accompagnateur2-dynamiques-container');
      var nouvelAccompagnateur2 = document.createElement('div');
      nouvelAccompagnateur2.innerHTML = `
            <div class="row">
                <div class="col-md-6 mb-1">
                    <label for="nouveau-nom_acc">Nom de l'accompagnateur:</label>
                    <input type="text" name="nom_acc[]" class="form-control" required>
                </div>
                <div class="col-md-5 mb-1">
                    <label for="nouveau-contact_acc">Contact de l'accompagnateur:</label>
                    <input type="text" name="contact_acc[]" class="form-control" required>
                </div>

                <div class="col-md-1 mb-3" style="display: flex; align-items: flex-end; justify-content: center; margin-top: 21px;">
                    <button type="button" class="btn btn-danger" onclick="supprimerAccompagnateur(this)">-</button>
                </div>
            </div>
        `;
      container.appendChild(nouvelAccompagnateur2);
    });



  });

  // Fonction pour supprimer un champ d'accompagnateur
  function supprimerAccompagnateur(element) {
    var row = element.closest('.row');
    row.remove();
  }

  // Écouteur d'événement pour le bouton "Retirer chambre"
  retirerChambreBtn.addEventListener('click', function() {
    // Ajoutez ici le code pour retirer dynamiquement une chambre
    var container = document.getElementById('champs-chambres-dynamiques-container');
    var dernierChambre = container.lastElementChild;
    if (dernierChambre) {
      container.removeChild(dernierChambre);
    }
  });

  // Fonction pour retirer une chambre
  function retirerChambre(element) {
    var container = document.getElementById('champs-chambres-dynamiques-container');
    var dernierChambre = container.lastElementChild;
    if (dernierChambre) {
      container.removeChild(dernierChambre);
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
    const select = document.getElementById('num_res');
    const selectedOption = select.options[select.selectedIndex];
    const prixParJour = parseFloat(selectedOption.getAttribute('data-prix')); // Assurez-vous que le prix est un nombre

    const dateDebut = new Date(document.getElementById('inscription-deb_occ').value);
    const dateFin = new Date(document.getElementById('inscription-fin_occ').value);

    if (dateFin <= dateDebut) {
      alert("La date de fin doit être après la date de début.");
      document.getElementById('nombre_jour').innerText = '0';
      document.getElementById('prix_total').innerText = '0 F';
      return;
    }

    const jours = calculerDifferenceJours(dateDebut, dateFin);
    const montantTotal = prixParJour * jours;

    document.getElementById('nombre_jour').innerText = jours.toString();
    document.getElementById('prix_total').innerText = montantTotal + ' F';
  }

  // Écouteurs d'événements pour mettre à jour les calculs lorsqu'une date est changée
  document.getElementById('inscription-deb_occ').addEventListener('change', mettreAJourPrix);
  document.getElementById('inscription-fin_occ').addEventListener('change', mettreAJourPrix);
</script>


<!-- <script>
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
</script> -->

<script>
  // Fonction pour afficher/cacher les ensembles de champs d'accompagnateurs en fonction du nombre sélectionné
  function toggleAccompagnateursFields() {
    var nombreAccompagnateurs = parseInt(document.getElementById("nombre-accompagnateurs").value);

    for (var i = 1; i <= 4; i++) {
      var accompagnateurFields = document.getElementById("accompagnateur-" + i);

      if (accompagnateurFields) {
        // Vérifier si l'élément existe avant d'accéder à sa propriété style
        if (i <= nombreAccompagnateurs) {
          accompagnateurFields.style.display = "flex";
        } else {
          accompagnateurFields.style.display = "none";
        }
      } else {
        console.error("Element not found: accompagnateur-" + i);
      }
    }
  }


  function toggleAccompagnateursFields() {
    var nombreAccompagnateurs = parseInt(document.getElementById("nombre-accompagnateurs").value);

    for (var i = 1; i < 3; i++) {
      var accompagnateurFields = document.getElementById("accompagnateur-" + i);

      if (accompagnateurFields) {
        // Vérifier si l'élément existe avant d'accéder à sa propriété style
        if (i <= nombreAccompagnateurs) {
          accompagnateurFields.style.display = "flex";
        } else {
          accompagnateurFields.style.display = "none";
        }
      } else {
        console.error("Element not found: accompagnateur-" + i);
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
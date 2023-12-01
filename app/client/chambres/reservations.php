<?php



$liste_chambre = recuperer_infos_chambre();

?>

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

<section>
    <div class="container">
        <div class="row">
            <h1 class="h3 mt-3">Effectuer une réservation</h1>
            <div class="card my-2 border-0 rounded-0">
                <div class="row" style="background-color: #0c0b09">
                    <div class="col-md-6">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?= PATH_PROJECT ?>public/images/Chambres/Solo/Solo5.JPG" alt="" class="img-fluid" />
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= PATH_PROJECT ?>public/images/Chambres/Suites/Suites5.JPG" class="d-block w-100" alt="..." />
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= PATH_PROJECT ?>public/images/Chambres/Doubles/Doubles.JPG" class="d-block w-100" alt="..." />
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= PATH_PROJECT ?>public/images/Chambres/Triples/Triples5.JPG" class="d-block w-100" alt="..." />
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="card-body px-0">
                            <!-- <div style="border-radius: 30px; border: beige solid; padding: 20px;"> -->
                            <form action="<?= PATH_PROJECT ?>client/chambres/traitement_reservations" method="POST">


                                <!-- Le champ Numéro de chambre -->
                                <div class="col-md-12 mb-3">
                                    <label for="num_chambre">Numéro de chambre :
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <select class="form-control chambre-select" id="num_chambre" name="num_chambre[]" onchange="mettreAJourPrix()">
                                        <option value="" data-type="standard" data-prix="0">Sélectionnez le numéro de chambre</option>

                                        <?php
                                        foreach ($liste_chambre as $chambre) {
                                            $option_value = $chambre['num_chambre'] . ' - ' . $chambre['lib_typ'];
                                            $prix_par_chambre = $chambre['pu'];
                                            echo '<option value="' . $chambre['num_chambre'] . '" data-type="' . $chambre['lib_typ'] . '" data-prix="' . $prix_par_chambre[$chambre['num_chambre']] . '">' . $option_value . '</option>';
                                        }
                                        ?>
                                    </select>

                                    <?php if (isset($erreurs["num_chambre"]) && !empty($erreurs["num_chambre"])) { ?>
                                        <span class="text-danger">
                                            <?= $erreurs["num_chambre"]; ?>
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
                                    <!-- <h5 style="font-weight: bold">Nombre total de jours : <span id="nombre_jour">0</span></h5> -->
                                    <!-- <h5 style="font-weight: bold">Montant total : <span id="prix_total">0</span> </h5> -->
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                <label for="num_chambre">Numéro de chambre :
                    <span class="text-danger">(*)</span>
                </label>
                <select class="form-control num_chambre" name="num_chambre[]">
                    <option value="" data-type="standard">Sélectionnez le numéro de chambre</option>
                    <?php
                    $liste_chambre = recuperer_infos_chambre();
                    foreach ($liste_chambre as $chambre) {
                        $option_value = $chambre['num_chambre'] . ' - ' . $chambre['lib_typ'];
                        echo '<option value="' . $chambre['num_chambre'] . '" data-type="' . $chambre['lib_typ'] . '">' . $option_value . '</option>';
                    }
                    ?>
                </select>
                <?php if (isset($erreurs["num_chambre"]) && !empty($erreurs["num_chambre"])) { ?>
                    <span class="text-danger"><?= $erreurs["num_chambre"]; ?></span>
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
                    <!-- <h5 style="font-weight: bold">Nombre total de jours : <span id="nombre_jour">0</span></h5>-->
                    <!-- <h5 style="font-weight: bold">Montant total : <span id="prix_total">0</span> </h5> -->
                </div>

                <!-- Bouton pour supprimer un conteneur -->
                <div class="col-md-12 mb-3" style="justify-content: center; display: flex;">
                    <button type="button" class="btn btn-danger" onclick="retirerChambre(this)" style="--bs-btn-color: #fff; --bs-btn-bg: #b30617; --bs-btn-border-color: #b30617;">Retirer une chambre</button>
                </div>
            </div>
        `;
            container.appendChild(nouvelleChambre);

            // Get the newly created elements
            var numResSelect = nouvelleChambre.querySelector('.num_chambre');
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

<!-- <script>
    // Fonction pour calculer le nombre de jours entre deux dates
    function calculerDifferenceJours(debut, fin) {
        const diffTime = Math.abs(fin - debut);
        const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24)) + 1; // Ajouter 1 jour
        return diffDays;
    }

    function mettreAJourPrix() {
        const select = document.getElementById('num_chambre');
        const selectedOption = select.options[select.selectedIndex];
        const prixParJour = parseFloat(selectedOption.getAttribute('data-prix')); // Assurez-vous que le prix est un nombre

        // Ajout de la sortie console pour vérifier le prix
        console.log('Prix récupéré:', prixParJour);

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
        document.getElementById('prix_total').innerText = montantTotal.toFixed(2) + ' F'; // Utiliser toFixed pour formater en deux décimales
    }

    // Écouteurs d'événements pour mettre à jour les calculs lorsqu'une date est changée
    document.getElementById('inscription-deb_occ').addEventListener('change', mettreAJourPrix);
    document.getElementById('inscription-fin_occ').addEventListener('change', mettreAJourPrix);

    // Appeler la fonction initiale pour afficher le montant total au chargement de la page
    mettreAJourPrix();
</script> -->


<!-- <script>
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
</script> -->
<?php
unset($_SESSION['erreurs-reservation'], $_SESSION['donnees-reservation'], $_SESSION['reservation-message-success-global'], $_SESSION['reservation-message-erreur-global']);


$include_icm_footer = true;
include('./app/commum/footer_.php');
?>
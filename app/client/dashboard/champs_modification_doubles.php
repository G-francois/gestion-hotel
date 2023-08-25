<!-- Champs pour le type Doubles -->
<div class="row">
    <!-- Le champ de date de début occupation -->
    <div class="col-md-6 mb-3">
        <label for="modification-deb_occ">
            Début de séjour :
            <span class="text-danger">(*)</span>
        </label>
        <div class="input-group mb-3">
            <input type="date" name="deb_occ" id="modification-deb_occ" class="form-control" placeholder="Veuillez entrer la date de début occupation" value="<?= (isset($donnees["deb_occ"]) && !empty($donnees["deb_occ"])) ? $donnees["deb_occ"] : ""; ?>" required>
        </div>
        <?php if (isset($erreurs["deb_occ"]) && !empty($erreurs["deb_occ"])) { ?>
            <span class="text-danger">
                <?php echo $erreurs["deb_occ"]; ?>
            </span>
        <?php } ?>
    </div>

    <!-- Le champ de date de fin occupation -->
    <div class="col-md-6 mb-3">
        <label for="modification-fin_occ">
            Fin de séjour :
            <span class="text-danger">(*)</span>
        </label>
        <div class="input-group mb-3">
            <input type="date" name="fin_occ" id="modification-fin_occ" class="form-control" placeholder="Veuillez entrer la date de fin occupation" value="<?= (isset($donnees["fin_occ"]) && !empty($donnees["fin_occ"])) ? $donnees["fin_occ"] : ""; ?>" required>
        </div>
        <?php if (isset($erreurs["fin_occ"]) && !empty($erreurs["fin_occ"])) { ?>
            <span class="text-danger">
                <?php echo $erreurs["fin_occ"]; ?>
            </span>
        <?php } ?>
    </div>
</div>


<div class="row">
    <!-- Le champs nom_acc -->
    <div class="col-md-6 mb-3">
        <label for="modification-nom_acc">
            Nom de l'accompagnateur:
        </label>
        <input type="text" name="nom_acc" id="modification-nom_acc" class="form-control" value="<?= (isset($donnees["nom_acc"]) && !empty($donnees["nom_acc"])) ? $donnees["nom_acc"] : ""; ?>">
    </div>

    <!-- Le champs contact_acc -->
    <div class="col-md-6 mb-3">
        <label for="modification-contact_acc">
            Contact de l'accompagnateur:
        </label>
        <input type="text" name="contact_acc" id="modification-contact_acc" class="form-control" value="<?= (isset($donnees["contact_acc"]) && !empty($donnees["contact_acc"])) ? $donnees["contact_acc"] : ""; ?>">
    </div>
</div>

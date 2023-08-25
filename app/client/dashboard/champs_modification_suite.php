<!-- Champs pour le type Suite -->
<div class="row">
    <!-- Le champ de date de début occupation -->
    <div class="col-md-6 mb-3">
        <label for="modification-deb_occ">
            Début de séjour :
            <span class="text-danger">(*)</span>
        </label>
        <div class="input-group mb-3">
            <input type="date" name="deb_occ" id="modification-deb_occ" class="form-control" placeholder="Veuillez entrer la date de début occupation" value="<?= $reservation['deb_occ'] ?>" required>
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
            <input type="date" name="fin_occ" id="modification-fin_occ" class="form-control" placeholder="Veuillez entrer la date de fin occupation" value="<?= $reservation['fin_occ'] ?>" required>
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
            Nom de l'accompagnateur 1:
        </label>
        <input type="text" name="nom_acc" id="modification-nom_acc" class="form-control" value="<?= (isset($donnees["nom_acc"]) && !empty($donnees["nom_acc"])) ? $donnees["nom_acc"] : ""; ?>">
    </div>

    <!-- Le champs contact_acc -->
    <div class="col-md-6 mb-3">
        <label for="modification-contact_acc">
            Contact de l'accompagnateur 1:
        </label>
        <input type="text" name="contact_acc" id="modification-contact_acc" class="form-control" value="<?= (isset($donnees["contact_acc"]) && !empty($donnees["contact_acc"])) ? $donnees["contact_acc"] : ""; ?>">
    </div>
</div>

<div class="row">
    <!-- Le champs nom_acc2 -->
    <div class="col-md-6 mb-3">
        <label for="modification-nom_acc2">
            Nom de l'accompagnateur 2:
        </label>
        <input type="text" name="nom_acc2" id="modification-nom_acc2" class="form-control" value="<?= (isset($donnees["nom_acc2"]) && !empty($donnees["nom_acc2"])) ? $donnees["nom_acc2"] : ""; ?>">
    </div>

    <!-- Le champs contact_acc2 -->
    <div class="col-md-6 mb-3">
        <label for="modification-contact_acc2">
            Contact de l'accompagnateur 2:
        </label>
        <input type="text" name="contact_acc2" id="modification-contact_acc2" class="form-control" value="<?= (isset($donnees["contact_acc2"]) && !empty($donnees["contact_acc2"])) ? $donnees["contact_acc2"] : ""; ?>">
    </div>
</div>

<div class="row">
    <!-- Le champs nom_acc3 -->
    <div class="col-md-6 mb-3">
        <label for="modification-nom_acc3">
            Nom de l'accompagnateur 3:
        </label>
        <input type="text" name="nom_acc3" id="modification-nom_acc3" class="form-control" value="<?= (isset($donnees["nom_acc3"]) && !empty($donnees["nom_acc3"])) ? $donnees["nom_acc3"] : ""; ?>">
    </div>

    <!-- Le champs contact_acc3 -->
    <div class="col-md-6 mb-3">
        <label for="modification-contact_acc3">
            Contact de l'accompagnateur 3:
        </label>
        <input type="text" name="contact_acc3" id="modification-contact_acc3" class="form-control" value="<?= (isset($donnees["contact_acc3"]) && !empty($donnees["contact_acc3"])) ? $donnees["contact_acc3"] : ""; ?>">
    </div>
</div>

<div class="row">
    <!-- Le champs nom_acc4 -->
    <div class="col-md-6 mb-3">
        <label for="modification-nom_acc4">
            Nom de l'accompagnateur 4:
        </label>
        <input type="text" name="nom_acc4" id="modification-nom_acc4" class="form-control" value="<?= (isset($donnees["nom_acc4"]) && !empty($donnees["nom_acc4"])) ? $donnees["nom_acc4"] : ""; ?>">
    </div>

    <!-- Le champs contact_acc4 -->
    <div class="col-md-6 mb-3">
        <label for="modification-contact_acc4">
            Contact de l'accompagnateur 4:
        </label>
        <input type="text" name="contact_acc4" id="modification-contact_acc4" class="form-control" value="<?= (isset($donnees["contact_acc4"]) && !empty($donnees["contact_acc4"])) ? $donnees["contact_acc4"] : ""; ?>">
    </div>
</div>
<!-- Champs pour le type Triples -->
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
        <input type="text" name="nom_acc" id="modification-nom_acc" class="form-control" value="<?= $accompagnateurs_res['nom_acc'] ?>">
    </div>

    <!-- Le champs contact_acc -->
    <div class="col-md-6 mb-3">
        <label for="modification-contact_acc">
            Contact de l'accompagnateur 1:
        </label>
        <input type="text" name="contact_acc" id="modification-contact_acc" class="form-control" value="<?= $accompagnateurs_res['contact_acc'] ?>">
    </div>

</div>

<div class="row">
    <!-- Le champs nom_acc2 -->
    <div class="col-md-6 mb-3">
        <label for="modification-nom_acc2">
            Nom de l'accompagnateur 2:
        </label>
        <input type="text" name="nom_acc2" id="modification-nom_acc2" class="form-control" value="<?= $accompagnateurs_res[0]['nom_acc'] ?>">
    </div>

    <!-- Le champs contact_acc2 -->
    <div class="col-md-6 mb-3">
        <label for="modification-contact_acc2">
            Contact de l'accompagnateur 2:
        </label>
        <input type="text" name="contact_acc2" id="modification-contact_acc2" class="form-control" value="<?= $accompagnateurs_res[0]['contact_acc'] ?>">
    </div>
</div>
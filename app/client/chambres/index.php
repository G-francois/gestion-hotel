<?php

$include_client_header = true;
include('./app/commum/header_.php');

$data = [];

if (!empty($_SESSION['data'])) {
  $data = $_SESSION['data'];
}

$page  = 1;

if (!empty($params[3])) {
  $page = $params[3];
}


$liste_chambres = liste_chambres($page);

if (!empty($data['type_chambre'])) {
  $liste_chambres = liste_chambres($page, $data['type_chambre']);
}


$types = liste_types();

?>

<style>
  .pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
  }

  .pagination li {
    margin: 0 5px;
  }

  .pagination a {
    text-decoration: none;
    padding: 5px 10px;
    /* border: 1px solid #ccc;
    border-radius: 3px; */
  }

  .pagination a.active {
    background-color: #007bff;
    color: #fff;
    /* border-color: #007bff; */
  }

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

<!-- ======= Hero Section ======= -->
<section id="hero3" class="d-flex align-items-center">
  <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
    <div class="row">
      <div class="col-lg-8">
        <h1>Espace<span> Chambre</span></h1>
        <h2>
          Réservez directement avec nous pour les meilleurs tarifs garantis.
          <br />
          À l'hôtel Sous les Cocotiers, vous trouverez nos chambres qui offrent un maximum de confort : grandes, meublées et
          décorées dans un style minimaliste, qui permet une utilisation optimal de l'espace. Nous vous invitons
          à profiter des services que nous vous proposons : 32 logements au
          Sous les Cocotiers, des chambres avec balcon ou terrasse, avec de grands lits confortables, bureau, TV LCD, internet Wi-Fi,
          minibar et climatisation.
        </h2>
      </div>
    </div>
  </div>
</section>
<!-- End Hero -->

<!-- chambre -->
<section>
  <div class="container">
    <form action="<?= PATH_PROJECT ?>client/chambres/traitement-chambre" method="post" class="user" novalidate>
      <div class="row">
        <div class="row justify-content-end">
          <div class="col-3">
            <div class="input-group mb-3">
              <select class="form-select" aria-label="Sélectionner un type de chambre" name="type_chambre">
                <option value="">Tout Afficher</option>
                <?php
                if (!empty($types)) {
                  foreach ($types as $type) {
                ?>
                    <option <?php echo !empty($data['type_chambre']) && $data['type_chambre'] == $type ? 'selected' : '' ?> value="<?= $type ?>"><?= $type ?></option>
                <?php
                  }
                }
                ?>

              </select>
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
            </div>
          </div>
        </div>

        <?php

        // Affichez les chambres de la page actuelle
        if (!empty($liste_chambres)) {
          foreach ($liste_chambres as $chambre) {
        ?>
            <div class="col-md-4">
              <a href="<?= PATH_PROJECT . 'client/chambres/details_chambre/' . $chambre['num_chambre'] ?>">
                <div class="card mb-4 shadow-sm">
                  <div class="zoom-effect-container">
                    <img class="bd-placeholder-img card-img-top zoom-effect" width="100%" height="225" src="<?= $chambre['photos'] == 'Aucune_image' ? PATH_PROJECT . 'public/images/default_chambre.jpeg' : $chambre['photos'] ?>" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                  </div>
                  <div class="card-body">
                    <p class="card-text" style="color:black;"> Chambre <?php echo $chambre['num_chambre']; ?></p>
                    <!-- <a href="<?= PATH_PROJECT . 'client/chambres/details_chambre/' . $chambre['num_chambre'] ?>">Détails</a> -->
                  </div>
                </div>
              </a>
            </div>
          <?php
          }
          ?>

          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php if ($page > 1) : ?>
                <li class="page-item"><a class="page-link" href="<?= PATH_PROJECT . 'client/chambres/index/' ?><?= $page - 1 ?>">Précédent</a></li>
              <?php endif; ?>
              <li class="page-item active"><a class="page-link" href="#"><?= $page ?></a></li>
              <?php if (!empty($liste_chambres)) : ?>
                <li class="page-item"><a class="page-link" href="<?= PATH_PROJECT . 'client/chambres/index/' ?><?= $page + 1 ?>">Suivant</a></li>
              <?php endif; ?>
            </ul>
          </nav>

        <?php
        } else {
        ?>
          <!-- Affiche un message d'erreur si la chambre n'existe pas -->
          <div>
            La page chambre que vous souhaitez voir n'existe pas.
            <a class="" href="<?= PATH_PROJECT ?>client/chambres" style="color: #cda45e;">Retour vers la liste des chambres</a>
          </div>
        <?php
        }
        ?>
      </div>
    </form>
  </div>
</section>

<?php
$include_icm_footer = true;
include('./app/commum/footer_.php');

//unset($_SESSION['data']);

?>
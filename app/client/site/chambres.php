<?php
include './app/commum/header_client.php'
?>


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
          à profiter des services que nous vous proposons : 30 logements au
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
    <div class="row">
      <div class="card my-5 border-0 rounded-0">
        <div class="row" style="background-color: #0c0b09">
          <div class="col-md-6">
            <div class="card-body px-0">
              <h3 class="card-title">Chambre Solo</h3>
              <p class="card-text">
                Situé au premier étage de l'hôtel, la chambres solo allie
                confort et fonctionnalité dans un esprit simple et
                chaleureux. La taille de la chambre et la vue sur la petite
                cour pavée vous donne une vue panoramique. Devant
                le pupitre, le solitaire peut prendre la plume… Rien ne
                viendra le perturber.
              </p>
              <div>
                <div style="display: flex">
                  <p><i class="fas fa-user-circle"></i> 1 VOYAGEURS</p>
                  <p style="margin-left: 2rem">
                    <i class="fas fa-vector-square"></i> 30m²
                  </p>
                </div>
                <a style="
                        border: 2px solid #78635a;
                        color: #78635a;
                        padding: 10px;
                        text-decoration: none;
                      " href="<?= PATH_PROJECT ?>client/site/reservation-solo" class="nd_booking_padding_15_30_important nd_options_second_font_important nd_booking_border_radius_0_important nd_booking_background_color_transparent_important nd_booking_cursor_pointer nd_booking_display_inline_block nd_booking_font_size_11 nd_booking_font_weight_bold nd_booking_letter_spacing_2">Réserver maintenant pour 15.000F</a>
              </div>

              <div style="padding-top: 3em">
                <a title="Cocktail De Bienvenue" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Cocktail De Bienvenue" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-13.png" /></a>
                <a title="Salle de bains privée" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Salle de bains privée" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-10.png" /></a>
                <a title="Non fumeur" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Non fumeur" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-14.png" /></a>
                <a title="satellite-tv" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="satellite-tv" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-18.png" /></a>
                <a title="Wifi" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Wifi" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-12-1.png" /></a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="<?= PATH_PROJECT ?>public/images/Chambres/Solo/Solo4.jpg" class="d-block w-100" alt="..." />
                </div>

                <div class="carousel-item">
                  <img src="<?= PATH_PROJECT ?>public/images/Chambres/Solo/Solo3.jpg" class="d-block w-100" alt="..." />
                </div>

                <div class="carousel-item">
                  <img src="<?= PATH_PROJECT ?>public/images/Chambres/Solo/Solo2.jpg" class="d-block w-100" alt="..." />
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
        </div>
      </div>
    </div>

    <div class="row">
      <div class="card my-5 border-0 rounded-0">
        <div class="row" style="background-color: #0c0b09">
          <div class="col-md-6">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="<?= PATH_PROJECT ?>public/images/Chambres/Doubles/Doubles5.jpg" class="d-block w-100" alt="..." />
                </div>

                <div class="carousel-item">
                  <img src="<?= PATH_PROJECT ?>public/images/Chambres/Doubles/Doubles4.jpg" class="d-block w-100" alt="..." />
                </div>

                <div class="carousel-item">
                  <img src="<?= PATH_PROJECT ?>public/images/Chambres/Doubles/Doubles3.webp" class="d-block w-100" alt="..." />
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
              <h3 class="card-title">Chambre Doubles</h3>
              <p class="card-text">
                Situé au deuxième étage de l'hôtel, profitez du balcon et de
                la vue sur la vallée. Cette chambre est conçue pour héberger deux
                personnes et est équipée d'un grand lit standard
                (140-160*200) ou de deux lits simples (90*200)
              </p>
              <div>
                <div style="display: flex">
                  <p><i class="fas fa-user-circle"></i> 2 VOYAGEURS</p>
                  <p style="margin-left: 2rem">
                    <i class="fas fa-vector-square"></i> 50m²
                  </p>
                </div>
                <a style="
                        border: 2px solid #78635a;
                        color: #78635a;
                        padding: 10px;
                        text-decoration: none;
                      " href="<?= PATH_PROJECT ?>client/site/reservation-double" class="nd_booking_padding_15_30_important nd_options_second_font_important nd_booking_border_radius_0_important nd_booking_background_color_transparent_important nd_booking_cursor_pointer nd_booking_display_inline_block nd_booking_font_size_11 nd_booking_font_weight_bold nd_booking_letter_spacing_2">Réserver maintenant pour 25.000F </a>
              </div>

              <div style="padding-top: 3em">
                <a title="Lits Twin" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Lits Twin" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-12.png" /></a>
                <a title="Cocktail De Bienvenue" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Cocktail De Bienvenue" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-13.png" /></a>
                <a title="Salle de bains privée" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Salle de bains privée" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-10.png" /></a>
                <a title="Non fumeur" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Non fumeur" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-14.png" /></a>
                <a title="satellite-tv" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="satellite-tv" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-18.png" /></a>
                <a title="Wifi" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Wifi" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-12-1.png" /></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="card my-5 border-0 rounded-0">
        <div class="row" style="background-color: #0c0b09">
          <div class="col-md-6">
            <div class="card-body px-0">
              <h3 class="card-title">Chambre Triples</h3>
              <p class="card-text">
                Situé au troisième étage et idéal pour les excursions en
                petits groupes. Elle est équipée de 3 couchages et peuvent
                donc accueillir 3 personnes. La configuration peut être 3
                lits d'une personne ou bien 1 lit double de 2 personnes et 1
                d'une personne avec un canapé.
              </p>
              <div>
                <div style="display: flex">
                  <p><i class="fas fa-user-circle"></i> 3 VOYAGEURS</p>
                  <p style="margin-left: 2rem">
                    <i class="fas fa-vector-square"></i> 70m²
                  </p>
                </div>
                <a style="
                        border: 2px solid #78635a;
                        color: #78635a;
                        padding: 10px;
                        text-decoration: none;
                      " href="<?= PATH_PROJECT ?>client/site/reservation-triple" class="nd_booking_padding_15_30_important nd_options_second_font_important nd_booking_border_radius_0_important nd_booking_background_color_transparent_important nd_booking_cursor_pointer nd_booking_display_inline_block nd_booking_font_size_11 nd_booking_font_weight_bold nd_booking_letter_spacing_2">Réserver maintenant pour 35.000F </a>
              </div>

              <div style="padding-top: 3em">
                <a title="Lits Twin" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Lits Twin" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-12.png" /></a>
                <a title="Cocktail De Bienvenue" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Cocktail De Bienvenue" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-13.png" /></a>
                <a title="Petit Déjeuner" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Petit Déjeuner" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-17.png" /></a>
                <a title="Salle de bains privée" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Salle de bains privée" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-10.png" /></a>
                <a title="Non fumeur" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Non fumeur" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-14.png" /></a>
                <a title="satellite-tv" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="satellite-tv" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-18.png" /></a>
                <a title="Blanchisserie" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Blanchisserie" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-15.png" /></a>
                <a title="Wifi" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Wifi" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-12-1.png" /></a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="<?= PATH_PROJECT ?>public/images/Chambres/Triples/Triples3.jpg" class="d-block w-100" alt="..." />
                </div>

                <div class="carousel-item">
                  <img src="<?= PATH_PROJECT ?>public/images/Chambres/Triples/Triples2.jpg" class="d-block w-100" alt="..." />
                </div>

                <div class="carousel-item">
                  <img src="<?= PATH_PROJECT ?>public/images/Chambres/Triples/Triples.jpg" class="d-block w-100" alt="..." />
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
        </div>
      </div>
    </div>

    <div class="row">
      <div class="card my-5 border-0 rounded-0">
        <div class="row" style="background-color: #0c0b09">
          <div class="col-md-6">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="<?= PATH_PROJECT ?>public/images/Chambres/Suites/Suites5.jpg" class="d-block w-100" alt="..." />
                </div>

                <div class="carousel-item">
                  <img src="<?= PATH_PROJECT ?>public/images/Chambres/Suites/Suites4.jpg" class="d-block w-100" alt="..." />
                </div>

                <div class="carousel-item">
                  <img src="<?= PATH_PROJECT ?>public/images/Chambres/Suites/Suites3.jpg" class="d-block w-100" alt="..." />
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
              <h3 class="card-title">Suites</h3>
              <p class="card-text">
                Situé au dernier étage de l'hôtel avec une vue imprenable,
                il possède une salle de bain attenante, de petites dépendances et un coin repas.
              </p>
              <div>
                <div style="display: flex">
                  <p><i class="fas fa-user-circle"></i> 5 VOYAGEURS</p>
                  <p style="margin-left: 2rem">
                    <i class="fas fa-vector-square"></i> 100m²
                  </p>
                </div>
                <a style="
                        border: 2px solid #78635a;
                        color: #78635a;
                        padding: 10px;
                        text-decoration: none;
                      " href="<?= PATH_PROJECT ?>client/site/reservation-suit" class="nd_booking_padding_15_30_important nd_options_second_font_important nd_booking_border_radius_0_important nd_booking_background_color_transparent_important nd_booking_cursor_pointer nd_booking_display_inline_block nd_booking_font_size_11 nd_booking_font_weight_bold nd_booking_letter_spacing_2">Réserver maintenant pour 50.000F</a>
              </div>

              <div style="padding-top: 3em">
                <a title="Cocktail De Bienvenue" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Cocktail De Bienvenue" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-13.png" /></a>
                <a title="Lits Twin" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Lits Twin" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-12.png" /></a>
                <a title="Petit Déjeuner" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Petit Déjeuner" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-17.png" /></a>
                <a title="Salle de bains privée" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Salle de bains privée" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-10.png" /></a>
                <a title="Non fumeur" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Non fumeur" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-14.png" /></a>
                <a title="satellite-tv" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="satellite-tv" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-18.png" /></a>
                <a title="Blanchisserie" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Blanchisserie" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-15.png" /></a>
                <a title="Wifi" class="nd_booking_tooltip_jquery nd_booking_float_left"><img alt="Wifi" class="nd_booking_margin_right_15 nd_booking_float_left" width="23" height="23" src="<?= PATH_PROJECT ?>public/images/Icons/icon-12-1.png" /></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php

include './app/commum/footer_client.php'

?>
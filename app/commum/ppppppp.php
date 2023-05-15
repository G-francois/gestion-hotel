// chat gtp pour les lien active

<!DOCTYPE html>
<html>
<head>
  <style>
    .active {
      color: blue; /* Couleur du lien actif */
    }
  </style>
</head>
<body>
  <a href="#" class="active" onclick="toggleActiveLink(this)">Lien 1</a>
  <a href="#" onclick="toggleActiveLink(this)">Lien 2</a>
  <a href="#" onclick="toggleActiveLink(this)">Lien 3</a>

  <script>
    function toggleActiveLink(clickedLink) {
      // Désactiver le lien actuellement actif
      var activeLink = document.querySelector('.active');
      activeLink.classList.remove('active');

      // Activer le lien cliqué
      clickedLink.classList.add('active');
    }
  </script>
</body>
</html>

Voici un exemple de code PHP qui affiche une image non cliquable 
par défaut sur le profil de l'utilisateur, mais qui devient cliquable pour une visualisation plus grande après un changement :
<?php
// URL de l'image par défaut
$imageUrl = 'chemin/vers/image-par-defaut.jpg';

// URL de l'image après le changement
$imageUrlApresChangement = 'chemin/vers/image-apres-changement.jpg';

// Vérifier si l'image a été changée
if (/* condition pour vérifier si l'image a été changée, par exemple en utilisant une base de données */) {
    // Utiliser l'URL de l'image après le changement
    $image = $imageUrlApresChangement;
    // Afficher l'image cliquable avec un lien vers une visualisation plus grande
    echo '<a href="' . $imageUrlApresChangement . '"><img src="' . $imageUrlApresChangement . '" alt="Image"></a>';
} else {
    // Utiliser l'URL de l'image par défaut
    $image = $imageUrl;
    // Afficher l'image non cliquable
    echo '<img src="' . $imageUrl . '" alt="Image">';
}
?>

Dans ce code, vous devez remplacer les valeurs "chemin/vers/image-par-defaut.jpg"et "chemin/vers/image-apres-changement.jpg"par 
les chemins d'accès réels de vos images par défaut et après le changement. Vous devrez également ajouter votre propre logique pour 
vérifier si l'image a été modifiée ou non, par exemple en utilisant une base de données.
Lorsque l'image est changée, le code affiche un lien <a>limite l'image, qui pointe vers l'URL de l'image après le changement. Cela rend l'image cliquable et permet aux utilisateurs de visualiser en plus grande taille. Si l'image n'a pas été changée, le code affiche simplement l'image non cliquable.





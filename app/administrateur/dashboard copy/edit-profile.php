<?php
include './app/commum/header_client.php'
?>

<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider et mettre à jour les informations soumises
    $errors = [];

    // Effectuer les validations nécessaires
    // ...

    // Si aucune erreur n'est détectée, mettre à jour les informations
    if (empty($errors)) {
        // Mettre à jour les informations dans la base de données ou tout autre traitement nécessaire

        // Rediriger vers la page de profil mise à jour
        header("Location: profile.php");
        exit();
    }
}

// Charger les informations du profil
$fullName = "John Doe";
$jobTitle = "Web Developer";
$email = "john.doe@example.com";
$phone = "123456789";
$address = "123 Main Street";
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SLC Client - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= PATH_PROJECT ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= PATH_PROJECT ?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= PATH_PROJECT ?>public/vendor/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= PATH_PROJECT ?>public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= PATH_PROJECT ?>public/css/sb-admin-2.min.css" rel="stylesheet">


    <!-- Custom fonts for this template-->
    <link href="<?= PATH_PROJECT ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles client for this template-->
    <link href="<?= PATH_PROJECT ?>public/css/style.css" rel="stylesheet" />
    <!-- outils CSS Files -->
    <link href="<?= PATH_PROJECT ?>public/outils/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <style>
        label {
            color: white;
        }
    </style>

</head>


<body>
    <header>
        <h1>Profile Page</h1>
    </header>

    <main>
        <section class="profile-section">
            <div class="profile">
                <div class="profile-image">
                    <img src="profile-img.jpg" alt="Profile Image" id="profile-image">
                </div>
                <div class="profile-details">
                    <h2 id="full-name"><?php echo $fullName; ?></h2>
                    <p id="job-title"><?php echo $jobTitle; ?></p>
                    <ul class="social-links">
                        <li><a href="#" class="twitter"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="#" class="facebook"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#" class="instagram"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                    <a href="#" id="edit-link" onclick="showEditForm()">Modifier mes informations</button>
                </div>
            </div>

            <div class="profile-form" id="edit-form" <?php if (!empty($errors)) {
                                                            echo 'style="display: block;"';
                                                        } else {
                                                            echo 'style="display: none;"';
                                                        } ?>>
                <h3>Edit Profile</h3>
                <form id="profile-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <?php if (!empty($errors)) { ?>
                        <div class="error-messages">
                            <?php foreach ($errors as $error) { ?>
                                <p><?php echo $error; ?></p>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="full-name">Full Name</label>
                        <input type="text" id="full-name" name="full-name" value="<?php echo $fullName; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Job Title</label>
                        <input type="text" id="job-title" name="job-title" value="<?php echo $jobTitle; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" required><?php echo $address; ?></textarea>
                    </div>

                    <button type="submit">Save Changes</button>
                </form>
            </div>
        </section>
    </main>


        <!-- Footer -->
        <footer class="sticky-footer" style="background-color: #0c0b09;">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; SOUS LES COCOTIERS 2023</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->


        <!-- Template Main JS File -->
        <script src="<?= PATH_PROJECT ?>public/js/main.js"></script>

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

</body>

</html>





<!DOCTYPE html>
<html>
<head>
    <title>Réservation d'hôtel</title>
</head>
<body>
    <h1>Réservation d'hôtel</h1>

    <form action="traitement.php" method="post">
        <label for="nom">Nom du client:</label>
        <input type="text" name="nom" id="nom" required><br><br>

        <label for="dateDebut">Date de début:</label>
        <input type="date" name="dateDebut" id="dateDebut" required><br><br>

        <label for="dateFin">Date de fin:</label>
        <input type="date" name="dateFin" id="dateFin" required><br><br>

        <label for="typeChambre">Type de chambre:</label>
        <select name="typeChambre" id="typeChambre" required>
            <option value="chambre_simple">Chambre simple</option>
            <option value="chambre_double">Chambre double</option>
            <option value="suite">Suite</option>
        </select><br><br>

        <label for="numeroChambre">Numéro de chambre:</label>
        <input type="text" name="numeroChambre" id="numeroChambre" required><br><br>

        <label for="accompagnateur">Accompagnateur:</label>
        <input type="text" name="accompagnateur" id="accompagnateur"><br><br>

        <input type="submit" value="Réserver">
    </form>
</body>
</html>



<?php
require_once 'fonction.php';

// Récupérer les données du formulaire
$nomClient = $_POST['nom'];
$dateDebut = $_POST['dateDebut'];
$dateFin = $_POST['dateFin'];
$typeChambre = $_POST['typeChambre'];
$numeroChambre = $_POST['numeroChambre'];
$accompagnateur = $_POST['accompagnateur'];

// Effectuer la réservation
$resultat = effectuerReservation($nomClient, $dateDebut, $dateFin, $typeChambre, $numeroChambre, $accompagnateur);

// Afficher le résultat
if ($resultat) {
    echo "Réservation effectuée avec succès !";
} else {
    echo "Erreur lors de la réservation.";
}
?>


<?php
function effectuerReservation($nomClient, $dateDebut, $dateFin, $typeChambre, $numeroChambre, $accompagnateur)
{
    // Connexion à la base de données
    $servername = "nom_du_serveur";
    $username = "nom_d_utilisateur";
    $password = "mot_de_passe";
    $dbname = "nom_de_la_base_de_donnees";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Insérer un nouveau client
    $sqlInsertClient = "INSERT INTO client (nom_clt, est_actif, est_supprimer) VALUES ('$nomClient', 1, 0)";
    if ($conn->query($sqlInsertClient) === FALSE) {
        $conn->close();
        return false;
    }

    // Récupérer l'ID du client
    $clientId = $conn->insert_id;

    // Insérer une nouvelle réservation
    $sqlInsertReservation = "INSERT INTO reservation (id_client, date_debut, date_fin, type_chambre, numero_chambre, accompagnateur) VALUES ($clientId, '$dateDebut', '$dateFin', '$typeChambre', '$numeroChambre', '$accompagnateur')";
    if ($conn->query($sqlInsertReservation) === TRUE) {
        $conn->close();
        return true;
    } else {
        $conn->close();
        return false;
    }
}
?>

<?php

$_SESSION['photo-erreurs'] = "";

$_SESSION['donnees-utilisateur'] = [];

$donnees = [];

$erreurs = [];

$idUtilisateur = $_SESSION['utilisateur_connecter'][0]['id'];

$dossierUtilisateur = "public/images/upload/" . $idUtilisateur . "/";

if (isset($_POST['change_photo'])) {

    if (check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter'][0]['id'])) {

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {

            if ($_FILES["image"]["size"] <= 3000000) {

                $file_name = $_FILES["image"]["name"];

                $file_info = pathinfo($file_name);

                $file_ext = $file_info["extension"];

                $allowed_ext = ["png", "jpg", "jpeg", "gif"];

                if (in_array(strtolower($file_ext), $allowed_ext)) {

                    if (!is_dir($dossierUtilisateur)) {
                        //création du dossier image avec id de l'utilisateur
                        mkdir($dossierUtilisateur);
                    }

                    move_uploaded_file($_FILES['image']['tmp_name'], $dossierUtilisateur . basename($_FILES['image']['name']));

                    $profiledonnees["image"] = PATH_PROJECT . $dossierUtilisateur . basename($_FILES['image']['name']);

                    if (mise_a_jour_avatar($_SESSION['utilisateur_connecter'][0]['id'], $profiledonnees["image"])) {

                        if (recup_mise_a_jour_new_info_user($_SESSION['utilisateur_connecter'][0]['id'])) {

                            header('location: ' . PATH_PROJECT . 'client/profil/profile');
                        }
                    } else {

                        $_SESSION['photo-erreurs'] = "La mise à jour de l'image à echouer.";
                        header('location:' . PATH_PROJECT . 'client/profil/profile');
                    }
                } else {
                    $_SESSION['photo-erreurs'] = "L'extension de votre image n'est pas pris en compte. <br> Extensions autorisées [ PNG/JPG/JPEG/GIF ]";
                    header('location:' . PATH_PROJECT . 'client/profil/profile');
                }
            } else {
                $_SESSION['photo-erreurs'] = "Fichier trop lourd. Poids maximum autorisé : 3mo";
                header('location:' . PATH_PROJECT . 'client/profil/profile');
            }
        } else {

            $profiledonnees["image"] = $donnees[0]["image_profil"];
        }
    } else {
        $_SESSION['photo-erreurs'] = "La mise à jour à echouer. Vérifier votre mot de passe et réessayez.";
        header('location:' . PATH_PROJECT . 'client/profil/profile');
    }
}

<?php

<<<<<<< HEAD
$id_utilisateur  = $params[3];
$token  = $params[4];
if (check_token_exist($id_utilisateur, $token, "NOUVEAU_MOT_DE_PASSE")){

	if(suppression_logique_token($id_utilisateur) && activation_compte_utilisateur($id_utilisateur)){
        $_SESSION['id_user'] = $id_utilisateur;
        $_SESSION['validation-compte-message-success'] = "Votre adressse mail est valide. Vous pouvez entrer un nouveau mot de passe";
=======
if (check_token_exist($params[3], $params[4], "NOUVEAU_MOT_DE_PASSE", 1, 0)){
    if(maj($params[3]) && maj1($params[3])){
        $_SESSION['id_user'] = $params[3];
        $_SESSION['success'] = "Email vérifier avec succès. Vous pouvez mettre nouveau mot de passe";
>>>>>>> 54216fe7f9f9bd600eaf7c9cb0feefc28ba101dc
        header('location: ' . PATH_PROJECT . 'client/mot_de_passe/nv_mot_passe');
    }else{
		$_SESSION['validation-compte-message-erreur'] = "Oups!!! Une erreur s'est produite lors de la vérification de l'adressse mail. Veuillez contactez un administrateur";
        header('location: '.PATH_PROJECT .'client/mot_de_passe/index');
    }

}else{
	$_SESSION['validation-compte-message-erreur'] = "Oups!!! la clé de vérification de de l'adressse mail est introuvable. Veuillez contactez un administrateur";
    header('location: '.PATH_PROJECT .'client/mot_de_passe/index');
}


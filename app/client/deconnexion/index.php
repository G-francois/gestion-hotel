<?php
session_start();

session_destroy();

header('location: /'.GESTION_HOTEL .'/client/connexion/index');
exit;


?>
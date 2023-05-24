<?php
session_start();

session_destroy();

header('location: '.PATH_PROJECT .'administrateur/connexion/index');
exit;


?>
<?php
session_start();

session_destroy();

header('location: '.PATH_PROJECT .'client/connexion/index');
exit;


?>
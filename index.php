<?php
require "vendor/autoload.php";

define('GESTION_HOTEL', 'soutenance');

$default_profile = "client";
$default_profile_folder = "app/client/index.php";
$params = [];

if (isset($_GET['p']) && !empty($_GET['p'])) {
    $params = explode('/', $_GET['p']);
    $profile = (isset($params[0]) && !empty($params[0])) ? $params[0] : $default_profile;
    $profile_folder = "app/" . $profile . "/index.php";
    if (file_exists($profile_folder)) {
        include $profile_folder;
    } else {
        include $default_profile_folder;
    }
} else {
    include $default_profile_folder;
}
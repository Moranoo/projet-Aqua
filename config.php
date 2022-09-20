<?php
// Gestion des erreurs Apache (local uniquement)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//contantes d'environnement
//on se connecte à la bdd
define("HOST", "localhost");
define("DATA", "abysses");
define("USER", "root");
define("PASS", "");

// Gestion des options PDO
define('OPTIONS', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
));






?>

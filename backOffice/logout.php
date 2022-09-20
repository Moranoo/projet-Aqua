<?php
//Démarre ou restore la session
session_start();

//Détruit toutes les variables de session
session_unset();

//Arrête la session en cours
session_destroy();

//redirige vers la page index
header('location:../index.php');

?>
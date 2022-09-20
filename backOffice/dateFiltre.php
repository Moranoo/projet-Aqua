<?php
include '../class/DataBase.php';

// Démarre ou restaure une session
session_start();

// Teste si user est authentifié
if (isset($_SESSION['isauth']) && $_SESSION['isauth']) {
    $isauth = true;
} else {
    $isauth = false;
}

// Teste si role est défini
if (isset($_SESSION['role']) && $_SESSION['role']) {
    $role = $_SESSION['role'];
} else {
    $role = 'adherent';
}


try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=abysses', 'root', '');
} catch (PDOException $e) {
    exit("Error" . $e->getMessage());
}

//requête pour envoyer date en bdd
if (isset($_POST['resetF'])) {
    if (isset($_POST['chronoFiltre']) && !empty($_POST['chronoFiltre'])) {
        $chronoFiltre = htmlspecialchars($_POST['chronoFiltre']);
    }
    if (!isset($_POST['key']) || empty($_POST['key'])) {
        exit();
    };
    $id = htmlspecialchars($_POST['key']);
  

    $sql = $bdd->prepare("UPDATE aquariums SET chronoFiltre=now() + INTERVAL 45 DAY  WHERE id=:id");

    $params = array(
        ':id' => $id
    );

    $sql->execute($params);
    header('location:cards.php');
}
<?php
require_once '../config.php';

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
    $role = '';
}


try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=abysses', 'root', '');
} catch (PDOException $e) {
    exit("Error" . $e->getMessage());
}



/********SECTION DELETE********************* */

if (isset($_REQUEST['del'])) {
    $aid = intval($_GET['del']);
    $sql = "DELETE FROM aquariums WHERE id=:id";
    $query = $bdd->prepare($sql);

    $query->bindParam(':id', $aid, PDO::PARAM_STR);
    $query->execute();

    echo "<script>window.alert('Aquarium supprimé avec succès !')</script>";
    echo "<script>window.location.href='../backOffice/cards.php'</script>";
}
/********FIN DE SECTION DELETE********************* */
?>
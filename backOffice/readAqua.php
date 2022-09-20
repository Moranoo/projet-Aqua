<?php
require_once('../class/Database.php');
require_once '../config.php';

$bdd = new Database('localhost', 'abysses', 'root', '');
$conn = $bdd->connect();

try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=abysses', 'root', '');
} catch (PDOException $e) {
    exit("Error" . $e->getMessage());
}
session_start();


?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Aquarium</title>
    <link rel="stylesheet" href="../cssDashboard/read.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>


    <?php
    if(!isset($_POST['key']) || empty($_POST['key'])){
        exit();
    }
    $id = htmlspecialchars($_POST['key']);
    
 
    
    $sql = $bdd->prepare("SELECT * FROM aquariums WHERE id= ?");
    $sql->execute([$id]);
 
    $aquarium = $sql->fetch(PDO::FETCH_ASSOC);

  
    $html = '';
  
        $aq_id = $aquarium['id'];
        $aq_image = $aquarium['image']??"";
        $aq_conduct = $aquarium['conductivite'];
        $aq_ph = $aquarium['ph'];
        $aq_volume = $aquarium['volume'];
        $aq_biotopEspeces = $aquarium['biotopEspeces'];
        $aq_typeNourriture = $aquarium['typeNourriture'];
        $aq_typeEau = $aquarium['typeEau'];
        $aq_prixVente = $aquarium['prixVente'];

        $html .= '
        <img src="../imageAqua/' . $aq_image . '" alt="image aquarium"  width="470" height="300">
     
        <p><strong>Conductivite : </strong>'. $aq_conduct.'</p>
        <p><strong>Ph : </strong>'. $aq_ph.'</p>
        <p><strong>Volume : </strong>'. $aq_volume.'</p>
        <p><strong>Biotop/Especes : </strong>'. $aq_biotopEspeces.'</p>
        <p><strong>Type de Nourriture : </strong>'. $aq_typeNourriture.'</p>
        <p><strong>Type d\'Eau : </strong>'. $aq_typeEau.'</p>
        <p><strong>Prix de Vente : </strong>'. $aq_prixVente.'</p>';

    echo $html;

    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
<?php
require_once '../config.php';



try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=abysses', 'root', '');
} catch (PDOException $e) {
    exit("Error" . $e->getMessage());
}

if (isset($_POST['update'])) {
  
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $aquaid = htmlspecialchars($_POST['id']);
    }

    if (isset($_POST['nbac']) && !empty($_POST['nbac'])) {
        $nbac = htmlspecialchars($_POST['nbac']);
    }

    if (isset($_POST['conductivite']) && !empty($_POST['conductivite'])) {
        $conductivite = htmlspecialchars($_POST['conductivite']);
    }
    if (isset($_POST['ph']) && !empty($_POST['ph'])) {
        $ph = htmlspecialchars($_POST['ph']);
    }

    if (isset($_POST['volume']) && !empty($_POST['volume'])) {
        $volume = htmlspecialchars($_POST['volume']);
    }
    if (isset($_POST['biotopEspeces']) && !empty($_POST['biotopEspeces'])) {
        $biotopEspeces = htmlspecialchars($_POST['biotopEspeces']);
    }

    if (isset($_POST['typeNourriture']) && !empty($_POST['typeNourriture'])) {
        $typeNourriture = htmlspecialchars($_POST['typeNourriture']);
    }

    if (isset($_POST['typeEau']) && !empty($_POST['typeEau'])) {
        $typeEau = htmlspecialchars($_POST['typeEau']);
    }

    if (isset($_POST['prixVente']) && !empty($_POST['prixVente'])) {
        $prixVente = htmlspecialchars($_POST['prixVente']);
    }
   
    $nbac = $_POST['nbac'];
    $conductivite = $_POST['conductivite'];
    $ph = $_POST['ph'];
    $volume = $_POST['volume'];
    $biotopEspeces = $_POST['biotopEspeces'];
    $typeNourriture = $_POST['typeNourriture'];
    $typeEau = $_POST['typeEau'];
    $prixVente = $_POST['prixVente'];
   
    if(!isset($_POST['key']) || empty($_POST['key'])){
        exit('erreur');
    }
   
    $id = htmlspecialchars($_POST['key']);
    
    try {

    $sql = $bdd->prepare("SELECT * FROM aquariums WHERE id= ?");
    $sql->execute([$id]);
 
    $aquarium = $sql->fetch(PDO::FETCH_ASSOC);

    $sql =$bdd->prepare( "UPDATE aquariums SET nbac=:nbac, conductivite=:conductivite, ph=:ph, volume=:volume, biotopEspeces=:biotopEspeces, typeNourriture=:typeNourriture, typeEau=:typeEau, prixVente=:prixVente WHERE id=:id");
  


    $params = array(
        ':id' =>$id,
        ':nbac' => $nbac, 
        ':conductivite' => $conductivite,
        ':ph' => $ph,
        ':volume' => $volume,
        ':biotopEspeces' => $biotopEspeces,
        ':typeNourriture' => $typeNourriture,
        ':typeEau' => $typeEau,
        ':prixVente' => $prixVente
       
    );
    $sql->execute($params);
} catch (PDOException $e) {
    exit("Error" . $e->getMessage());
}
if($sql){
    echo "<script>window.alert('Modification Réussie !')</script>";
    echo "<script>window.location.href='cards.php'</script>";
}
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE AQUA</title>
    <link rel="stylesheet" href="../cssDashboard/update.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <?php


            $html = '';
         

             echo $html;

        ?>



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript">
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
</body>

</html>
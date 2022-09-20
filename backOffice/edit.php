<?php
require_once '../config.php';
 

 
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=abysses', 'root', '');
  
    try{
        $id = $_POST['id'];
        $nbac = $_POST['nbac'];
        $conductivite = $_POST['conductivite'];
        $ph = $_POST['ph'];
        $volume = $_POST['volume'];
        $biotopEspeces = $_POST['biotopEspeces'];
        $typeNourriture = $_POST['typeNourriture'];
        $typeEau = $_POST['typeEau'];
        $prixVente = $_POST['prixVente'];

 
        $sql = "UPDATE members SET nbac = '$nbac', conductivite = '$conductivite', ph = '$ph', volume = '$volume', biotopEspeces = '$biotopEspeces', typeNourriture = '$typeNourriture', typeEau = '$typeEau', prixVente = '$prixVente' WHERE id = '$id'";
        //if-else statement executing query
        $update = $bdd->prepare($sql);
        $exec = $update->execute();
        if($exec){
            $output['message'] = 'Member updated successfully';
        } 
        else{
            $output['error'] = true;
            $output['message'] = 'Something went wrong. Cannot update member';
        }
 
    }
    catch(PDOException $e){
        $output['error'] = true;
        $output['message'] = $e->getMessage();
    }
 
    //close connection
    $database->close();
 
    echo json_encode($output);
?>
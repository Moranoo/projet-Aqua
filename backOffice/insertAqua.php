<?php

session_start();

include '../config.php';

try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=abysses', 'root', '');

}catch(PDOException $e){
    exit("Error". $e->getMessage());
}



    if(isset($_POST['insert'])){
        if(isset($_POST['nbac']) && !empty($_POST['nbac'])){
            $nbac=htmlspecialchars($_POST['nbac']);
        }
        if(isset($_POST['image']) && !empty($_POST['image'])){
            $image=htmlspecialchars($_POST['image']);
        }
        if(isset($_POST['conductivite']) && !empty($_POST['conductivite'])){
            $conductivite=htmlspecialchars($_POST['conductivite']);
        }
        if(isset($_POST['ph']) && !empty($_POST['ph'])){
            $ph=htmlspecialchars($_POST['ph']);
        }
       
        if(isset($_POST['volume']) && !empty($_POST['volume'])){
            $volume=htmlspecialchars($_POST['volume']);
        }
        if(isset($_POST['biotopeEspeces']) && !empty($_POST['biotopeEspeces'])){
            $biotopeEspeces=htmlspecialchars($_POST['biotopeEspeces']);
        }
    
        if(isset($_POST['typeNourriture']) && !empty($_POST['typeNourriture'])){
            $typeNourriture=htmlspecialchars($_POST['typeNourriture']);
        }
        if(isset($_POST['typeEau']) && !empty($_POST['typeEau'])){
            $typeEau=htmlspecialchars($_POST['typeEau']);
        }
    
        if(isset($_POST['prixVente']) && !empty($_POST['prixVente'])){
            $prixVente=htmlspecialchars($_POST['prixVente']);
        }
     

        $nbac=$_POST['nbac'];
        $conductivite=$_POST['conductivite'];
        $ph=$_POST['ph'];
        $volume=$_POST['volume'];
        $biotopEspeces=$_POST['biotopEspeces'];
        $typeNourriture=$_POST['typeNourriture'];
        $prixVente=$_POST['prixVente'];


        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_folder = '../imageAqua/';



        $sql = "INSERT INTO aquariums(nbac, image, conductivite, ph, volume, biotopEspeces, typeNourriture, typeEau, prixVente) VALUES(:nbac, :image, :conductivite, :ph, :volume, :biotopEspeces, :typeNourriture, :typeEau, :prixVente)";
        $query = $bdd->prepare($sql);

        $params = array(
            ':nbac' => $nbac, 
            ':image' => $image,
            ':conductivite' => $conductivite,
            ':ph' => $ph,
            ':volume' => $volume,
            ':biotopEspeces' => $biotopEspeces,
            ':typeNourriture' => $typeNourriture,
            ':typeEau' => $typeEau,
            ':prixVente' => $prixVente
           
        );
        $query->execute($params);
 

        if ($query) {
            move_uploaded_file($image_tmp_name, $image_folder);
             $erreur = 'image insérée !';
        } elseif ($image_size > 2000000) {
            $message[] = 'taille d\'image trop grande !';
             header('location:../backOffice/insertAqua.php');
        }
  

        $lastInsertId = $bdd->lastInsertId();
        $lastInsertId = $bdd->lastInsertId();

        if($lastInsertId){
            echo "<script>window.alert('Insertion Réussie !')</script>";
            echo "<script>window.location.href='cards.php'</script>";

        }else{
            echo "<script>window.alert('Oups ! Quelque chose s'est mal passé pendant l'insertion')</script>";
            echo "<script>window.location.href='cards.php'</script>";
        }
    }
    $html='';



    echo $html;

    ?>

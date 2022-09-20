<?php
require_once '../config.php';


try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=abysses', 'root', '');

}catch(PDOException $e){
    exit("Error". $e->getMessage());
}

    if(isset($_POST['image'])){
        $aid=intval($_GET['id']);

        $file_name=$_FILES['file']['name'];
        $file_temp=$_FILES['file']['tmp_name'];
        $file_size=$_FILES['file']['size'];
        $file_type=$_FILES['file']['type'];


        $location="../image/".$file_name;

        if($file_size < 524880 ){
            if(move_uploaded_file($file_temp,$location)){
                try{
                    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION).
                    $sql = "INSERT INTO aquariums (photo) VALUES (:photo)";
                    $query = $bdd->prepare($sql);

                    $query->bindParam(':photo',$photo,PDO::PARAM_INT);

                }catch(PDOException $e){
                    echo $e->getMessage();
                }
                $bdd = null;
                header('location:dashboard.php');
            }
        }else{
            echo "<script>window.alert('taille d'image trop grande');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php
    $aid=intval($_GET['id']);
    $sql = "SELECT * FROM aquariums WHERE id='$aid'";

    $query=$bdd->prepare($sql);
    $query->execute();
    $result = $query->fetch();


?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Image de l'aquarium</h3>

                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Téléchargez ici votre image</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>

                    <button type="submit" name="image" class="btn btn-danger" style="margin-top:15px">Télécharger</button>
                </form>
            </div>
        </div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
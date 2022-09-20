<?php
session_start();
require_once '../config.php';

try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=abysses', 'root', '');
} catch (PDOException $e) {
    exit("Error" . $e->getMessage());
}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReadMessage</title>
   <link rel="stylesheet" href="../cssDashboard/read.css"> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>


    <?php
    $messageid = intval($_GET['id']);
    $sql = "SELECT * FROM messagerie WHERE id=:mid";
    $query = $bdd->prepare($sql);

    $query->bindParam('mid', $messageid, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);

    $count = 1;
    if ($query->rowCount() > 0) {
        foreach ($result as $result) {
    ?>
            <div class="card read" style="width: 20rem; align-items:center;">
                <h2>
                   Message :
                </h2>
                
                <div class="card-body">
                    <h5 class="card-title"> <?php echo htmlentities($result->objet); ?><?php echo htmlentities($result->date); ?>
                    </h5>
                       

                    <p class="card-text">
                    
                    <p> <?php echo "<strong>Nom : </strong> " . htmlentities($result->nom); ?> </p>
                    <p> <?php echo "<strong>Mail : </strong> " .  htmlentities($result->mail); ?> </p>
                    <p><?php echo "<strong>Téléphone : </strong> " . htmlentities($result->telephone); ?> </p>
                    <p><?php echo "<strong>Message : </strong> " . htmlentities($result->message); ?> </p>
                    <img src="<?php echo htmlentities(!empty($result->image)) ? '../image/' . htmlentities($result->image) : '../image/cameradefaut.png'; ?>" class="card-image-bottom mb-4" width=300 height=240>
                    <a href="../backOffice/messagerieBureau.php" class="btn retour btn-success">Retour</a>
                </div>
            </div>
    <?php

        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
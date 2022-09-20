<?php
require_once '../config.php';

// Démarre ou restaure une session
session_start();

// Teste si user est authentifié
if (isset($_SESSION['isauth']) && $_SESSION['isauth']) {
    $isauth = true;
} else {
    $isauth = false;
    // header('location:index.php?code=3');
}

// Teste si role est défini
if (isset($_SESSION['role']) && $_SESSION['role']) {
    $role = $_SESSION['role'];
} else {
    $role = 'bureau';
}


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
    <title>Back-Office</title>
    <link rel="stylesheet" href="../cssDashboard/backOffice.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>

    <div class="jumbotron" style="border: solid 1px grey; width:80%; margin-left: 10%; margin-top:2%; ">
        <h1 class="display-5">Système de gestion Back-Office</h1>
        <p class="lead"><?php echo 'Bienvenue ' . ($isauth ? $_SESSION['prenom'] : '') . ' !'; ?></p>
        <div>

        </div>
        <hr class="my-4">
        <a class="btn btn-danger btn-sm" href="../backOffice/logout.php" role="button">Déconnexion</a>
    </div>

    <div class="centre">
        <div class="jumbotron membre" style="border: solid 1px grey; width:35%; margin-top:2%;">
            <h3 class="display-4">Membres</h3>
            <p class="lead">Bureau & Adhérents</p>
            <div>

            </div>
            <hr class="my-4">

            <a id="dashboard" class="btn  btn-sm" href="../backOffice/dashboard.php" role="button">Dashboard</a>
        </div>

        <div class="jumbotron aquarium" style="border: solid 1px grey; width:35%; margin-top:2%;">
            <h3 class="display-4">Aquarium</h3>
            <p class="lead">Bureau & Adhérents</p>
            <div>

            </div>
            <hr class="my-4">

            <a class="btn aqua btn-info btn-sm" href="cards.php?role=<?php echo $_SESSION['role']='bureau'; ?>" role="button">Aquariums</a>
        </div>

    </div>
    <div class="messagerie">
        <div class="jumbotron" style="border: solid 1px grey; width:35%; margin-top:2%;">
            <h3 class="display-4">Messagerie</h3>
            <p class="lead"></p>
            <div>

            </div>
            <hr class="my-4">

            <a class="btn msg btn-success btn-sm" href="messagerieBureau.php" role="button">Accès Messagerie</a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>
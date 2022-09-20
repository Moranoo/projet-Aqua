<?php
session_start();
require_once '../config.php';


try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=abysses', 'root', '');
} catch (PDOException $e) {
    exit("Error" . $e->getMessage());
}
/********SECTION DELETE********************* */

if (isset($_REQUEST['del'])) {
    $mid = intval($_GET['del']);
    $sql = "DELETE FROM messagerie WHERE id=:id";
    $query = $bdd->prepare($sql);

    $query->bindParam(':id', $mid, PDO::PARAM_STR);
    $query->execute();

    echo "<script>window.alert('Message supprimé avec succès !')</script>";
    echo "<script>window.location.href='messagerieBureau.php'</script>";
}
/********FIN DE SECTION DELETE********************* */
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie</title>
    <link rel="stylesheet" href="../cssDashboard/jumbotron.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="jumbotron" style="border: solid 1px grey; width:80%; margin-left: 10%; margin-top:2%; ">
        <h1 class="display-4">Messagerie</h1>
        <div>

        </div>
        <hr class="my-4">

    </div>

    <nav aria-label="breadcrumb" style="width:80%;margin-left:10%";>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../backOffice/backOffice.php">Back-Office</a></li>
            <li class="breadcrumb-item"><a href="../backOffice/messagerieBureau.php">Messagerie</a></li>
        </ol>
    </nav>
    <?php
    $sql = "SELECT * FROM messagerie";
    $query = $bdd->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($result as $result) {
    ?>

        <div class="container" style="margin-top:50px;">

            <div class="modal fade" id="monModal<?= htmlentities($result->id); ?>" tabindex="-1" aria-labelledby="monModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="monModalLabel"><?= htmlentities($result->objet); ?> . <?= htmlentities($result->date); ?></h5>
                            <button type="button" class="close" data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i></button>

                        </div>
                        <div class="modal-body">
                            <p>Nom : <?= htmlentities($result->nom); ?></p>
                            <p>Mail : <?= htmlentities($result->mail); ?></p>
                            <p>Téléphone : <?= htmlentities($result->telephone); ?></p>
                            <p>Message: <?= htmlentities($result->message); ?></p>
                            <img src="<?php echo htmlentities(!empty($result->image)) ? '../image/' . htmlentities($result->image) : '../image/cameradefaut.png'; ?>" class="card-image-bottom" width=450 height=250>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa-solid fa-rectangle-xmark"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php

    }

    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h5 class="mb-4">Boîte de Reception</h5>

                <div class="table-responsive d-flex">

                    <table class="table table-bordered table-striped table-hover ">
                        <thead style="text-align:center; justify-content:center;">
                            <th class="col-md-2">Date</th>
                            <th>Nom</th>
                            <th>Objet</th>
                            <th class="col-md-3">Outils</th>
                        </thead>

                        <tbody style="margin-top:auto;margin-bottom:auto;text-align:center;justify-content:center;">
                            <?php
                            $sql = "SELECT * FROM messagerie ORDER BY date DESC";
                            $query = $bdd->prepare($sql);
                            $query->execute();
                            $result = $query->fetchAll(PDO::FETCH_OBJ);

                            $count = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($result as $result) {
                            ?>

                                    <tr class="message">
                                        <td>
                                            <p><?= htmlentities($result->date); ?></p>
                                        </td>
                                        <td>
                                            <p><?= htmlentities($result->nom); ?></p>
                                        </td>
                                        <td>
                                            <h5><?= htmlentities($result->objet); ?></h5>
                                        </td>


                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#monModal<?= htmlentities($result->id); ?>">
                                                <i class="fa-solid fa-eye" style="width:23px;height:23px"></i> Afficher</a>
                                            </button>
                                            <a href="messagerieBureau.php?del=<?= htmlentities($result->id); ?>" class="btn btn-danger btn-sm ml-4" onclick="return confirm('Voulez-vous vraiment supprimer ce message ?')"><i class="fa-solid fa-trash-can" style="width:23px;height:23px"></i>Supprimer</a>
                                        </td>
                                    </tr>
                            <?php
                                    $count++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>

<!-- href="messagerie.php?id=<= htmlentities($result->id); ?> -->
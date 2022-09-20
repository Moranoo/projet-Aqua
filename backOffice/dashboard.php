<?php
require_once '../config.php';

try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=abysses', 'root', '');
} catch (PDOException $e) {
    exit("Error" . $e->getMessage());
}
session_start();

$bureau_id = $_SESSION['bureau_id'];

if (!isset($bureau_id)) {
    header('location:../pages/inscription.php');
}

/********SECTION DELETE********************* */

if (isset($_REQUEST['del'])) {
    $uid = intval($_GET['del']);
    $sql = "DELETE FROM users WHERE id=:id";
    $query = $bdd->prepare($sql);

    $query->bindParam(':id', $uid, PDO::PARAM_STR);
    $query->execute();

    echo "<script>window.alert('Membre supprimé avec succès !')</script>";
    echo "<script>window.location.href='dashboard.php'</script>";
}
/********FIN DE SECTION DELETE********************* */
?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../cssDashboard/jumbotron.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="jumbotron" style="border: solid 1px grey; width:90%; margin-left: 5%; margin-top:2%; ">
        <h1 class="display-4">Tableau de bord des membres</h1>

        <div>

        </div>
        <hr class="my-4">
        <a class="btn add btn-primary btn-sm" href="../backOffice/insert.php" role="button" style="margin-bottom:15px"><i class="fa-solid fa-folder-plus"></i> Ajouter un membre</a>
    </div>

    <nav aria-label="breadcrumb" style="width:90%; margin-left:5%; margin-bottom:5%;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="../backOffice/backOffice.php">Back-Office</a></li>
            <li class="breadcrumb-item"><a href="../backOffice/dashboard.php">Dashboard</a></li>
        </ol>
    </nav>
 
    <div class="table-responsive " style="width:90%; margin-left:5%">

        <table id="example" class="table table-bordered table-striped table-hover ">
            <thead style="text-align:center; justify-content:center;">
                <!-- <th>#</th> -->
                <th>Photo</th>
                <th>Nom</th>
                <th>Prénom</th>
                <!-- <th>Date de Naissance</th> -->
                <th>Email</th>
                <!-- <th>Téléphone</th> -->
                <th>Rôle</th>
                <th>Outils</th>
            </thead>

            <tbody style="margin-top:auto;margin-bottom:auto;text-align:center;justify-content:center;">
                <?php
                $sql = "SELECT * FROM users";
                $query = $bdd->prepare($sql);
                $query->execute();
                
                $result = $query->fetchAll(PDO::FETCH_OBJ);

                $count = 1;
                if ($query->rowCount() > 0) {
                    foreach ($result as $result) {
                ?>

                        <tr>
                            <!-- <td><?php echo htmlentities($count); ?></td> -->
                            <td><img src="../image/<?php echo htmlentities(!empty($result->image)) ? htmlentities($result->image) : '../image/default-avatar.png'; ?>" class="rounded-circle" width="60" height="60"></td>
                            <td><?php echo htmlentities($result->nom); ?></td>
                            <td><?php echo htmlentities($result->prenom); ?></td>
                            <!-- <td><php echo htmlentities($result->date_de_naissance); ?></td> -->
                            <td><?php echo htmlentities($result->mail); ?></td>
                            <!-- <td><php echo htmlentities($result->telephone); ?></td> -->
                            <td><?php echo htmlentities($result->role); ?></td>
                            <td>

                                <a href="read.php?id=<?php echo htmlentities($result->id); ?>" class="btn btn-secondary btn-sm"><i class="fa-solid fa-eye" style="width:23px;height:23px"></i></a>
                                <a href="update.php?id=<?php echo htmlentities($result->id); ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil" style="width:23px;height:23px"></i></a>
                                <a href="dashboard.php?del=<?php echo htmlentities($result->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer ce membre ?')"><i class="fa-solid fa-trash-can" style="width:23px;height:23px"></i></a>
                                <!-- 
                                            <a href="modImg.php?id=<php echo htmlentities($result->id); ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-image" style="width:23px;height:23px"></i></a> -->

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function () {
    $('#example').DataTable();
    });
    </script>
    <script src="../js/francais.js"></script>
  
       
   

</body>

</html>
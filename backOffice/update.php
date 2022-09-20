<?php
require_once '../config.php';
include '../backOffice/modImg.php';

try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=abysses', 'root', '');
} catch (PDOException $e) {
    exit("Error" . $e->getMessage());
}

if (isset($_POST['update'])) {
    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);
    }
    if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
        $prenom = htmlspecialchars($_POST['prenom']);
    }
    if (isset($_POST['date_de_naissance']) && !empty($_POST['date_de_naissance'])) {
        $date_de_naissance = htmlspecialchars($_POST['date_de_naissance']);
    }

    if (isset($_POST['mail']) && !empty($_POST['mail'])) {
        $mail = htmlspecialchars($_POST['mail']);
    }
    if (isset($_POST['telephone']) && !empty($_POST['telephone'])) {
        $telephone = htmlspecialchars($_POST['telephone']);
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = htmlspecialchars($_POST['password']);
    }

    if (isset($mail) && isset($password)) {
        $password = hash('sha256', hash('md5', $password) . hash('sha1', strtolower($mail)));
    }


    if (isset($_POST['role']) && !empty($_POST['role'])) {
        $role = htmlspecialchars($_POST['role']);
    }

    $userid = intval($_GET['id']);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_de_naissance = $_POST['date_de_naissance'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = htmlspecialchars($_POST['password']);
    }
    if (isset($mail) && isset($password)) {
        $password = hash('sha256', hash('md5', $password) . hash('sha1', strtolower($mail)));
    }
    $telephone = $_POST['telephone'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET prenom=:prenom, nom=:nom, date_de_naissance=:date_de_naissance, mail=:mail, telephone=:telephone, password=:password, role=:role WHERE id=:uid";

    $query = $bdd->prepare($sql);

    $query->bindParam(':nom', $nom, PDO::PARAM_STR);
    $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $query->bindParam(':date_de_naissance', $date_de_naissance, PDO::PARAM_STR);
    $query->bindParam(':mail', $mail, PDO::PARAM_STR);
    $query->bindParam(':telephone', $telephone, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':role', $role, PDO::PARAM_STR);
    $query->bindParam(':uid', $userid, PDO::PARAM_STR);

    $query->execute();
    echo "<script>window.alert('Modification Réussie !')</script>";
    echo "<script>window.location.href='dashboard.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link rel="stylesheet" href="../cssDashboard/update.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <?php
        $userid = intval($_GET['id']);
        $sql = "SELECT * FROM users WHERE id=:uid";
        $query = $bdd->prepare($sql);

        $query->bindParam('uid', $userid, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        $count = 1;

        if ($query->rowCount() > 0) {
            foreach ($result as $results); {
        ?>

                <div class="jumbotron cadre-up">


                    <form action="#" name="insertRecord" method="POST">
                        <div class="row">

                            <div class="col-md-4">
                                <p><strong>Nom</strong></p>
                                <input type="text" name="nom" value="<?php echo htmlentities($results->nom) ?>" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <p><strong>Prénom</strong></p>
                                <input type="text" name="prenom" value="<?php echo htmlentities($results->prenom) ?>" class="form-control" required>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Date de naissance</strong></p>
                                <input type="text" name="date_de_naissance" value="<?php echo htmlentities($results->date_de_naissance) ?>" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <p><strong>Mail</strong></p>
                                <input type="email" name="mail" value="<?php echo htmlentities($results->mail) ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row3">
                            <div class="col-md-4">
                                <p><strong>Rôle</strong></p>
                                <select class="form-select" name="role" aria-label="Default select example">
                                    <option selected>Choississez un rôle</option>
                                    <option value="bureau">bureau</option>
                                    <option value="adherent">adherent</option>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Téléphone</strong></p>
                                <input type="text" name="telephone" value="<?php echo htmlentities($results->telephone) ?>" class="form-control" required>
                            </div>


                        </div>
                        <div class="col-md-4">
                            <p><strong>Mot de passe</strong></p>
                            <input type="password" name="password" value="<?php echo htmlentities($results->password) ?>" class="form-control" required>
                        </div>
                <?php
                
            }
        }
                ?>
                <div class="row" style="margin-top:1%">
                    <div class="col-md-8">
                        <input type="submit" name="update" class="btn btn-warning" value="Modifier" style="color:white">
                        <a href="dashboard.php" class="btn btn-danger">Retour</a>
                    </div>
                </div>
                    </form>
                </div>
    </div>


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
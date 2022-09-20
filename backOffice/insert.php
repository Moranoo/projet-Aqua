<?php
require_once'../config.php';


try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=abysses', 'root', '');

}catch(PDOException $e){
    exit("Error". $e->getMessage());
}

    if(isset($_POST['insert'])){
        if(isset($_POST['nom']) && !empty($_POST['nom'])){
            $nom=htmlspecialchars($_POST['nom']);
        }
        if(isset($_POST['prenom']) && !empty($_POST['prenom'])){
            $nom=htmlspecialchars($_POST['prenom']);
        }
        if(isset($_POST['date_de_naissance']) && !empty($_POST['date_de_naissance'])){
            $nom=htmlspecialchars($_POST['date_de_naissance']);
        }
       
        if(isset($_POST['mail']) && !empty($_POST['mail'])){
            $mail=htmlspecialchars($_POST['mail']);
        }
        if(isset($_POST['telephone']) && !empty($_POST['telephone'])){
            $nom=htmlspecialchars($_POST['telephone']);
        }
    
        if(isset($_POST['password']) && !empty($_POST['password'])){
            $password=htmlspecialchars($_POST['password']);
        }
    
        if (isset($mail) && isset($password)){
            $password = hash('sha256', hash('md5',$password).hash('sha1', strtolower($mail)));
        }
    

        if(isset($_POST['role']) && !empty($_POST['role'])){
            $nom=htmlspecialchars($_POST['role']);
        }

        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $date_de_naissance=$_POST['date_de_naissance'];
        $mail=$_POST['mail'];
        $telephone=$_POST['telephone'];
        $password=$_POST['password'];
        $password=$_POST['password'];
        if(isset($_POST['password']) && !empty($_POST['password'])){
            $password=htmlspecialchars($_POST['password']);
        }
        if (isset($mail) && isset($password)){
            $password = hash('sha256', hash('md5',$password).hash('sha1', strtolower($mail)));
        }
     
        $role=$_POST['role'];

 

        $sql = "INSERT INTO users(nom, prenom, date_de_naissance, mail, telephone, password, role) VALUES(:nom, :prenom, :date_de_naissance, :mail, :telephone, :password, :role)";
        $query = $bdd->prepare($sql);

        // // à changer
        // $query->bindParam(':nom',$nom,PDO::PARAM_STR);
        // $query->bindParam(':prenom',$prenom,PDO::PARAM_STR);
        // $query->bindParam(':date_de_naissance',$date_de_naissance,PDO::PARAM_STR);
        // $query->bindParam(':mail',$mail,PDO::PARAM_STR);
        // $query->bindParam(':telephone',$telephone,PDO::PARAM_STR);
        // $query->bindParam(':password',$password,PDO::PARAM_STR);
        // $query->bindParam(':role',$role,PDO::PARAM_STR);

        // // faire ça
        $params = array(
            ':nom' => $nom, 
            ':prenom' => $prenom,
            ':date_de_naissance' => $date_de_naissance,
            ':mail' => $mail,
            ':telephone' => $telephone,
            ':password' => $password,
            ':role' => $role
            // etc
        );
        $query->execute($params);

        $lastInsertId = $bdd->lastInsertId();
        $lastInsertId = $bdd->lastInsertId();

        if($lastInsertId){
            echo "<script>window.alert('Insertion Réussie !')</script>";
            echo "<script>window.location.href='insert.php'</script>";

        }else{
            echo "<script>window.alert('Oups ! Quelque chose s'est mal passé pendant l'insertion')</script>";
            echo "<script>window.location.href='insert.php'</script>";
        }
    }

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Insertion d'un nouveau Membre</h3>
            </div>
        </div>

        <form action="#" name="insertRecord" method="POST">
            <div class="row">
                <div class="col-md-4">
                    <p style="margin-bottom:-2px"><strong>Nom</strong></p>
                    <input type="text" name="nom" class="form-control" required>
                </div>
              
                <div class="col-md-4">
                    <p style="margin-bottom:-2px"><strong>Prénom</strong></p>
                    <input type="text" name="prenom" class="form-control" required>
                </div>
              
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <p style="margin-bottom:-2px"><strong>date de naissance</strong></p>
                    <input type="text" name="date_de_naissance" class="form-control" required>
                </div>
              
                <div class="col-md-4">
                    <p style="margin-bottom:-2px"><strong>Email</strong></p>
                    <input type="email" name="mail" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <p style="margin-bottom:-2px"><strong>Téléphone</strong></p>
                    <input type="text" name="telephone" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <p style="margin-bottom:-2px"><strong>Mot de Passe</strong></p>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <p style="margin-bottom:-2px"><strong>Rôle</strong></p>
                    <input type="text" name="role" class="form-control" required>
                </div>
            </div>

            <div class="row" style="margin-top:1%">
                <div class="col-md-8">
                    <input type="submit" name="insert" class="btn btn-success" value="Créer">
                    <a href="dashboard.php" class="btn btn-danger">Retour</a>
                </div>
            </div>
        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>
</html>
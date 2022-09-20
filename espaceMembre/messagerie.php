<?php
session_start();
require_once '../config.php';

try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=abysses', 'root', '');
} catch (PDOException $e) {
    exit("Error" . $e->getMessage());
}

if (isset($_POST["formMessage"])) {

    if (isset($_POST["objet"]) && !empty($_POST["objet"])) {
        $objet = htmlspecialchars($_POST["objet"]);
    };
    if (isset($_POST["nom"]) && !empty($_POST["nom"])) {
        $nom = htmlspecialchars($_POST["nom"]);
    };
    if (isset($_POST["mail"]) && !empty($_POST["mail"])) {
        $mail = htmlspecialchars($_POST["mail"]);
    };
    if (isset($_POST["telephone"]) && !empty($_POST["telephone"])) {
        $telephone = htmlspecialchars($_POST["telephone"]);
    };
    if (isset($_POST["message"]) && !empty($_POST["message"])) {
        $message = nl2br(htmlspecialchars($_POST["message"]));
    };

    if (isset($_POST["image"]) && !empty($_POST["image"])) {
        $image = htmlspecialchars($_POST["image"]);
    }

    $image = $_FILES['image']['name'];
    $image_temp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];
    $image_folder = '../image/' . $image;

$insertMessage = $bdd->prepare('INSERT INTO messagerie (objet, nom, mail, telephone, message, image) VALUE ( ?, ?, ?, ?, ?, ?)');
$insertMessage->execute(array($objet, $nom, $mail, $telephone, $message, $image));
header('location:membre.php');
if ($insertMessage){
  
    if($image_size < 524880 ){
    move_uploaded_file($image_folder, $image_temp_name);
}}else{
    echo "<script>window.alert('Message envoyé !');</script>";

};

}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forme message</title>

    <link rel="stylesheet" href="../cssDashboard/messagerieMembre.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="jumbotron" style="border: solid 1px grey; width:80%; margin-left: 10%; margin-top:1%; ">
        <h1 class="display-5"style="margin-top:-5%;">Messagerie</h1>
        <div>

        </div>
        <hr class="my-4">
        <a type="button" href="membre.php" class="btn btn-warning btn-sm" style="margin-bottom:-3%;">Retour</a>
    </div>
    <section class="form-container" id="message">

        <div class="grid">

            <form class="box1" action="" method="post" enctype="multipart/form-data">
                <h3>Envoyer un message</h3>
                <p><input type="text" required placeholder="Objet du message" class="box" name="objet" cols="30"></p>
                <p><input type="text" required placeholder="entrez votre nom" class="box" name="nom" cols="30"></p>
                <p><input type="email" required placeholder="entrez un email" class="box" name="mail" cols="30"></p>
                <p><input type="text" required placeholder="entrez un numéro de téléphone" class="box" name="telephone" cols="30"></p>
                <p><textarea name="message" required placeholder="Entrez votre message ici" id="textarea" cols="60" rows="10"></textarea></p>
                <p><input type="file" name="image" class="box" accept="image/jpg, image/png, image/jpeg, image/webp"></p>

                <input type="submit" value="Envoyer" class="btn btn-success mb-2" name="formMessage">
            </form>

            <section id="message"></section>
          
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
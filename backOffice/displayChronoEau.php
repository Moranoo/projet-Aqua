<?php
require_once '../class/Database.php';

 if(!isset($_POST['key']) || empty($_POST['key'])){
    exit('erreur key');
}
$id = htmlspecialchars($_POST['key']);


$bdd = new Database('localhost', 'abysses', 'root', '');
$conn = $bdd->connect();

$sql = $conn->prepare("SELECT * FROM aquariums WHERE id= ?");
$sql->execute([$id]);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards</title>
    <link rel="stylesheet" href="../cssDashboard/jumbotron.css">
    <link rel="stylesheet" href="../cssDashboard/card.css">
    <link rel="stylesheet" href="../cssDashboard/chrono.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<form action="./dateEau.php" method="POST">
<button title="Définir un nouveau compte à rebours" class="btn btn-sm" type="submit" id="reset" name="reset" style="background:yellowGreen; color:white;">Reset</button>
<button type="button" class="btn btn-secondary close" data-dismiss="modal" aria-label="Close">

<input type="hidden" name="key" value="<?php echo htmlentities($id) ?>" >
</form>

</body>
</html>
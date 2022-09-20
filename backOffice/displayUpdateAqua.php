<?php
require_once '../class/Database.php';

 if(!isset($_POST['key']) || empty($_POST['key'])){
    exit('erreur key');
}
$id = htmlspecialchars($_POST['key']);


$bdd = new Database('localhost', 'abysses', 'root', '');
$conn = $bdd->connect();

$sql =("SELECT * FROM aquariums WHERE id= ?");
$select = $conn-> prepare($sql);
$select->execute([$id]);

$result = $select->fetch(PDO::FETCH_ASSOC);


 
foreach ($select as $result); {
    $aq_id = $result['id'];
    $aq_nbac = $result['nbac'];
    $aq_image = $result['image']??"";
    $aq_conductivite = $result['conductivite'];
    $aq_ph = $result['ph'];
    $aq_volume = $result['volume'];
    $aq_biotopEspeces = $result['biotopEspeces'];
    $aq_typeNourriture = $result['typeNourriture'];
    $aq_typeEau = $result['typeEau'];
    $aq_prixVente = $result['prixVente'];
 ?>

<form action="./updateAqua.php" name="updateRecordAqua" method="POST" enctype="multipart/form-data">
    <div class="row">

        <div class="col-md-6">
            <p><strong>N° du Bac</strong></p>
            <input type="text" name="nbac" value="<?php echo htmlentities($aq_nbac) ?>" class="form-control" required>
        </div>


        <div class="col-md-6">
            <p><strong>Conductivité</strong></p>
            <input type="text" name="conductivite" value="<?php echo htmlentities($aq_conductivite) ?>" class="form-control" required>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Ph</strong></p>
            <input type="text" name="ph" value="<?php echo htmlentities($aq_ph) ?>" class="form-control" required>
        </div>

        <div class="col-md-6">
            <p><strong>Volume</strong></p>
            <input type="text" name="volume" value="<?php echo htmlentities($aq_volume) ?>" class="form-control" required>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Biotop / Espèces</strong></p>
            <input type="text" name="biotopEspeces" value="<?php echo htmlentities($aq_biotopEspeces) ?>" class="form-control" required>
         
        </div>
        <div class="col-md-6">
            <p><strong>Type de Nourriture</strong></p>
            <input type="text" name="typeNourriture" value="<?php echo htmlentities($aq_typeNourriture) ?>" class="form-control" required>
        </div>


    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <p><strong>Type d'Eau</strong></p>
            <input type="text" name="typeEau" value="<?php echo htmlentities($aq_typeEau) ?>" class="form-control" required>
        </div>
        <div class="col-md-6">
            <p><strong>Prix de vente</strong></p>
            <input type="text" name="prixVente" value="<?php echo htmlentities($aq_prixVente) ?>" class="form-control" required>
        </div>
    </div>
    <br>

<div class="row" style="margin-top:1%">
<div class="col-md-8">
    <input type="submit" name="update" class="btn btn-warning" value="Modifier" style="color:white">
    <a href="cards.php" class="btn btn-danger">Retour</a>
</div>
</div>
<input type="hidden" name="key" value="<?php echo htmlentities($id) ?>" >
</form>


<?php
}
?>



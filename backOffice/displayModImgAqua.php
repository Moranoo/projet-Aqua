<?php
require_once '../class/Database.php';

 if(!isset($_POST['key']) || empty($_POST['key'])){
    exit();
}
$id = htmlspecialchars($_POST['key']);


$bdd = new Database('localhost', 'abysses', 'root', '');
$conn = $bdd->connect();

$sql = $conn->prepare("SELECT * FROM aquariums WHERE id= ?");
$sql->execute([$id]);

$result = $sql->fetch(PDO::FETCH_ASSOC);


 
foreach ($sql as $result); {
    $aq_id = $result['id'];
    $aq_nbac = $result['nbac'];
    $aq_image = $result['image'];
    $aq_conductivite = $result['conductivite'];
    $aq_ph = $result['ph'];
    $aq_volume = $result['volume'];
    $aq_biotopEspeces = $result['biotopEspeces'];
    $aq_typeNourriture = $result['typeNourriture'];
    $aq_typeEau = $result['typeEau'];
    $aq_prixVente = $result['prixVente'];
 ?>
 <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Image de l'aquarium N° <?php echo htmlspecialchars($aq_nbac)?></h3>

                <form action="./modImgAqua.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Téléchargez ici votre image</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>

                    <button type="submit" name="image" class="btn btn-danger" style="margin-top:15px">Télécharger</button>
                    <input type="hidden" name="key" value="<?php echo htmlentities($id) ?>" >
                </form>
            </div>
        </div>
    </div>


<?php
}
?>
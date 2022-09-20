<?php
//On inclut la classe "newAqua" pour gérer la connection et la pagination des aquariums. 
include_once('newAqua.php');

// include '../config.php';
// Démarre ou restaure une session
session_start();

// Teste si user est authentifié
if (isset($_SESSION['isauth']) && $_SESSION['isauth']) {
    $isauth = true;
} else {
    $isauth = false;
}

// Teste si role est défini
if (isset($_SESSION['role']) && $_SESSION['role']) {
    $role = $_SESSION['role'];
} else {
    $role = 'adherent';
}

// Gestion de la pagination initiale
if (!isset($_GET['page']) || empty($_GET['page']) || (int) $_GET['page'] < 1) {
    header('location: cards.php?page=1');
    exit();
}

$current_page = htmlspecialchars($_GET['page']);
$aquariums = newAqua::list($current_page, 10);


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

    <link rel="apple-touch-icon" sizes="180x180" href="../favicon//apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon//favicon-16x16.png">
    <link rel="manifest" href="../favicon//site.webmanifest">
</head>

<body class="col-xl-12">
    <div class="jumbotron" style="border: solid 1px grey; width:80%; margin-left: 10%; margin-top:2%; ">
        <h1 class="display-4">Tableau de bord des aquariums</h1>
        <div>

        </div>
        <hr class="my-4">
        <button title="Créer un nouvel aquarium" type="button" class="btn btn-primary btn-sm <?php echo ($_SESSION['role'] === 'adherent' ? 'd-none' : ''); ?>" data-toggle="modal" data-target="#modal"><i class="fa-solid fa-folder-plus"></i> Ajouter un aquarium
        </button>
    </div>
    <div>

        <nav aria-label="breadcrumb" style="width:80%; margin-left:10%">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item <?php echo ($_SESSION['role'] === 'adherent' ? 'd-none' : ''); ?>"><a href="../backOffice/backOffice.php">Back-Office</a></li>
                <li class="breadcrumb-item <?php echo ($_SESSION['role'] === 'bureau' ? 'd-none' : ''); ?>"><a href="../espaceMembre/membre.php">membre</a></li>
                <li class="breadcrumb-item"><a href="../backOffice/aquarium.php">Aquariums</a></li>
            </ol>
        </nav>

        <p style="margin-left:10%; ">Recherche par N° d'aquarium : </p>
        <form class="form-inline my-2 my-sm-0" style="margin-left:10%;">
            <input class="form-control mr-sm-5 mb-5" type="search" id="searchAqua" placeholder=" N° aquarium" aria-label="Search">

        </form>

        <div class="row d-inline-flex flex-wrap mx-0">
            <?php
            $aquariums = newAqua::list($current_page);
            $html = '';

            foreach ($aquariums as $result) {
                // On récupère les variables de chaque aquarium
                $aq_id = $result['id'];
                $aq_nbac = $result['nbac'];
                $aq_image = !empty($result['image']) ? $result['image'] : "default-aquarium.jpg";
                $aq_conductivite = $result['conductivite'];
                $aq_ph = $result['ph'];
                $aq_volume = $result['volume'];
                $aq_biotopEspeces = $result['biotopEspeces'];
                $aq_typeNourriture = $result['typeNourriture'];
                $aq_typeEau = $result['typeEau'];
                $aq_prixVente = $result['prixVente'];
                $aq_chronoEau = $result['chronoEau'];
                $aq_chronoFiltre = $result['chronoFiltre'];

                // on forme le code html pour chaque carte d'aquarium
                $html .=
                    '

                        <div class="col-6 col-sm-4 col-md-3 mb-3">
                        <div class="card" style="width:18rem; margin-left:0;padding-right:0;">
                          <img src="../imageAqua/' . $aq_image . '"
                           class="card-image-top" alt="image aquarium" width="287" height="150">
                        <div class="card-body" style="width:286px;">
                        <h5 class="card-title" style="text-align: center;"> Bac N° ' . $aq_nbac . '</h5>
                        <div class="d-flex mb-4 justify-content-between">
                            

                                <button title="Voir les détails de l\'aquarium" type="button" data-toggle="modal"  data-target="#modal" class="btn btn-primary btn-sm ' . ($role === 'adherent' ? 'd-none' : '') . '">
                                <i class="fa-solid fa-eye fa-xl" data-id="'.$aq_id.'"></i>
                                </button>


                                <button title="Modifier les données de l\'aquarium" type="button" data-toggle="modal" data-target="#modal" class="btn btn-warning btn-sm ' . ($role === 'adherent' ? 'd-none' : '') . '" >
                                <i class="fa-solid fa-pencil fa-xl" data-id="'.$aq_id.'"></i>
                                </button>

                                <button title="Modifier l\'image de l\'aquarium" type="button" data-toggle="modal" data-target="#modal" class="btn btn-warning btn-sm ' . ($role === 'adherent' ? 'd-none' : '') . '">
                                <i class="fa-solid fa-image fa-xl" data-id="'.$aq_id.'"></i>
                                </button>

                                <a href="./delete.php?del=' . $aq_id . '" title="Supprimer l\'aquarium" class="btn btn-danger btn-sm ' . ($_SESSION['role'] === 'adherent' ? 'd-none' : '') . '" onclick="return confirm (\'Voulez-vous vraiment supprimer cet aquarium ?\')">
                                <i class="fa-solid fa-trash-can fa-xl" data-id="'.$aq_id.'" ></i>
                                </a>
                            </div>
                            <button title="Voir les détails de l\'aquarium" type="button" data-toggle="modal"  data-target="#modal" class="btn btn-primary btn-sm ' . ($role === 'bureau' ? 'd-none' : '') . '">
                                <i class="fa-solid fa-eye fa-xl" data-id="'.$aq_id.'"></i>
                                </button>
                    
                            <button title="Consulter le compte à rebours changement d\'eau" type="button" id="affiche'.$aq_id.'" class="btn btn-info water_timer" data-toggle="modal" data-target="#modal"  data-timer="'.$aq_chronoEau.'" style="margin-bottom:5px;"><i class="fa-solid fa-clock-rotate-left fa-xl" data-id="'.$aq_id.'"></i> Eau</button>

                            <button title="Consulter le compte à rebours changement du filtre" type="button" class="btn btn-success filter_timer" data-toggle="modal" data-target="#modal" data-timer="'.$aq_chronoFiltre.'" style="margin-bottom:5px"><i class="fa-solid fa-clock fa-xl filter" data-id="'.$aq_id.'"></i> Filtre</button>
                        
                        </div>
                    </div>
                       
                        
                </div>';
            }
            echo $html;
            ?>

        </div>
        <!-- Modal-->
        <div class="modal fade ml-3" id="modal" tabindex="-1" aria-labelledby="modal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-label" style="text-align: center;" data-title="'.$aq_id.'"></h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
 



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    
    <script src="../js/modal.js"></script>
    <script src="../js/searchAqua.js"></script>
    <script src="../js/chronoEau.js"></script>
    <script src="../js/chronoFiltre.js"></script>

</body>

</html>
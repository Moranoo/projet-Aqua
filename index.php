<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <link rel="stylesheet" href="resetMeyer.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./responsive/membre.index.css">
    <link rel="stylesheet" href="./responsive/footer.index.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="apple-touch-icon" sizes="180x180" href="./favicon//apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon//favicon-16x16.png">
    <link rel="manifest" href="./favicon//site.webmanifest">

</head>

<body class="container">

    <header>
        <img class="banner" src="./images/image15.png" alt="poisson Oscar">
        <div class="container1">

            <span class="text1"><a id="toIndex" href=index.php><img class="logo" src="./images/logoAbysses.png" alt="logo de l'association les abysses"></a></span>
            <span class="text2">Rueil-Malmaison</span>
        </div>
        <div class="toggle"></div>

        <nav>
            <ul>
                <li><a class="active" href="../index.php">Home</a></li>
                <li><a href="./pages/quiSommesNous.php">Qui Sommes Nous ?</a></li>
                <li><a href="./pages/galerie.php">Galerie</a></li>
                <li><a href="./pages/contact.php">Contact</a></li>
                <li><a href="./pages/inscription.php" class="">Se connecter</a></li>
                <li><a href="https://www.instagram.com/aquabysses/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://www.facebook.com/Club-aquariophile-les-abysses-558375734206459" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f"></i></a></li>
            </ul>
        </nav>
    </header>
    <main>

        <section class="leClub">
            <section class="gauche">
                <article class="club">
                    <h5>LE CLUB</h5>
                    <p>
                        Notre association Aquabysses vous accueille dans son terrain de jeu de presque 10 000L d'eau douce à Rueil Malmaison.
                    </p>
                    <a class="button liens" href="pages/quiSommesNous.php">Qui Sommes Nous ?</a>
                </article>

                <div class="image2" id="poisson1">
                    <img src="./images/rectangle50.png" alt="poisson">
                </div>
            </section>


            <section class="droite">
                <div class="image2" id="poisson2">
                    <img src="./images/homeImage3.png" alt="poisson">
                </div>

                <article class="rencontrer">
                    <h5>NOUS RENCONTRER</h5>
                    <p>Une question sur notre club ? Un renseignement ? Venez visiter notre club et vous serez accueillis parmi nos adhérents.
                    </p>
                    <a href="pages/contact.php" class="button liens">Nous rencontrer</a>
                </article>
            </section>
        </section>



        <?php

        include("./pages/membre.inc.php");

        ?>
        </section>

        <div class="bubbles">
            <img src="images/bubble.png" alt="bulles d'air">
            <img src="images/bubble.png" alt="bulles d'air">
            <img src="images/bubble.png" alt="bulles d'air">
            <img src="images/bubble.png" alt="bulles d'air">
            <img src="images/bubble.png" alt="bulles d'air">
            <img src="images/bubble.png" alt="bulles d'air">
            <img src="images/bubble.png" alt="bulles d'air">
        </div>



    </main>
    <?php
    require './pages/footer.inc.php';
    ?>





    <script src="./js/index.js"></script>
    <script src="./js/lienInscription.js"></script>
</body>

</html>
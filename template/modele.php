<?php
    $page = $_GET['page'];
    include('../inc/function.php');
    customSessionStart();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
</
</head>
<body>
    <div class="_navbar">
        <a class="" href="modele.php?page=accueil/index">
            <div class="_row full_width">
                <img src="../assets/icon/home.svg" alt="">
                <span class="navlabel">Accueil</span>
            </div>
        </a>
        <a class="row" href="modele.php?page=marketplace/index">
            <div class="_row">
                <img src="../assets/icon/market.svg" alt="">
                <span class="navlabel">Marketplace</span>
            </div>
        </a>
        <a class="row" href="modele.php?page=collection/index">
            <div class="_row">
                <img src="../assets/icon/collection.svg" alt="">
                <span class="navlabel">Collections</span>
            </div>
        </a>

        <a class="row" href="modele.php?page=porteMonnaie/index">
            <div class="_row">
                <img src="../assets/icon/coins.svg" alt="">
                <span class="navlabel">Porte monnaie</span>
            </div>
        </a>

        <a class="row" href="modele.php?page=recherche/index">
            <div class="_row">
                <img src="../assets/icon/search.png" alt="">
                <span class="navlabel">Recherche</span>
            </div>
        </a>
        <a class="row" href="modele.php?page=profil/index">
            <div class="_row">
                <img src="../assets/icon/rprofile.svg" alt="">
                <span class="navlabel">Profile</span>
            </div>
        </a>
        <a class="row" href="../pages/deconnexion/logOut.php">
            <div class="_row">
                <img src="../assets/icon/logout.svg" alt="">
                <span class="navlabel">Se deconnecter</span>
            </div>
        </a>
    </div>

    <div class="row col-lg-12 col-md-12 col-xs-12" style="padding: 0;margin: 0">
        <div class="row" style="padding: 0; margin: 0">
            <div class="_header row full_width" style="margin: 0">
                <div class="col-xs-5 col-xs-offset-1">
                    <img src="../assets/logo/pokemon.png" alt="" width="120px">
                </div>

                <div class="col-xs-3 col-xs-offset-3" style="padding: 0">
                    <div class="solde">
                           Votre solde: <?php echo getSold_user($_SESSION['user']['id_user'],logBd())['somme'] ?>$

                    </div>
                </div>

<!--                <div class="col-lg-2 col-lg-offset-0">-->
<!--                    <div class="user">-->
<!--                        Sacha-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>


        <div class="row">
            <div class="_content col-lg-offset-1 col-md-offset-2 col-xs-offset-3">
                <?php include(__DIR__."/../pages/".$page.".php") ?>
            </div>
        </div>
    </div>

</body>
</html>
<?php
    $page = $_GET['page'];
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
</
</head>
<body style="background-color: #171717">
    <div class="_navbar visible-lg">
        <a class="" href="">
            <div class="_row full_width">
                <img src="../assets/icon/home.svg" alt="">
                <span class="navlabel">Accueil</span>
            </div>
        </a>
        <a class="row" href="">
            <div class="_row">
                <img src="../assets/icon/stock.svg" alt="">
                <span class="navlabel">Stock</span>
            </div>
        </a>
        <a class="row" href="">
            <div class="_row">
                <img src="../assets/icon/collection.svg" alt="">
                <span class="navlabel">Demande de Fond</span>
            </div>
        </a>

        <a class="row" href="">
            <div class="_row">
                <img src="../assets/icon/stat.svg" alt="">
                <span class="navlabel">Statistiques</span>
            </div>
        </a>

        <a class="row" href="">
            <div class="_row">
                <img src="../assets/icon/setting.svg" alt="">
                <span class="navlabel">Modifications</span>
            </div>
        </a>
        <a class="row" href="">
            <div class="_row">
                <img src="../assets/icon/logout.svg" alt="">
                <span class="navlabel">Se deconnecter</span>
            </div>
        </a>
    </div>

    <div class="row" style="padding: 0;margin: 0">
        <div class="row" style="padding: 0; margin: 0">
            <div class="_header row full_width" style="margin: 0">
                <div class="col-lg-9 col-lg-offset-1">
                    <img src="../assets/logo/pokemon.png" alt="" width="120px">
                </div>

<!--                <div class="col-lg-2" style="padding: 0">-->
<!--                    <a href="">-->
<!--                        <button class="form-control btn-block">Admin Privileges</button>-->
<!--                    </a>-->
<!---->
<!--                </div>-->



                <div class="col-lg-2 col-lg-offset-0" style="padding: 0">
                    <div class="solde">
                        Administrateur
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="_content col-lg-offset-1 visible-lg">
                <?php include(__DIR__."/../pages/admin/".$page.".html") ?>
            </div>
        </div>
    </div>

</body>
</html>
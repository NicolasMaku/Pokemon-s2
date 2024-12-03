<?php
    $listSeries = getListe_serie(logBd());
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> profile </title>
</head>

<body>
<div class="row">
    <div class="row" style="margin-left: -18px">
        <img src="../assets/logo/logo6.png" alt="" style="object-fit: cover;filter: brightness(0.7)" width="100%" class="img1">
    </div>
    <div class="main-label open-text">
        Modifier: Series
    </div>

    <div class="sous-label3" style="top:280px">
        <!--					 Homme  |  17 ans<br>-->
        <!--					45 cartes possedées <br>-->
        <!--					Estimation: 127.98$-->
    </div>

    <!--		<div class="sous-label2">-->
    <!--			Pret à devenir le meilleur collectionneur <br> de cartes Pokemons ?-->
    <!--		</div>-->

    <a href="">
        <button class="shop_btn">Decouvrir des cartes </button>
    </a>

</div>

<div class="row">
    <div class="row main-label1" style="margin-top: 20px">
        Ajouter une serie
    </div>
</div>

<div class="row" style="margin-top: 30px">
    <form action="../pages/admin/modification/serieProcess.php" method="POST" enctype="multipart/form-data">
        <div class="col-lg-4 col-md-offset-4" style="margin-top: 20px">
            <div class="input-group">
                <span class="input-group-addon" >Nom</span>
                <input type="text" name="nom" class="form-control" aria-label="Amount (to the nearest dollar)" required>

            </div>
            <input type="file" name="image" style="margin-top: 10px; color: white">
            <input type="submit" value="Ajouter" class="form-control btn-block" style="margin-top: 10px;float: right">
        </div>
    </form>
</div>

<div class="row">
    <div class="row main-label1" style="margin-top: 40px">
        Modifier / Supprimer: series
    </div>
</div>

<div class="row bottom-border" style="margin-top: 40px">

    <?php

    for ($i = 0; $i < count($listSeries); $i++) { ?>
        <a href="modeleadmin.php?page=modification/modifyserie&&id_serie=<?php echo $i ?>">
            <div class="col-lg-4 _center">
                <img src="../assets/series/<?php echo $listSeries[$i]['nom_image']; ?>" alt="" class="series-img">
            </div>
        </a>
    <?php }
    ?>

</div>
</body>
</html>

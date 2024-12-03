<?php

    $info_admin = $_SESSION['user'];
    $liste_stock = getList_stock_carte(logBd());
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
        Modifier: Liste Cartes
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
        Ajouter une carte
    </div>
</div>

<div class="row" style="margin-top: 30px">
    <form action="" method="" enctype="multipart/form-data">
        <div class="col-lg-4 col-md-offset-4" style="margin-top: 20px">
            <div class="input-group">
                <span class="input-group-addon">Nom</span>

                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" required>

            </div>

            <div class="input-group" style="margin-top: 10px">
                <span class="input-group-addon">Prix</span>

                <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" required>

            </div>
            <div class="row" style="margin-top: 10px">
                <span style="color: white">Series:</span>
                <select name="" id="">
                    <option value="">Toutes</option>
                    <option value="">Celebrations</option>
                    <option value="">Zenith Supreme</option>
                    <option value="">Evolution Celeste</option>
                    <option value="">Epee et bouclier</option
                    <select name="" id=""></select>
                </select>
            </div>
            <input type="file" style="margin-top: 10px; color: white">

            <input type="submit" value="Ajouter" class="form-control btn-block" style="margin-top: 10px;float: right">
        </div>
    </form>
</div>

<div class="row">
    <div class="row main-label1" style="margin-top: 40px">
        Modifier / Supprimer: cartes
    </div>
</div>

<div class="row" style="margin-top: 60px; margin-bottom: 60px">
    <?php for ($i=0; $i < count($liste_stock); $i++) { ?>
        <a href="../pages/admin/modification/modifycarte.php?id=<?php echo $i; ?>">
            <div class="col-lg-3 _center">
                <img src="../assets/cartes/<?php echo $liste_stock[$i]['nom_image_pokemon']; ?>" alt="" class="carte-img">
                <div class="nom-carte"><?php echo $liste_stock[$i]['Nom_pokemon']; ?></div>
                <div class="serie-carte"><?php echo $liste_stock[$i]['Nom_serie']; ?></div>
                <div class="prix-carte"><?php echo $liste_stock[$i]['prix']; ?></div>
            </div>
        </a>
    <?php } ?>

    <!-- <a href="">
        <div class="col-lg-3 _center">
            <img src="../assets/cartes/6.jpg" alt="" class="carte-img">
            <div class="nom-carte">Pikatchu volant</div>
            <div class="serie-carte">EVOLUTION CELESTE</div>
            <div class="prix-carte">Prix: 5800</div>
        </div>
    </a> -->

    <!-- <a href="">
        <div class="col-lg-3 _center">
            <img src="../assets/cartes/20.jpg" alt="" class="carte-img">
            <div class="nom-carte">Olvini</div>
            <div class="serie-carte">TEMPETE ARGENTEE</div>
            <div class="prix-carte">Prix: 500</div>
        </div>
    </a>

    <a href="">
        <div class="col-lg-3 _center">
            <img src="../assets/cartes/2.jpg" alt="" class="carte-img">
            <div class="nom-carte">Lunala</div>
            <div class="serie-carte">ZENITH SUPREME</div>
            <div class="prix-carte">Prix: 1500</div>
        </div>
    </a> -->
</div>
</body>
</html>

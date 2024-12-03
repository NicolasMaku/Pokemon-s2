<?php
    $user = getUser_info("nicolas@gmail.com",'nicolas',logBd());

//    $mycards = getUser_cartes($_SESSION['user']['id_user'],logBd());
//    var_dump($user);
    $mycards = getUser_cartes($user['id_user'],logBd());
    $listSeries = getListe_serie(logBd());
//    var_dump($mycards);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> marketplace </title>
</head>

<body>
<div class="row">
    <div class="row" style="margin-left: -18px">
        <img src="../assets/logo/logo3.png" alt="" style="object-fit: cover" width="100%" class="img1">
    </div>
    <div class="main-label open-text">
        Collections
    </div>

    <!--		<div class="sous-label1">-->
    <!--			Sacha-->
    <!--		</div>-->

    <div class="sous-label2">
        Pret à devenir le meilleur collectionneur <br> de cartes Pokemons ?
    </div>

    <a href="modele.php?page=marketplace/index">
        <button class="shop_btn">Decouvrir des cartes </button>
    </a>
</div>


<div class="row">
    <div class="row main-label1" style="margin-top: 20px">
        Cartes en possession
    </div>
</div>

<div class="row">
    <div class="col-md-7" style="font-size: 25px; color: #3d3d3d; margin-top: 10px">
        Trier par:
    </div>

    <div class="col-md-4">
        <div class="row">
            <div class="col-md-4">
                <a href=""><button class="tri_btn">Prix</button></a>
            </div>
            <div class="col-md-4">
                <a href=""><button class="tri_btn">Nom</button></a>
            </div>
            <div class="col-md-4">
                <a href=""><button class="tri_btn">Serie</button></a>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 80px; margin-bottom: 60px">

    <?php
    for ($i = 0; $i < count($mycards); $i++) { ?>
        <a href="modele.php?page=cartes/index&idcarte=<?php echo  getCarte_pokemon_by_id($mycards[$i]['id_carte'],logBd())['id_carte'] ?>">
            <div class="col-md-3 _center">
                <img src="../assets/cartes/<?php echo getCarte_pokemon_by_id($mycards[$i]['id_carte'],logBd())['nom_image_pokemon'] ?>" alt="" class="carte-img">
                <div class="nom-carte"><?php echo getCarte_pokemon_by_id($mycards[$i]['id_carte'],logBd())['Nom_pokemon'] ?></div>
                <div class="serie-carte"><?php echo $listSeries[getCarte_pokemon_by_id($mycards[$i]['id_carte'],logBd())['id_serie']]['Nom_serie'] ?></div>
                <div class="prix-carte">Prix: <?php echo getCarte_pokemon_by_id($mycards[$i]['id_carte'],logBd())['prix'] ?></div>
            </div>
        </a>
    <?php }
    ?>

<!--    <a href="">-->
<!--        <div class="col-md-3 _center">-->
<!--            <img src="../assets/cartes/15.jpg" alt="" class="carte-img">-->
<!--            <div class="nom-carte">Lunala</div>-->
<!--            <div class="serie-carte">CELEBRATIONS</div>-->
<!--            <div class="prix-carte">Prix: 1500</div>-->
<!--        </div>-->
<!--    </a>-->
<!---->
<!--    <a href="">-->
<!--        <div class="col-md-3 _center">-->
<!--            <img src="../assets/cartes/6.jpg" alt="" class="carte-img">-->
<!--            <div class="nom-carte">Pikatchu volant</div>-->
<!--            <div class="serie-carte">EVOLUTION CELESTE</div>-->
<!--            <div class="prix-carte">Prix: 5800</div>-->
<!--        </div>-->
<!--    </a>-->
<!---->
<!--    <a href="">-->
<!--        <div class="col-md-3 _center">-->
<!--            <img src="../assets/cartes/20.jpg" alt="" class="carte-img">-->
<!--            <div class="nom-carte">Olvini</div>-->
<!--            <div class="serie-carte">TEMPETE ARGENTEE</div>-->
<!--            <div class="prix-carte">Prix: 500</div>-->
<!--        </div>-->
<!--    </a>-->
<!---->
<!--    <a href="">-->
<!--        <div class="col-md-3 _center">-->
<!--            <img src="../assets/cartes/2.jpg" alt="" class="carte-img">-->
<!--            <div class="nom-carte">Lunala</div>-->
<!--            <div class="serie-carte">ZENITH SUPREME</div>-->
<!--            <div class="prix-carte">Prix: 1500</div>-->
<!--        </div>-->
<!--    </a>-->
</div>
</body>
</html>

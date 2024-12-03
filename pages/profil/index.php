<?php

    //    $infoUser = getUser_info()
    $user = $_SESSION['user'];
    $nbreCarte = getUser_cartes($user['id_user'],logBd());

    $carteVendre = getList_pokemon_a_vendre(logBd());


//    if (isset($_GET['filtre'])) {
//        if ($_GET['filtre'] == "prix") {
//            $carteVendre = sorted_desc_by_price(logBd());
//        }
//        if ($_GET['filtre'] == "nom") {
//            $carteVendre = sorted_asc_by_name(logBd());
//        }
//        if ($_GET['filtre'] == "date") {
//            $carteVendre = sorted_desc_by_date(logBd());
//        }
//    }

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
        <?php echo $user['Nom_user'] ?>
    </div>

    <div class="sous-label3" style="top:280px">
        <?php echo $user['genre'] ?>  |  <?php echo getAge($user['id_user'],logBd()) ?> ans<br>
        <?php echo sommer($nbreCarte,"quantite") ?> cartes possedées <br>
        Estimation: <?php echo get_estimation_carte($user['id_user'],logBd()) ?>$
    </div>

    		<div class="sous-label2">
    			Pret à devenir le meilleur collectionneur <br> de cartes Pokemons ?
    		</div>

    <a href="modele.php?page=marketplace/index">
        <button class="shop_btn">Decouvrir des cartes </button>
    </a>

</div>

<div class="row">
    <div class="row main-label1" style="margin-top: 20px">
        Cartes à vendre
    </div>
</div>

<div class="row">
    <div class="col-lg-7" style="font-size: 25px; color: #3d3d3d; margin-top: 10px">
        Trier par:
    </div>

    <div class="col-lg-4">
        <div class="row">
            <div class="col-lg-4">
                <a href="modele.php?page=profil/index&&filtre=prix"><button class="tri_btn">Prix</button></a>
            </div>
            <div class="col-lg-4">
                <a href="modele.php?page=profil/index&&filtre=nom"><button class="tri_btn">Nom</button></a>
            </div>
            <div class="col-lg-4">
                <a href="modele.php?page=profil/index&&filtre=date"><button class="tri_btn">Date</button></a>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 80px; margin-bottom: 60px">

    <?php
    for ($i = 0; $i < count($carteVendre); $i++) { ?>
        <a href="">
            <div class="col-lg-3 _center">
                <img src="../assets/cartes/<?php echo getCarte_pokemon_by_id($carteVendre[$i]['id_carte'],logBd())['nom_image_pokemon'] ?>" alt="" class="carte-img">
                <div class="nom-carte"><?php echo getCarte_pokemon_by_id($carteVendre[$i]['id_carte'],logBd())['Nom_pokemon'] ?></div>
                <div class="serie-carte"><?php echo $listSeries[getCarte_pokemon_by_id($carteVendre[$i]['id_carte'],logBd())['id_serie']]['Nom_serie'] ?></div>
                <div class="prix-carte">Prix: <?php echo getCarte_pokemon_by_id($carteVendre[$i]['id_carte'],logBd())['prix'] ?></div>
            </div>
        </a>
    <?php }
    ?>



    <a href="">
        <div class="col-lg-3 _center">
            <img src="../assets/cartes/6.jpg" alt="" class="carte-img">
            <div class="nom-carte">Pikatchu volant</div>
            <div class="serie-carte">EVOLUTION CELESTE</div>
            <div class="prix-carte">Prix: 5800</div>
        </div>
    </a>

    <a href="">
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
    </a>
</div>
</body>
</html>

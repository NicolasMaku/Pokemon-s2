<?php
    $listCartes = getList_stock_carte(logBd());
    if (isset($_GET['filtre'])) {
        if ($_GET['filtre'] == "prix") {
            $listCartes = sorted_desc_by_price(logBd());
        }
        if ($_GET['filtre'] == "nom") {
            $listCartes = sorted_asc_by_name(logBd());
        }
        if ($_GET['filtre'] == "date") {
            $listCartes = sorted_desc_by_date(logBd());
        }
    }

    $listSeries = getListe_serie(logBd());
    var_dump($listSeries);

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
        <img src="../assets/logo/logo2.png" alt="" style="object-fit: cover" width="100%" class="img1">
    </div>
    <div class="main-label open-text">
        Marketplace
    </div>

    <!--		<div class="sous-label1">-->
    <!--			Sacha-->
    <!--		</div>-->

    <div class="sous-label2">
        Pret à devenir le meilleur collectionneur <br> de cartes Pokemons ?
    </div>

    <a href="">
        <button class="shop_btn">Decouvrir des cartes </button>
    </a>
</div>

<div class="row">
    <div class="row main-label1" style="margin-top: 20px">
        Cartes en vente
    </div>
</div>

<div class="row">
    <div class="col-md-7" style="font-size: 25px; color: #3d3d3d; margin-top: 10px">
        Trier par:
    </div>

    <div class="col-md-4">
        <div class="row">
            <div class="col-md-4">
                <a href="modele.php?page=marketplace/index&&filtre=prix"><button class="tri_btn">Prix</button></a>
            </div>
            <div class="col-md-4">
                <a href="modele.php?page=marketplace/index&&filtre=nom"><button class="tri_btn">Nom</button></a>
            </div>
            <div class="col-md-4">
                <a href="modele.php?page=marketplace/index&&filtre=date"><button class="tri_btn">Date</button></a>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 80px; margin-bottom: 60px">
    
    <?php
    for ($i = 0; $i < count($listCartes); $i++) { ?>
        <a href="modele.php?page=cartes/index&&idcarte=<?php echo $listCartes[$i]['id_carte'] ?>">
            <div class="col-md-3 _center">
                <img src="../assets/cartes/<?php echo getCarte_pokemon_by_id($listCartes[$i]['id_carte'],logBd())['nom_image_pokemon'] ?>" alt="" class="carte-img">
                <div class="nom-carte"><?php echo getCarte_pokemon_by_id($listCartes[$i]['id_carte'],logBd())['Nom_pokemon'] ?></div>
                <div class="serie-carte"><?php echo $listSeries[getCarte_pokemon_by_id($listCartes[$i]['id_carte'],logBd())['id_serie']]['Nom_serie'] ?></div>
                <div class="prix-carte">Prix: <?php echo getCarte_pokemon_by_id($listCartes[$i]['id_carte'],logBd())['prix'] ?></div>
            </div>
        </a>
    <?php }
    ?>

</div>


</body>
</html>

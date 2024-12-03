<?php
    $listSeries = getListe_serie(logBd());
    $recent4 = get4_recent(logBd());

    $user = $_SESSION['user'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Accueil </title>

</head>

<body>
<div class="row">
    <div class="row" style="margin-left: -18px">
        <img src="../assets/logo/epeebouclier.png" alt="" style="object-fit: cover" width="100%" class="img1">
    </div>
    <div class="main-label open-text">
        Welcome back,
    </div>

    <div class="sous-label1">
        <?php echo $user['Nom_user'] ?>
    </div>

    <div class="sous-label2">
        Pret à devenir le meilleur collectionneur <br> de cartes Pokemons ?
    </div>

    <a href="modele.php?page=marketplace/index">
        <button class="shop_btn">Decouvrir des cartes </button>
    </a>
</div>

<div class="row">
    <div class="row main-label1">
        Series Internationales
    </div>
</div>

<div class="row bottom-border" style="margin-top: 40px">
    <?php
    for ($i = 0; $i < count($listSeries); $i++) { ?>
        <a href="">
            <div class="col-md-4 _center">
                <img src="../assets/series/<?php echo $listSeries[$i]['nom_image']; ?>" alt="" class="series-img">
            </div>
        </a>
    <?php }
    ?>

</div>


<div class="row">
    <div class="row main-label1" style="margin-top: 60px">
        Nouveautés
    </div>
</div>

<div class="row" style="margin-top: 60px; margin-bottom: 60px">
    <?php
    for ($j = 0; $j < count($recent4); $j++) { ?>
        <a href="modele.php?page=cartes/index&&idcarte=<?php echo $recent4[$j]['id_carte'] ?>">
            <div class="col-md-3 _center">
                <img src="../assets/cartes/<?php echo getCarte_pokemon_by_id($recent4[$j]['id_carte'],logBd())['nom_image_pokemon'] ?>" alt="" class="carte-img">
                <div class="nom-carte"><?php echo getCarte_pokemon_by_id($recent4[$j]['id_carte'],logBd())['Nom_pokemon'] ?></div>
                <div class="serie-carte"><?php echo $listSeries[getCarte_pokemon_by_id($recent4[$j]['id_carte'],logBd())['id_serie']]['Nom_serie'] ?></div>
                <div class="prix-carte">Prix: <?php echo getCarte_pokemon_by_id($recent4[$j]['id_carte'],logBd())['prix'] ?></div>
            </div>
        </a>
    <?php }
    ?>

</div>
</body>
</html>
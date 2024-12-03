<?php
    $carte = getCarte_pokemon_by_id($_GET['idcarte'],logBd());
    $listeSerie = getListe_serie(logBd());
    $liste_stock = getList_stock_carte(logBd());
    $autreSuggestion = get_suggestion($carte['id_carte'],logBd());
//    $suggestion =
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> carte </title>
</head>

<style>

</style>

<body>
<div class="row" style="margin-top: 90px">
    <div class="col-md-4">
        <img src="../assets/cartes/<?php echo $carte['nom_image_pokemon'] ?>" alt="">
    </div>

    <div class="col-md-7 col-md-offset-1">
        <div class="row" style="font-size: 35px; font-weight: bold;margin-top: 10px">
            Nom: <?php echo $carte['Nom_pokemon'] ?>
        </div>

        <div class="row">
            Serie: <?php echo $listeSerie[$carte['id_serie']]['Nom_serie'] ?>
        </div>

        <div class="row">
<!--    fonction miget listeStock a partir de id carte        -->
            En stock: <?php
                $lsic = get_list_stock_by_idCarte(logBd(),$carte['id_carte']);
                if ($lsic == -1) {
                    echo "0";
                }
                if ($lsic >= 0)
                    echo $liste_stock[get_list_stock_by_idCarte(logBd(),$carte['id_carte'])]['quantite']
                ?>
        </div>

        <div class="row"  style="margin-top: 50px">
            <div class="col-md-2 col-md-offset-4" style="font-size: 20px; margin-top: 10px">
                Prix:<?php echo $carte['prix'] ?>$
            </div>

            <div class="col-md-2">
                <a href="../pages/cartes/pachat.php?id_carte=<?php echo $carte['id_carte'] ?>">
                    <button class="tri_btn">Acheter</button>
                </a>
            </div>
        </div>

        <div class="row" style="font-size: 30px; font-weight: bold;margin-top: 50px">
            Autres suggestions
        </div>

        <div class="row" style="padding-right: 25%;margin-top: 40px">
            <?php
            for ($i = 0; $i < count($autreSuggestion) ; $i++) { ?>
                <a href="modele.php?page=cartes/index&&idcarte=<?php echo $autreSuggestion[$i]['id_carte'] ?>">
                    <div class="col-md-3 _center">
                        <img src="../assets/cartes/<?php echo $autreSuggestion[$i]['nom_image_pokemon'] ?>" alt="" class="carte-img">
                    </div>
                </a>
            <?php }
            ?>
<!--            <a href="">-->
<!--                <div class="col-md-3 _center">-->
<!--                    <img src="../assets/cartes/15.jpg" alt="" class="carte-img">-->
<!--                </div>-->
<!--            </a>-->
<!---->
<!--            <a href="">-->
<!--                <div class="col-md-3 _center">-->
<!--                    <img src="../assets/cartes/6.jpg" alt="" class="carte-img">-->
<!--                </div>-->
<!--            </a>-->
<!---->
<!--            <a href="">-->
<!--                <div class="col-md-3 _center">-->
<!--                    <img src="../assets/cartes/20.jpg" alt="" class="carte-img">-->
<!--                </div>-->
<!--            </a>-->
<!---->
<!--            <a href="">-->
<!--                <div class="col-md-3 _center">-->
<!--                    <img src="../assets/cartes/2.jpg" alt="" class="carte-img">-->
<!--                </div>-->
<!--            </a>-->
        </div>

    </div>
</div>
</body>
</html>

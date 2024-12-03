<?php
    $best5 = getPokemon_plus_cher(logBd(),5);
    $listserie = getListe_serie(logBd());
    $liststock = getList_stock_carte(logBd());
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Statistiques </title>
</head>

<body>
<div class="row">
    <div class="row" style="margin-left: -18px">
        <img src="../assets/logo/logo5.png" alt="" style="object-fit: cover" width="100%" class="img1">
    </div>
    <div class="main-label open-text">
        Statistiques
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


<div class="row" style="margin-bottom: 80px">
    <div class="row main-label1" style="margin-top: 60px">
        Top Pokemon
    </div>

    <div class="row" style="margin-top: 80px; margin-bottom: 60px">

        <?php
        for ($i = 0; $i < count($best5); $i++) { ?>
            <a href="">
                <div class="col-lg-3 _center" style="margin-bottom: 50px">
                    <img src="../assets/cartes/15.jpg" alt="" class="carte-img">
                    <div class="nom-carte"><?php echo $best5[$i]['Nom_pokemon'] ?></div>
                    <div class="serie-carte"><?php echo $listserie[$best5[$i]['id_serie']]['Nom_serie'] ?></div>
                    <div class="prix-carte">Quantite: 1500</div>
                </div>
            </a>
        <?php }
        ?>

    </div>

    <div class="row main-label1">
        Montant par Utilisateurs
    </div>

    <div class="row" style="margin-top: 80px; margin-bottom: 60px;margin-left: 20px" >
        <div class="row request">
            <div class="col-lg-6 _center" style="color: white">
                Sacha
            </div>

            <div class="col-lg-6 _center">
                Montant: 150$
            </div>

        </div>

        <div class="row request">
            <div class="col-lg-6 _center" style="color: white">
                Sacha
            </div>

            <div class="col-lg-6 _center">
                Montant: 150$
            </div>


        </div>

        <div class="row request">
            <div class="col-lg-6 _center" style="color: white">
                Sacha
            </div>

            <div class="col-lg-6 _center">
                Montant: 150$
            </div>


        </div>

        <div class="row request">
            <div class="col-lg-6 _center" style="color: white">
                Sacha
            </div>

            <div class="col-lg-6 _center">
                Montant: 150$
            </div>


        </div>
    </div>



</div>
</body>
</html>

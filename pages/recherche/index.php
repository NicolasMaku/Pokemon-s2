<?php
    $listSerie = getListe_serie(logBd());
    $resultat = get4_recent(logBd());

    $defaultResult = [];
    $defaultValue = [];
    $defaultValue['prixMin'] =0 ;
    $defaultValue['prixMax'] =100000 ;
    $defaultValue['serie'] = "celebration" ;
    $defaultValue['nom'] = "Tortank" ;

//    var_dump($listSerie);

    if(isset($_GET['donnee'])) {
        $donnees = explode(',',$_GET['donnee']);
        $defaultValue['prixMin'] = $donnees[2];
        $defaultValue['prixMax'] = $donnees[3];
        $defaultValue['nom'] = $donnees[0];
        $defaultValue['serie'] = $donnees[1];

        $resultat = search($defaultValue['serie'],$defaultValue['nom'],$defaultValue['prixMin'],$defaultValue['prixMax'],logBd());
    }

    $listSeries = getListe_serie(logBd());

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
        <img src="../assets/logo/logo4.png" alt="" style="object-fit: cover" width="100%" class="img1">
    </div>
    <div class="main-label open-text">
        Recherche
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

    <div class="row" style="margin-top: 50px">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="../pages/recherche/process.php" method="POST">
                <div class="input-group btn-block">
                    <input type="text" name="nom" class="form-control btn-block" value="<?php echo $defaultValue['nom'] ?>" style="height: 50px">
                </div>

                <div class="row" style="margin-top: 20px">
                    <div class="col-lg-3">
                        Prix minimum:
                    </div>

                    <div class="col-lg-3">
                        <input type="number" name="prixMin" value="<?php echo $defaultValue['prixMin'] ?>" class="form-control btn-block" min="0">
                    </div>

                    <div class="col-lg-3">
                        Prix maximun:
                    </div>

                    <div class="col-lg-3">
                        <input type="number" name="prixMax" value="<?php echo $defaultValue['prixMax'] ?>" class="form-control btn-block" min="0">
                    </div>

                </div>

                <div class="row" style="margin-top: 20px">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="row">
                            <div class="col-lg-6">
                                Serie:
                            </div>

                            <div class="col-lg-6">
                                <select name="serie" id="" class="form-control btn-block">
                                    <option <?php if ($defaultValue['serie'] == "Toutes") echo "checked" ?> value="Toutes">Toutes</option>
                                    <?php
                                    for ($i = 0; $i < count($listSerie) ; $i++) { ?>
                                        <option <?php if ($defaultValue['serie'] == $listSerie[$i]['Nom_serie']) echo "checked" ?> value="<?php echo $listSerie[$i]['Nom_serie'] ?>"><?php echo $listSerie[$i]['Nom_serie'] ?></option>
                                    <?php }
                                    ?>

<!--                                    <option value="Celebrations">Celebrations</option>-->
<!--                                    <option value="Zenith Supreme">Zenith Supreme</option>-->
<!--                                    <option value="Evolution Celeste">Evolution Celeste</option>-->
<!--                                    <option value="Epee et bouclier">Epee et bouclier</option>-->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row" style="margin-top: 30px">
                    <div class="col-lg-4 col-lg-offset-4">
                        <input type="submit" class="form-control btn-block" value="Rechercher" style="height: 50px">
                    </div>
                </div>

            </form>
        </div><!-- /.col-lg-6 -->
    </div>

    <div class="row main-label1" style="margin-top: 40px">
        Resultat de votre recherche
    </div>

    <div class="row" style="margin-top: 60px; margin-bottom: 60px">

        <?php

        for ($j = 0; $j < count($resultat); $j++) { ?>
            <a href="modele.php?page=cartes/index&idcarte=<?php echo  getCarte_pokemon_by_id($resultat[$j]['id_carte'],logBd())['id_carte'] ?>">
                <div class="col-lg-3 _center">
                    <img src="../assets/cartes/<?php echo getCarte_pokemon_by_id($resultat[$j]['id_carte'],logBd())['nom_image_pokemon'] ?>" alt="" class="carte-img">
                    <div class="nom-carte"><?php echo getCarte_pokemon_by_id($resultat[$j]['id_carte'],logBd())['Nom_pokemon'] ?></div>
                    <div class="serie-carte"><?php echo $listSeries[getCarte_pokemon_by_id($resultat[$j]['id_carte'],logBd())['id_serie']]['Nom_serie'] ?></div>
                    <div class="prix-carte">Prix: <?php echo getCarte_pokemon_by_id($resultat[$j]['id_carte'],logBd())['prix'] ?></div>
                </div>
            </a>
        <?php }
        ?>

    </div>


</div>
</body>
</html>

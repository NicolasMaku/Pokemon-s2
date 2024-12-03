<?php
//    $solde = getMontant_Total_user(logBd());
//    var_dump($solde);

    $user = getUser_info("nicolas@gmail.com",'nicolas',logBd());
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> wallet </title>
</head>

<body>
<div class="row">
    <div class="row" style="margin-left: -18px">
        <img src="../assets/logo/logo5.png" alt="" style="object-fit: cover" width="100%" class="img1">
    </div>
    <div class="main-label open-text">
        Porte monnaie
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
    <div class="col-md-6">
        <div class="row solde-box">
            <div class="row" style="font-size: 25px">Votre solde:</div>
            <div class="row">
                <span style="font-size: 25px">$</span>
                <span style="font-size: 40px; margin-left: 20px"><?php echo getSold_user($_SESSION['user']['id_user'],logBd())['somme'] ?></span>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="row estim-box" >
            <div class="row" style="font-size: 25px">Estimation de vos cartes Pokemons:</div>
            <div class="row">
                <span style="font-size: 25px">$</span>
<!--                <span style="font-size: 40px; margin-left: 20px">--><?php //echo get_estimation_carte($_SESSION['user']['id_user']) ?><!--</span>-->
                <span style="font-size: 40px; margin-left: 20px"><?php echo get_estimation_carte($user['id_user'],logBd()) ?></span>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-bottom: 80px">
    <div class="row main-label1" style="margin-top: 60px">
        Demande de fond
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="margin-top: 20px">
            <form action="../pages/porteMonnaie/traitement.php" method="post">
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="hidden" name='id_user' value="<?php echo $user['id_user']; ?>">
                    <input type="number" name='montant' class="form-control" aria-label="Amount (to the nearest dollar)" required>
                </div>
                <input type="submit" value="Demander" class="btn bg-primary" style="margin-top: 10px;float: right">
            </form>
        </div>
    </div>


</div>
</body>
</html>
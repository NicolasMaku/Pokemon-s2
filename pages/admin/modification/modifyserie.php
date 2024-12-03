<?php
    $serie = getListe_serie(logBd())[$_GET['id_serie']];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> modifyserie </title>
</head>

<body>
<div class="row" style="margin-top: 90px">
    <div class="col-lg-4">
        <img src="../assets/series/<?php echo $serie['nom_image'] ?>" alt="" width="500">
    </div>

    <div class="col-lg-7 col-lg-offset-1">
        <div class="row" style="font-size: 35px; font-weight: bold;margin-top: 10px; color: white" >
            Modifier serie: Celebrations
        </div>

        <div class="row" style="margin-top: 20px">
            <form action="../pages/admin/modification/modify/modifyprocess.php?id_serie=<?php echo $_GET['id_serie'] ?>" method="POST">
            <div class="col-lg-8">
                <div class="input-group">
                    <span class="input-group-addon">Nom</span>
                    <input type="text" class="form-control" name="nom" aria-label="Amount (to the nearest dollar)" required>
                </div>


                <input type="file" name="image" style="margin-top: 10px; color: white">

                <input type="submit" value="Modifier" class="form-control btn-block" style="margin-top: 10px;float: right">
            </div>
            </form>

            <a href="../pages/admin/modification/supprimer/supprserie.php?id_serie=<?php echo $_GET['id_serie'] ?>"><button>Supprimer</button></a>
        </div>

    </div>
</div>
</body>
</html>
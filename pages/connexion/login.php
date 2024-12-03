<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../assets/css/login.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
</head>
<body>
<div class="_container">
    <!-- INFO: Elements du conteneur violet-->
    <div class="login swipeLeft">
        <img src="../../assets/logo/logo7.jpg" alt="" style="object-fit: cover" width="100%" height="100%">


    </div>


    <!-- TO DO: formulaire Login -->
    <div class="right zoomIn">

        <div class="formLogin">
            <h2>Login pour User et Admin</h2>
            <form action="plogin.php" method="POST">

                <input type="text" class="btn-block margin1 login_input" name="email" placeholder="Adresse e-mail">
                <input type="password" class="btn-block margin1 login_input" name="mdp" placeholder="Mot de passe">
                <input type="submit" class="btn-block margin1 login_submit" value="Se connecter">
            </form>

            <!-- TO DO: Afficher ceci en cas d'erreur de mot de passe -->
            <?php if (isset($_GET['notFound'])) { ?>
                <div class="alert alert-danger" role="alert">
                    Votre e-mail ou mot de passe est incorrect
                </div>
            <?php } ?>

            <p>ou</p>

            <!-- TO DO: lien vers la page incsription -->
            <a href="inscription.php" style="color: #533dcc; text-decoration: underline">Creer un nouveau compte</a>
        </div>
    </div>



    <!-- INFO: Ne pas toucher -->
    <div class="left zoomOut">
        <div class="formLogin" style="margin-top: 18%">
            <form action="" method="POST">
                <input type="text" class="btn-block margin1 login_input" name="nom" placeholder="Nom">
                <input type="text" class="btn-block margin1 login_input" name="email" placeholder="Adresse e-mail">
                <input type="date" class="btn-block margin1 login_input" name="dateNaissance" <?php if (isset($defaultValue)) { ?> value="<?php echo $defaultValue[2] ?>" <?php } ?> placeholder="Date naissance">
                <input type="password" class="btn-block margin1 login_input" name="mdp" placeholder="Mot de passe">
                <input type="text" class="btn-block margin1 login_input" name="parrain" placeholder="parrain">
                <p>Genre</p>
                <div class="input-group btn-block margin1">
                    <input type="radio" id="c1" name="genre" value="homme">
                    <label for="c1">Homme</label>
                    <input type="radio" id="c2" name="genre" value="femme">
                    <label for="c2">Femme</label>
                </div>
                <input type="submit" class="btn-block margin1 login_submit" name="email" value="Creer mon compte">
            </form>

            <p>ou</p>

            <a href="" style="color: #533dcc; text-decoration: underline">Se connecter a votre compte</a>

            <p>ou</p>

            <a href="" style="color: #533dcc; text-decoration: underline">Se connecter a votre compte</a>


        </div>
    </div>
    <!-- INFO: Jusqu'ici -->


</div>

</body>
</html>
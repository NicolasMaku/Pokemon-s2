<?php
    include ("../../inc/data.php");
    include ('../../inc/function.php');
    $classInput = ["email","dateNaissance"];
    if(isset($_SESSION['login'])){
        header("location:../login.php");
        exit();
    }

    if (isset($_GET['erreur'])) {
        $listErreur = explode(',',$_GET['erreur']);
        $defaultValue = explode(',',$_GET['valeur']);
    }


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../assets/css/login.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
</head>
<body>
<div class="_container">
    <!-- TO DO: Element du conteneur violet -->
    <div class="inscription swipeRight">
        <img src="../../assets/logo/logo7.jpg" alt="" style="object-fit: cover" width="100%" height="100%">

    </div>


    <!-- INFO: NE rien changer -->
    <div class="right zoomOut">
        <div class="formLogin">
            <h2>Login pour User et Admin</h2>
            <form action="" method="POST">
                <input type="text" class="btn-block margin1 login_input" name="email" placeholder="Adresse e-mail">
                <input type="password" class="btn-block margin1 login_input" name="email" placeholder="Mot de passe">
                <input type="submit" class="btn-block margin1 login_submit" value="Se connecter">
            </form>
            <p>
                ou
            </p>

            <a href="inscription.php" style="color: #533dcc; text-decoration: underline">Creer un nouveau compte</a>
        </div>
    </div>
    <!-- INFO: Jusqu'ici -->


    <!-- TO DO: Formulaire inscription -->
    <div class="left zoomIn">
        <div class="formLogin" style="margin-top: 18%">
            <form action="pinscription.php" method="POST">
                <input type="text" class="btn-block margin1 login_input" name="nom" <?php if (isset($defaultValue)) { ?> value="<?php echo $defaultValue[0] ?>" <?php } ?> placeholder="Nom">
                <?php if (isset($_GET['erreur']) && among($listErreur,$classInput[0])) { ?>
                    <div class="alert alert-danger" role="alert">
                        Votre e-mail ou mot de passe est incorrect
                    </div>
                <?php } ?>
                <input type="text" class="btn-block margin1 login_input" name="email" <?php if (isset($defaultValue)) { ?> value="<?php echo $defaultValue[1] ?>" <?php } ?> placeholder="Adresse e-mail">
                <?php if (isset($_GET['erreur']) && among($listErreur,$classInput[1])) { ?>
                    <div class="alert alert-danger" role="alert">
                        L'utilisateur doit avoir au moins 12 ans
                    </div>
                <?php } ?>
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



                <!-- TO DO: Lien vers la page de traitement pour inscription -->
                <input type="submit" class="btn-block margin1 login_submit" value="Creer mon compte">
            </form>
            <p>
                ou
            </p>

            <!-- TO DO: lien vers la page login -->
            <a href="login.php" style="color: #533dcc; text-decoration: underline">Se connecter a votre compte</a>
        </div>
    </div>
</div>

</body>
</html>

<?php
    require ('../../inc/function.php');
    if (isAdmin($_POST['email'], $_POST['mdp'], logBd())) {
        $infoUser = getInfo_Admin($_POST['email'], $_POST['mdp'], logBd());
        customSessionStart();
        $_SESSION['user'] = $infoUser;
        session_write_close();
        header('location:../../template/modele.php?page=accueil/index');
        exit();
    }
    if (logIn($_POST['email'], $_POST['mdp'], logBd())) {
        $infoUser = getUser_info($_POST['email'], $_POST['mdp'], logBd());
        customSessionStart();
        $_SESSION['user'] = $infoUser;
        session_write_close();
        header('location:../../template/modele.php?page=accueil/index');
        exit();
    }

//    echo logIn($_POST['email'],$_POST['mdp'],logBd());
//    echo $_POST['mdp'];

    header('location:login.php?notFound=1');
?>
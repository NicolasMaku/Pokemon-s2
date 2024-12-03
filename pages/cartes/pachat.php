<?php
    require ('../../inc/function.php');
    customSessionStart();
    $user = $_SESSION['user'];
    $idCarte = $_GET['id_carte'];
    acheterCarte($user['id_user'], $idCarte);

    session_write_close();
    header('location:../../template/modele.php?page=cartes/index&&idcarte=' .$idCarte);
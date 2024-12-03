<?php
    include ('../../inc/function.php');
    $erreur = [];
    $donnee = [];
    if (!checker_serie(logBd(),$_POST['serie'])) {
        $erreur[] = "serie";
    }
    if (!is_numeric($_POST['prixMin']) || !is_numeric($_POST['prixMax'] || $_POST['prixMin'] > $_POST['prixMax']) ) {
        $erreur[] = "prix";
    }
    if (count($erreur) > 0) {
        $listErreur = implode(',',$erreur);
        header('location:login.php?erreur='.$listErreur);
    }

    $donnee[] = $_POST['nom'];
    $donnee[] = $_POST['serie'];
    $donnee[] = $_POST['prixMin'];
    $donnee[] = $_POST['prixMax'];
    $listDonnee = implode(',',$donnee);
    header('location:../../template/modele.php?page=recherche/index&&donnee='.$listDonnee);
?>

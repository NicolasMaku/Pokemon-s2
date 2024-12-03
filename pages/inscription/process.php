<?php
    include ('../../inc/elementChecker.php');
    $erreur = [];
    if (!is_email_valid($_POST['email']) || checker_vide($_POST['email']))
    {
        $erreur[] = "email";
    }
    if (checker_date($_POST['dateNaissance']) || checker_vide($_POST['dateNaissance'])) {
        $erreur[] = "dateNaissance";
    }
    if (!checkAge($_POST['dateNaissance'])) {
        $erreur[] = "age";
        $erreur[] = "dateNaissance";
    }
    if (checker_genre($_POST['genre']) || checker_vide($_POST['genre'])) {
        $erreur[] = "genre";
    }
    if (count($erreur) > 0) {
        $listErreur = implode(',',$erreur);
        echo $listErreur;
        header('location:inscription.php?erreur='.$listErreur);
    }

    inscription($_POST['nom'],$_POST['dateNaissance'],$_POST['genre'],$_POST['email'],$_POST['password'],logBd());
    header('location:../connexion.php');
?>
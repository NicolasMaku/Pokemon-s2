<?php
    include ('../../inc/function.php');
    $valeur = [];
    $valeur[] = $_POST['nom'];
    $valeur[] = $_POST['email'];
    $valeur[] = $_POST['dateNaissance'];
    $valeur[] = $_POST['genre'];

    $erreur = [];
    if (!is_email_valid($_POST['email']) || checker_vide($_POST['email']))
    {
        $erreur[] = "email";
    }
    if (!checker_date($_POST['dateNaissance']) || checker_vide($_POST['dateNaissance'])) {
        $erreur[] = "dateNaissance";
    }
    if (!checkAge($_POST['dateNaissance'])) {
        $erreur[] = "age";
        $erreur[] = "dateNaissance";
    }
    if (checker_genre($_POST['genre']) || checker_vide($_POST['genre'])) {
        $erreur[] = "genre";
    }
    if(empty($_POST['mdp'])){
        $erreur[] = "mdp";
    }

    if (!empty($_POST['parrain'])) {
        if (exist(logBd(), $_POST['parrain'])) {
            $erreur[] = "parrain";
        }
    }

    if (count($erreur) > 0) {
        $listErreur = implode(',',$erreur);
        $listvalue = implode(',',$valeur);
        echo $listErreur;
        header('location:inscription.php?erreur='.$listErreur.'&&valeur='.$listvalue);
    }

//    if(!empty($_POST['parrain'])){
//        if(ex)
//    }

    inscription($_POST['nom'],$_POST['dateNaissance'],$_POST['genre'],$_POST['email'],$_POST['mdp'],logBd());
    $user = getUser_info($_POST['email'],$_POST['mdp'],logBd());
    $aleatoire5 = getPokemon_aleatoire(logBd());
    var_dump($aleatoire5);
    for ($i = 0; $i < count($aleatoire5) ; $i++) {
        $sql = "INSERT INTO user_liste_cartes VALUES(%d,%d,1,NOW())";
        $sql = sprintf($sql,$aleatoire5[$i]['id_carte'],$user['id_user']);
        mysqli_query(logBd(),$sql);
    }
    header('location:login.php');

?>
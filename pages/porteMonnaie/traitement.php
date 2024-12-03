<?php
    session_start();
    include ('../../inc/function.php');

    if (isset($_POST['montant']) && is_numeric($_POST['montant'])) {
        $montant = $_POST['montant'];
        $id = $_POST['id_user'];
        add_money_chart($montant,$id,logBd());

        header('Location: ../../template/modele.php?page=porteMonnaie/index');
    }
?>
<?php
    include ('../../../../inc/function.php');
    getFile('image','../../../assets/series/');
    modify_serie($_POST['id_serie'],$_POST['nom'],basename($_FILES['image']['name']),logBd());
    echo basename($_FILES['image']['name']);
    echo $_POST['id_serie'];
//    header('location:../../../../template/modeleadmin.php?page=modification/serie');
?>
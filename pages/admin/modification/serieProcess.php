<?php
    include ('../../../inc/function.php');
    getFile('image','../../../assets/series/');
    add_new_serie($_POST['nom'],basename($_FILES['image']['name']),logBd());
    header('location:../../../template/modeleadmin.php?page=modification/serie');
?>
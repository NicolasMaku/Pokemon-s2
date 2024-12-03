<?php
	include('../../../inc/function.php');
    $id = $_GET['id'];
    $nomfile = $_FILES['file'];
    $nom = $_POST['_serie'];
    modify_serie($id,$nom,$_FILES['file']['tmp_name'],logBd());

    header('Location:pages');
?>
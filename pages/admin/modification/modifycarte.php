<?php
	    session_start();
		include('../../../inc/function.php');

		$i = $_GET['id'];
		$info_admin = $_SESSION['user'];
		$liste_stock = getList_stock_carte(logBd());
		$liste_serie = getListe_serie(logBd());
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> carte </title>
</head>

<style>

</style>

<body>
<div class="row" style="margin-top: 90px">
	<div class="col-lg-4">
		<img src="../assets/cartes/15.jpg" alt="">
	</div>

	<div class="col-lg-7 col-lg-offset-1">
		<div class="row" style="font-size: 35px; font-weight: bold;margin-top: 10px; color: white" >
			Modifier Lunala
		</div>

		<div class="row" style="margin-top: 20px">
		<form action="traitement.php?id= <?php echo $liste_stock[$i]['id_carte']; ?>" method="post">
			<div class="col-lg-8">
				<div class="row" style="margin-top: 10px">
					<span style="color: white">Series:</span>
					<select name="nom_serie" id="">
					<?php for($i = 0; $i < count($liste_serie) ; $i++){?>
						<option value=""><?php echo $liste_serie[$i]['Nom_serie']; ?></option>
					<?php } ?>
					</select>
				</div>
				<input type="file" name="file" style="margin-top: 10px; color: white">

				<input type="submit" value="Modifier" class="form-control btn-block" style="margin-top: 10px;float: right">
			</div>
		</form>

		</div>
		<div class="row" style="margin-top: 20px">
			<div class="col-md-8">
				<a href="../modification/delete.php?id= <?php echo $liste_stock[$i]['id_carte']; ?>"><button class="btn btn-block" style="color: red">Supprimer</button></a>
			</div>
		</div>


	</div>
</div>
</body>
</html>
<?php
require_once('bdn.php');
require_once('function.php');
if ($_GET['colone']){
	$colone = $_GET['colone'];
	$affichage = province_where($colone);
	var_dump($colone);
}
 if (isset($_GET['num'])){
	$id1 = $_GET['num'];
	delete($id1,$id2,$id3);
 }


?>
<!DOCTYPE html>
<html>
<head>
	<title>province</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="tout.css">
</head>
<body>
	<div class="text-center"><h2 style="font-family:arial-black; color:white;">Ajouter de Province</h2></div>
	<div class="row premier">
		<div class="col-md-3 acceuil" style="background-color:rgb(41 ,183 , 207);">
		</div>
		<div class="col-md-8">
				<div class="row fahatelo" style="border:1px solid white; box-shadow:1px 1px 50px rgba(1 ,1 ,1 ,0.5)">
					<form action="update.php" method="POST">
						<p>
							<input type="hidden" name="id" value="<?= $affichage['id']?>"><br>
							<label for="nom_pro">Nom de province:</label><input type="text" id="nom_pro" name="nom_pro" value="<?= $affichage['nom_pro']?>"><br>
							<label for="nom">Nom de mère:</label> <input type="text" id="nom" name="nom" value="<?= $affichage['nom']?>"><br>
							<label for="prenom">prenom de prènom:</label> <input type="text" id="prenom" name="prenom" value="<?= $affichage['prenom']?>"><br>
							<label for="telephone">telephone:</label> <input type="text" id="telephone" name="telephone" value="<?= $affichage['telephone']?>"><br>
							<button class="btn btn-info" type="submit" name="Enregistre">Enregistre</button><button class="btn btn-danger"><a href="index2.php">Sortie</a></button>
						</p>
					</form>		
				</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</body>
</html>

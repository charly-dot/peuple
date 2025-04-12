

	
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
					<form action="insertion.php" method="POST">
						<p>
							<label for="nom_pro">Nom de province:</label><input type="text" id="nom_pro" name="nom_pro"><br>
							<label for="nom">Nom de mère:</label> <input type="text" id="nom" name="nom"><br>
							<label for="prenom">prenom de prènom:</label> <input type="text" id="prenom" name="prenom"><br>
							<label for="telephone">telephone:</label> <input type="text" id="telephone" name="telephone"><br>
							<button class="btn btn-info" type="submit" name="Enregistre">Enregistre</button><button class="btn btn-danger"><a href="Acceuil.php">Sortie</a></button>
						</p>
					</form>		
				</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</body>
</html>

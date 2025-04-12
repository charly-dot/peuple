
<?php
require('bdn.php');
require('function.php');
$upd3 = $_GET['Insertion_utilisateur'];

// var_dump($commune);
if(isset($upd3)){
	
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Region</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="tout.css">
	<style></style>
</head>
<body>
	<div class="text-center"><h2 style="font-family:arial-black; color:white;">Ajouter de Commune</h2></div>
	<div class="row premier">
		<div class="col-md-3 acceuil" style="background-color:rgb(41 ,183 , 207);">
		</div>
		<div class="col-md-8">
				<div class="row fahatelo" style="border:1px solid white; box-shadow:1px 1px 50px rgba(1 ,1 ,1 ,0.5)">
					<form action="update.php" method="POST">
						<p>	<?php if($upd3){ ?>						
								<input type="hidden" id="id" name="id" value="<?= $detail3['id']; ?>"><br>
								<label for="nom_comm">Nom de votre commune:</label> <input type="text" id="nom_comm" name="nom_comm" value="<?= $detail3['nom_comm']; ?>"><br>
								<label for="nom">Nom:</label> <input type="text" id="nom" name="nom" value="<?= $detail3['nom'];?>"><br>
								<label for="Prenom">Prenom:</label> <input type="text" id="Prenom" name="prenom" value="<?php echo $detail3['prenom']; ?>"><br>
								<label for="Telephone">Telephone:</label> <input type="number" id="Telephone" name="telephone" value="<?=  $detail3['telephone']; ?>"><br>
								<input type="hidden" id="id" name="id" value="<?= $detail3['id']; ?>"><br>
								<button class="btn btn-info"  type="submit" name="upd4">Enregistre</button><button class="btn btn-danger"><a href="commune.php">Sortie</a></button>
							<?php }else{ ?>
								<label for="nom_province">Votre province:</label> 
								<select name="nom_pro" id="province">								
										<?php foreach($province as $detail55): ?>
											<option value="<?= $detail55['id']?>"><?= $detail55['nom_pro']?><br></option>
										<?php endforeach; ?>								
								</select>
								<label for="nom_reg">Votre region:</label> 
								<select name="nom_reg" id="nom_reg">								
										<?php foreach($region as $detail): ?>
											<option value="<?= $detail['nom_reg']?>"><?= $detail['nom_reg']?><br></option>
										<?php endforeach; ?>								
								</select><br>
								<label for="nom_comm">Nom de votre commune:</label> <input type="text" id="nom_comm" name="nom_comm"><br>
								<label for="nom">Nom:</label> <input type="text" id="nom" name="nom"><br>
								<label for="Prenom">Prenom:<x/label> <input type="text" id="Prenom" name="prenom"><br>
								<label for="Telephone">Telephone:</label> <input type="number" id="Telephone" name="telephone"><br>
								<input type="hidden" id="id" name="id"><br>
								<button class="btn btn-info"  type="submit" name="ins2">Enregistre</button><button class="btn btn-danger"><a href="commune.php">Sortie</a></button>
							<?php };?>
						</p>
					</form>		
				</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</body>
</html>

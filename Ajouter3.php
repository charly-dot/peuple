
<?php
require('bdn.php');
require_once('function.php');
$detail = province();
$detail1 = region3();
$affichage = commune();
if (isset($_GET['id3'])){
	$liste = $_GET['id3'];
	$region = $connexion->prepare('SELECT * FROM Fokotany WHERE id = :id3');
	$region->execute([
	"id3"=>$liste,
]);
$detail2 = $region->fetch();
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Region</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="tout.css">
</head>
<body>
	
	<div class="container voalohany">
		<div class="row">
			<form action="update.php" method="post">
				<div style="margin-left:20%;">
				<?php if(isset($liste)){?>
					<h2 style="font-family:arial-black; color:white;">modification</h2>
					<div class="col-md-2"></div>
					<div class="col-md-8">
					<input type="hidden" name="id" id="id" value="<?= $detail2['id']?>"><br>
						<label for="nom_fkt">Nom fokotany</label>
						<input type="text" name="nom_fkt" id="nom_fkt" value="<?= $detail2['nom_fkt']?>"><br>
						<label for="nom">Nom:</label>
						<input type="text" name="nom" id="nom" value="<?= $detail2['nom']?>"><br>
						<label for="prenom">Prenom:</label>
						<input type="text" name="prenom" id="prenom" value="<?= $detail2['prenom']?>"><br>
						<label for="telephone">Telephone:</label>
						<input type="text" id="telephone" name="telephone" value="<?= $detail2['telephone']?>"><br>
						<button class="btn btn-info" type="submit" name="upd5">Enregistre</button><button class="btn btn-danger"><a href="index.php">Sortie</a></button>
					</div>
					<div class="col-md-2"></div>
				<?php }else{?>
					<h2 style="font-family:arial-black; color:white;">Ajouter de fotokotany</h2>
					<label for="nom_province">Votre province:</label> 
					<select name="nom_pro" id="province">								
						<?php foreach($detail as $detail): ?>
							<option value="<?= $detail['id']?>"><?= $detail['nom_pro']?><br></option>
						<?php endforeach; ?>								
					</select><br>
					<label for="nom_reg">Votre region:</label> 
						<select name="nom_reg" id="region">								
							<?php foreach($detail1 as $detail): ?>
								<option value="<?= $detail['nom_reg']?>"><?= $detail['nom_reg']?><br></option>
							<?php endforeach; ?>
						</select><br>
					<label for="nom_comm">Votre commune:</label> 
						<select name="nom_comm" id="nom_comm">								
							<?php foreach($affichage as $detail): ?>
								<option value="<?= $detail['id']?>"><?= $detail['nom_comm']?><br></option>
							<?php endforeach; ?>										
						</select>
				</div><br>
				<div class="col-md-2"></div>
				<div class="col-md-8">
						<label for="nom_fkt">Nom fokotany</label>
						<input type="text" name="nom_fkt" id="nom_fkt"><br>
						<label for="nom">Nom:</label>
						<input type="text" name="nom" id="nom"><br>
						<label for="prenom">Prenom:</label>
						<input type="text" name="prenom" id="prenom"><br>
						<label for="telephone">Telephone:</label>
						<input type="text" id="telephone" name="telephone"><br>
					<button class="btn btn-info" type="submit" name="ist3">Enregistre</button><button class="btn btn-danger"><a href="Fokotany.php">Sortie</a></button>
				</div>
				<div class="col-md-2"></div>
				<?php }; ?>
					
			</form>
		</div>
	</div>
</body>
</html>

<?php
require('bdn.php');
require_once('function.php');

if (isset($_GET['id2'])){
	$id2 = $_GET['id2'];	
	$xc = select($id2);

}
$province = province();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Region</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="tout.css">
	<style>.fahatelo{padding:5%;} button{margin-top: 3%;} input{height:30px; width:50%;} option{height:30px; width:50%;}</style>
</head>
<body>
	<div class="text-center"><h2 style="font-family:arial-black; color:white;">Ajouter de Region</h2></div>
	<div class="row premier">
		<div class="col-md-3 acceuil" style="background-color:rgb(41 ,183 , 207);">
		</div>
		<div class="col-md-8">
				<div class="row fahatelo" style="border:1px solid white; box-shadow:1px 1px 50px rgba(1 ,1 ,1 ,0.5)">
					<form action="update.php" method="POST">
						<p>
							<?php if(isset($id2)){ ?>
								<input type="hidden" id="id" name="id" value=" <?= $xc['id']; ?>"><br>	
								<label for="nom_reg">Nom de region:</label> <input type="text" id="nom_reg" name="nom_reg" value=" <?= $xc['nom_reg']; ?>"><br>
								<label for="nom">Nom:</label> <input type="text" id="nom" name="nom" value="<?= $xc['nom']?>"><br>
								<label for="Prenom">Prenom:</label> <input type="text" id="Prenom" name="prenom" value="<?= $xc['prenom']; ?>"><br>
								<label for="telephone">telephone:</label> <input type="text" id="telephone" name="telephone" value="<?= $xc['telephone']?>"><br>
								<button class="btn btn-info" name="upd2">Enregistre</button><button class="btn btn-danger"><a href="region.php">Sortie</a></button>
							<?php }else{ ?>
								 <label for="province">votre province</label> 
								<select name="nom_pro" id="province">								
										<?php foreach($province as $detail55): ?>
											<option value="<?= $detail55['id']?>"><?= $detail55['nom_pro']?><br></option>
										<?php endforeach; ?>								
								</select><br>
								<label for="nom_reg">Nom de region:</label> <input type="text" id="nom_reg" name="nom_reg"><br>
								<label for="nom">Nom:</label> <input type="text" id="nom" name="nom"><br>
								<label for="Prenom">Prenom:</label> <input type="text" id="Prenom" name="prenom"><br>
								<label for="telephone">telephone:</label> <input type="text" id="telephone" name="telephone"><br>
								<button class="btn btn-info" name="ins1" >Enregistre</button><button class="btn btn-danger"><a href="region.php">Sortie</a></button>
								<?php }; ?>									
						</p>
					</form>		
				</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</body>
</html>

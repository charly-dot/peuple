<?php
require('bdn.php');
//province
require_once('function.php');
$liste1 = province();
$total = 0;



?> 
<!DOCTYPE html>
<html>
<head>
	<title>province</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="tout.css">
	<style>

	</style>
</head>
<body>
	<div class="text-center"><h2 style="font-family:arial-black; color:white;">Province</h2></div>
	<div class="row premier">
		<div class="col-md-2 acceuil">
			<ul>
				<li><a href="Acceuil.php">Province</a></li>
				<li><a href="Region.php">Region</a></li>
				<li><a href="commune.php">Commune</a></li>
				<li><a href="Fokotany.php">Fokotany</a></li>
			</ul>
		</div>
		<div class="col-md-9">
				<form action="envoyer.php" method="POST" class="form-inline">
					<div class="row fahatelo">
						<table>
							<thead>
								<tr>
									<th>id</th>
									<th>Province</th>
									<th>Nom</th>
									<th>Prenom</th>
									<th>telephone</th>			
									<th>  M/S  </th>	
									<th>Region</th>						
								</tr>
							</thead>
							<tbody>
								<?php foreach($liste1 as $liste1): ?>
									<?php $total++ ?>
									<tr><td><?= $liste1['id'] ?></td>
										<td><?= $liste1['nom_pro'] ?></td>
										<td><?= $liste1['nom'] ?></td>
										<td><?= $liste1['prenom'] ?></td>
										<td><?= $liste1['telephone'] ?></td>
										<td><input type="radio" value="<?= $liste1['nom_pro'] ?>" name="voalohany"></td>
										<td>
											<button class="btn btn-success" type="submit" name="modifier"><a href="envoyer.php?colone=<?= $liste1['nom_pro'] ?>">update</a></button>		
											<button class="btn btn-info"><a href="Region.php?id_column=<?=$liste1['id']?>">detail</a></button>
											<button class="btn btn-danger" type="submit" name="delete1"><a href="delete.php?nom=<?= $liste1['id']?>">delete</a></button>	
										</td>
										
									</tr>
								<?php endforeach;?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									
									<td><div class="total">total:<?php echo $total; ?></div></td>
								</tr>
							</tbody>
						</table>
						<footer>
							<p><input type="text" class="lava form-control" placeholder="recherche"><button id="tiko" class="btn btn-primary" name="">Recherche</button><button class="btn btn-primary"><a href="Ajouter.php">ajouter</a></button>
							<a href="index2.php"><i class="fa fa-home" style="margin-left:10px;"></i></a></p>		
						</footer>
					</div>
				</form>
		</div>
		<div class="col-md-1"></div>
	</div>
</body>
</html>




		
<?php
require('bdn.php');
if(isset($_GET['detail'])){
$affichage = $_GET['detail'];
}

$select = $connexion->prepare('SELECT * FROM commune');
$select->execute();

if (isset($affichage)){
	$affichage_reg1 = $connexion->prepare("SELECT * FROM commune WHERE id = :x");
	$affichage_reg1->execute([
		"x"=>$affichage,
	]);
};
$total = 0;

if(isset($affichage)){	
	$tous = $affichage_reg1->fetchAll();
}else{
	$tous = $select->fetchAll();
};
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
	<div class="text-center"><h2 style="font-family:arial-black; color:white;">Commune</h2></div>
	<div class="row premier">
		<div class="col-md-2 acceuil" style="background-color:rgb(41 ,183 , 207);">
			<ul>
				<li><a href="Acceuil.php">Province</a></li>
				<li><a href="Region.php">Region</a></li>
				<li><a href="commune.php">Commune</a></li>
				<li><a href="Fokotany.php">Fokotany</a></li>
		</div>
		<div class="col-md-9">
				<div class="row fahatelo">
					<table>
						<thead>
							<tr>
								<th>Commune</th>
								<th>Responsable</th>
								<th>M/S</th>
								<th>Fokotany</th>
							</tr>
							
						</thead>
						<tbody>
							<?php foreach($tous as $liste): ?>
								<tr>
								<?php echo $total++;?>
									<td><?= $liste['nom_comm']?></td>
									<td><?= $liste['nom']?></td>
									<td><input type="radio" name="voalohany"></td>
									<td><input type="radio" name="voalohany"></td>

									<td>		
									<button class="btn btn-success"><a href="Ajouter2.php?update3=<?= $liste['nom_comm']?>">Update</a></button>
										<button class="btn btn-info"><a href="Fokotany.php?detail=<?= $liste['nom_comm']?>">Detail</a</button>
										<button class="btn btn-danger"><a href="function2.php?delete3=<?= $liste['id']?>">Delete</a></button>
									</td>
								</tr>
							<?php endforeach; ?>
							<tr>
								<td></td>
								<td></td>
								<td><div class="total">total:<?php echo $total;?></div></td>
							</tr>
						</tbody>
					</table>
					<form action="liste_province" method="POST">
						<form class="form-control">
							<p><input type="text" class="search-query lava"><button class="btn btn-primary" type="submit">Recherche</button><button class="btn btn-primary"><a href="Ajouter2.php">ajouter</a></button><button class="btn btn-primary"><a href="Region.php">retout</a></button><a href="index2.php"><i class="fa fa-home" style="margin-left:10px;"></i></a></p>
						</form>	
					</form>		
				</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</body>
</html>




		
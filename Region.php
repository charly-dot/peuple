
<?php
require('bdn.php');
if (isset($_GET['id_column'])) {
	$verification = $_GET['id_column'];
}
$total = 0;
//region

$affichage_reg = $connexion->prepare('SELECT * FROM region');
$affichage_reg->execute();
if (isset($verification)){
	$affichage_reg1 = $connexion->prepare("SELECT * FROM region WHERE nom_pro = :x");
	$affichage_reg1->execute([
		"x"=>$verification,
	]);
}

//existe
if(isset($verification)){
	$tout = $affichage_reg1->fetchAll();
}else{
	$tout = $affichage_reg->fetchAll();
};
/*<?= $affichage_reg1['nom_pro'] ?>*/





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
		<div class="text-center"><h2 style="font-family:arial-black; color:white;">Region</h2></div>

	<div class="row premier">
		<div class="col-md-2 acceuil" style="background-color:rgb(41 ,183 , 207);">
			<ul>
				<li><a href="Acceuil.php">Province</a></li>
				<li><a href="Region.php">Region</a></li>
				<li><a href="commune.php">Commune</a></li>
				<li><a href="Fokotany.php">Fokotany</a></li>
			</ul>   
		</div>
		<div class="col-md-9">
				<div class="row fahatelo" style="border:1px solid white; box-shadow:1px 1px 50px rgba(1 ,1 ,1 ,0.5)">
					<table>
						<thead>
							<tr>
								<th>Region</th>
								<th>Responsable</th>
								<th>M/S</th>
								<th>Commune</th>
							</tr>
							
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
							</tr>

							<?php foreach($tout as $tout): ?>
								<tr>
									<?php $total++; ?>
									<td><?= $tout['nom_reg'] ?></td>
									<td><?= $tout['nom'] ?></td>
									<td><input type="radio" name="voalohany"></td>
									<td>
										<button class="btn btn-success"><a href="Ajouter_Copie.php?id2=<?= $tout['id']?>">update</a></button>
										<button class="btn btn-info"><a href="commune.php?detail=<?= $tout['id']?>">Detail</a></button>
										<button class="btn btn-danger"><a href="delete.php?dlt2=<?= $tout['id']?>">delete</a></button>
									</td>
								</tr>	
							<?php endforeach; ?>
							
							<tr>
								<td><div class='total'>total:<?php echo $total;?></div></td>
							</tr>
						</tbody>
					</table>
					<form action="liste_province" method="POST" class="form-inline">
						<form class="form-search">
							<p><input type="text" class="form-control lava"><button class="btn btn-primary" type="submit">Recherche</button><button class="btn btn-primary"><a href="Ajouter_Copie.php">ajouter</a></button><button class="btn-primary btn"><a href="Acceuil.php">retout</a></button></button><a href="index2.php"><i class="fa fa-home" style="margin-left:10px;"></i></a></p>
						</form>	
					</form>		
				</div>

		</div>
		<div class="col-md-1"></div>
	</div>
</body>
</html>




		
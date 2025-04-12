<?php
require('bdn.php');
$total = 0;
if (isset($_GET['detail'])){
	$affichage = $_GET['detail'];
};
if (isset($affichage)){
	$affichage_fkt = $connexion->prepare("SELECT * FROM fokotany WHERE nom_comm = :x");
	$affichage_fkt->execute([
		"x"=>$affichage,
	]);
};
$select = $connexion->prepare('SELECT * FROM fokotany');
$select->execute();
if(isset($affichage)){	
	$tous = $affichage_fkt->fetchAll();
}else{
	$tous = $select->fetchAll();
};
?>


<!DOCTYPE html>
<html>
<head>
	<title>Fokotany</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="tout.css">
</head>
<body>
	<div class="text-center"><h2 style="font-family:arial-black; color:white;">Fokotany</h2></div>
	<div class="row premier">
		<div class="col-md-2">
			<ul>
				<li><a href="Acceuil.php">Province</a></li>
				<li><a href="Region.php">Region</a></li>
				<li><a href="commune.php">Commune</a></li>
				<li><a href="Fokotany.php">Fokotany</a></li>
				
			</ul>   
		</div>
		<div class="col-md-9">
				<div class="row fahatelo">
					<table>
						<thead>
							<tr>
								<th>Fokotany</th>
								<th>nom</th>
								<th>prenom </th>
								<th>Telephone</th>
								<th>maison</th>
							</tr>
						
						</thead>
						<tbody>
							<?php foreach($tous as $list): ?>
								<tr>
									<?php $total++ ;?>
									<td><?= $list['nom_fkt'] ?></td>
									<td><?= $list['nom'] ?></td>
									<td><?= $list['prenom'] ?></td>
									<td><?= $list['telephone'] ?></td>
									<td>
										<button class="btn btn-success"><a href="Ajouter3.php?id3=<?= $list['id']; ?>">update</a></button>
										<button class="btn btn-info"><a href="address.php?detail=<?= $list['id']; ?>">Detail</a></button>
										<button class="btn btn-danger"><a href="delete.php?dlt4=<?= $list['id']; ?>">delete</a></button>
									</td>
								</tr>
							<?php endforeach; ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td class="total">le total sont :<?php echo $total;?></td>
								</tr>
						
						</tbody>
					</table>
					<form action="liste_province" method="POST">
						<form class="form-search">
							<p><input type="text" class="search-query lava"><button class="btn btn-primary" type="submit">Recherche</button><button class="btn btn-primary"><a href="Ajouter3.php">ajouter</a></button><a href="index.php"><button class="btn btn-danger"><a href="commune.php">retout</a></button><a href="home.php"><i class="fa fa-home" style="margin-left:10px;"></i></a></p>
						</form>	
					</form>		
				</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</body>
</html>




		
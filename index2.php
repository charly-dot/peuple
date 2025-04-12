<?php
require('bdn.php');
require('function.php');
//province
$liste1 = province();
$total_liste1 = 0;
//region
$liste2 = region3();
$total_liste2 = 0;
//district
$affichage_reg = $connexion->prepare('SELECT * FROM district');
$affichage_reg->execute();
$liste3 = $affichage_reg->fetchAll();
$total_liste3 = 0;

$affichage_fkt = $connexion->prepare('SELECT * FROM fokotany');
$affichage_fkt->execute();
$liste4 = $affichage_fkt->fetchAll();
$total_liste4 = 0;
?>
<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="tout.css">
</head>
<body>
<div class="row">
		<div class="col-md-10"></div>
		<div class="col-md-2">
			<button class="btn btn-info"><a href="index.php">deconnect</a></button>
		</div>
	</div>
	<div class="text-center"><h2 style="font-family:arial-black; color:white;">Home</h2></div>
	<div class="row premier">
		<div class="col-md-3" style="background-color:rgb(41 ,183 , 207);">
			<ul>
			<li><a href="index.php">Home</a></li>
				<li><a href="Acceuil.php">Acceuil</a></li>
				<li><a href="Modification.html">Notification</a></li>
				<li><a href="chois.html">Ajouter</a></li>
			</ul>
		</div>
		<div class="col-md-8">
				<div class="row fahatelo" style="border:1px solid white; box-shadow:1px 1px 50px rgba(1 ,1 ,1 ,0.5)">
					<table>
						<thead>
							<tr>
								<th>Province</th>
								<th>Region</th>
								<th>Distrique</th>
								<th>Fkt</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php foreach($liste1 as $liste1): ?><?= $liste1['nom_pro']; ?><?php $total_liste1++?><br><?php endforeach; ?></td>
								<td><?php foreach($liste2 as $liste2): ?><?= $liste2['nom_reg']  ?> <?php $total_liste2++?><br><?php endforeach; ?></td>
								<td><?php foreach($liste3 as $liste3):?><?= $liste3['nom_dist']?> <?php $total_liste3++?><br><?php endforeach; ?></td>
								<td><?php foreach($liste4 as $liste4):?><?= $liste4['nom_fkt']?> <?php $total_liste4++?><br><?php endforeach; ?></td>
							</tr>
							<tr>
								<td><?php echo "total le province =".' ' . $total_liste1; ?></td>
								<td><?php echo "total le region =".' ' .$total_liste2; ?></td>
								<td><?php echo "total le distrique =".' ' .$total_liste3; ?></td>
								<td><?php echo "total le fokotany =".' ' .$total_liste4; ?></td>
							</tr>
						</tbody>
					</table>
					<form action="liste_province" method="POST">
						<form class="form-control">
							<p><input type="text" class="search-query"><button class="btn btn-primary" type="submit">Recherche</button><button class="btn btn-primary"><a href="chois.html">ajouter</a></button><button class="btn btn-success"><a href="">modifier</a></button><button class="btn btn-danger"><a href="">supprimer</a></button></p>
						</form>	
					</form>		
				</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</body>
</html>




		
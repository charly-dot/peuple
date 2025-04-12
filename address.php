<?php
require('bdn.php');
if (isset($_GET['detail'])) {
	$verification = $_GET['detail'];
    $total = 0;
}

//region

if (isset($verification)) {
	# code...
	$affichage_reg1 = $connexion->prepare("SELECT * FROM maison WHERE nom_fkt = :x");
	$affichage_reg1->execute([
		"x"=>$verification,
	]);
    $tout = $affichage_reg1->fetchAll();
}
//CREATE TABLE 176ter(id int null, adress varchar(40), telephone int(20)); ce le ionscriptiondes maison
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="2em.css">
    <title>address</title>
</head>
<body>
    <h1>tout les address existe</h1>
<div class="container">
    <div class="row bg-danger bordera">
        <table>
            <thead>
                <tr>
                    <th>père</th>
                    <th>Address</th>
                    <th>Telephone</th>
                    <th>Habitants</th>
                </tr>
            </thead>
            <form action="Ajouter4.php" method="POST"></form>
                <tbody>
                    <?php foreach($tout as $liste): ?>
                        <tr>
                            <td><?=  $liste['nom'] ?> <?=  $liste['prenom'] ?></td>
                            <td><?=  $liste['adress']?></td>
                            <td><?=  $liste['telephone']?></td>                      
                            <td>
                                <button class="btn btn-success"><a href="Ajouter4.php?num3=<?=  $liste['id'] ?>">update</a></button>
								<button class="btn btn-info"><a href="habitant.php?colone=<?=  $liste['id'] ?>">Detail</a></button>
								<button class="btn btn-danger"><a href="">delete</a></button>
                            </td>
                        </tr>
                        <?php $total++; ?>
                        
                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="total">total:<?php echo $total; ?></td>
                    </tr>
                </tbody>
        </table>
				<p><input type="text" class="search-query lava"><button class="btn btn-primary" type="submit">Recherche</button><button class="btn btn-primary"><a href="Ajouter4.php">ajouter</a></button><a href="index2.php"><button class=" btn btn-danger"><a href="fokotany.php">retout</a></button><i class="fa fa-home" style="margin-left:10px;"></i></a></p>
		</form>
    </div>
</div>
</body>
</html>
<?php
require('bdn.php');

$fokotany = $connexion->prepare('SELECT * FROM fokotany');
$fokotany->execute();
$detail3 = $fokotany->fetchAll();

$fokotany = $connexion->prepare('SELECT * FROM maison');
$fokotany->execute();
$detail4 = $fokotany->fetchAll();
//CREATE TABLE habitant(id int, nom varchar(155), prenom varchar(155), date_de_naissaince date, lieu_de_naissance varchar(155), CIN int(50), genre varcha
//r(30), adress varchar(200), nom_fkt varchar(155), telephone int null);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter d'un habitant</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="tout.css">
</head>
<body>
    <div class="container">
        <h1>ajouter d'un address</h1>
        <div class="row" style="padding:5%;">
            <div></div>
            <div class="col-md-2"></div>
            <form action="confirmation.php" method="POST" class="form-group">
                <div class="col-md-8">
                <div class="row">
                <label for="nom_fkt">Votre fokotany:</label> <select name="nom_fkt" id="nom_fkt">								
						<?php foreach($detail3 as $detail): ?>
							<option value="<?= $detail['nom_fkt']?>"><?= $detail['nom_fkt']?><br></option>
						<?php endforeach; ?>								
					</select>
					<label for="adress">address</label> <select name="adress" id="adress">								
						<?php foreach($detail4 as $detail): ?>
							<option value="<?= $detail['adress']?>"><?= $detail['adress']?><br></option>
						<?php endforeach; ?>								
					</select><br>
                    <label for="nom" id="nom">nom :</label><input type="text" id="nom" name="nom"><br>
                    <label for="prenom" id="prenom">prenom :</label><input type="text" id="prenom" name="prenom"><br>
                    <label for="date_de_naissance" id="date_de_naissance">date de naissance :</label><input type="date" id="date_de_naissance" name="date_de_naissaince"><br>
                    <label for="lieu_de_naissance" id="lieu_de_naissance">lieu de naissance :</label><input type="text" id="lieu_de_naissance" name="lieu_de_naissance"><br>
                    <label for="CIN" id="CIN">CIN :</label><input type="number" id="CIN" name="CIN"><br>
                    <label for="telephone" id="telephone">telephone :</label><input type="tel" id="telephone" name="telephone"><br>
                    <label for="genre" id="genre">homme</label><input type="radio" value="homme" name="genre"><label for="femme" id="femme">femme</label><input type="radio" value="femme" name="genre"><br>
                    
                </p>
                </div>
                <button class="btn btn-info" type="submit" name="Enregistre2">Enregistre</button><button class="btn btn-danger"><a href="index2.php">Sortie</a></button></div>
            </form>
            
            <div class="col-md-2"></div>
            
        </div>
    </div>
</body>
</html>
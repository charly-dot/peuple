<?php
require('bdn.php');
require('function.php');
$detail3 = fokotany($verification);
$detail = province();
$detail1 = region3();
$detail2 = commune();
if($_GET['num3']){
    $verification = $_GET['num3'];
    $detail3 = fokotany($verification);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
 

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
				<?php if(isset($verification)){?>
					<h1>modifier d'un address</h1>
                            <label for="adress" id="adress">address :</label><input type="text" id="adress" name="adress" value="<?= $detail['nom_pro']?>"><br>
                            <label for="nom">Nom:</label><input type="text" name="nom" id="nom" value="<?= $detail3['nom_pro']?>"><br>
                            <label for="prenom">Prenom:</label><input type="text" name="prenom" id="prenom" value="<?= $detail3['nom_pro']?>"><br>
                            <label for="telephone">Telephone:</label><input type="text" id="telephone" name="telephone" value="<?= $detail3['nom_pro']?>"><br></p>
                        <button class="btn btn-info" type="submit" name="upd">Enregistre</button><button class="btn btn-danger"><a href="address.php">Sortie</a></button></div>
                    
					<div class="col-md-2"></div>
				<?php }else{?>
					<h1>ajouter d'un address</h1>
                            <p><label for="nom_province">Votre province:</label> 
                            <select name="nom_pro" id="province">								
                                <?php foreach($detail as $detail): ?>
                                    <option value="<?= $detail['nom_pro']?>"><?= $detail['nom_pro']?><br></option>
                                <?php endforeach; ?>								
                            </select>
                            <label for="nom_reg">Votre region:</label> <select name="nom_reg" id="nom_reg">								
                                <?php foreach($detail1 as $detail): ?>
                                    <option value="<?= $detail['nom_reg']?>"><?= $detail['nom_reg']?><br></option>
                                <?php endforeach; ?>								
                            </select><br>
                            <label for="nom_comm">Votre commun:</label> <select name="nom_comm" id="nom_comm">								
                                <?php foreach($detail2 as $detail): ?>
                                    <option value="<?= $detail['id']?>"><?= $detail['nom_comm']?><br></option>
                                <?php endforeach; ?>								
                            </select>
                            <label for="nom_fkt">Votre fokotany:</label> <select name="nom_fkt" id="nom_fkt">								
                                <?php foreach($detail3 as $detail): ?>
                                    <option value="<?= $detail['id']?>"><?= $detail['nom_fkt']?><br></option>
                                <?php endforeach; ?>								
                            </select><br>
                            <label for="adress" id="adress">address :</label><input type="text" id="adress" name="adress"><br>
                            <label for="nom">Nom:</label><input type="text" name="nom" id="nom"><br>
                            <label for="prenom">Prenom:</label><input type="text" name="prenom" id="prenom"><br>
                            <label for="telephone">Telephone:</label><input type="text" id="telephone" name="telephone"><br></p>
                        <button class="btn btn-info" type="submit" name="ins4">Enregistre</button><button class="btn btn-danger"><a href="address.php">Sortie</a></button></div>
                    </div>
				<div class="col-md-2"></div>
				<?php }; ?>
					
			</form>
		</div>
	</div>
</body>
</html>
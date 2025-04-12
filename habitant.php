<?php
require('bdn.php');
if(isset($_GET['colone'])){
    $path = $_GET['colone'];
}
$select = $connexion1->prepare('SELECT * FROM habitant WHERE nom_fkt = :e');
$select->execute([
    "e"=>$path,
]);
$graphe = $select->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="2em.css">
    <title>habitant</title>
</head>
<body>
    <h1>adress de</h1>
<div class="container">
    <div class="row bg-danger bordera">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th> nom </th>
                    <th> prenom </th>
                    <th> date de naissace </th>
                    <th> lieu de naissancen </th>
                    <th> numero CIN </th>
                    <th> genre </th>
                    <th>M/S</th>
                   
                </tr>
            </thead>
            <form action="liste_province" method="POST"></form>
                <tbody>
                    <?php foreach($graphe as $list): ?>
                        <tr>
                            <td><?= $list['id']?></td>
                            <td><?= $list['nom']?></td>
                            <td><?= $list['prenom']?></td>
                            <td><?= $list['date_de_naissance']?></td>
                            <td><?= $list['lieu_de_naissance']?></td>
                            <td><?= $list['CIN']?></td>
                            <td><?= $list['genre']?></td>
                            <td><?= $list['adress']?></td>
                            <td><?= $list['nom_fkt']?></td>
                            <td><?= $list['telephone']?></td>
                            <td><input type="radio" name="voalohany"></td>  
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="total">total:</td>
                    </tr>
                </tbody>
        </table>
				<p><input type="text" class="search-query lava"><button class="btn btn-primary" type="submit">Recherche</button><button class="btn btn-primary"><a href="Ajouter5.php">ajouter</a></button><button class="btn btn-success"><a href="">modifier</a></button><button class="btn btn-danger"><a href="">supprimer</a></button><button class=" btn btn-danger"><a href="fokotany.php">retout</a></button><a href="habitant.php"><i class="fa fa-home" style="margin-left:10px;"></i></a></p>
		</form>
    </div>
</div>
</body>
</html>
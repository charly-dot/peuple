<?php
require('bdn.php');
// formulair

//insertion
if (isset($_POST['Enregistre'])){
    if (!empty($_POST['nom_pro']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['telephone'])){
        $insertion = $connexion->prepare('INSERT INTO province(nom_pro,nom,prenom,telephone)VALUES(:nom_pro, :nom, :prenom, :telephone)');
        $insertion->bindValue(':nom_pro', $_POST['nom_pro'], PDO::PARAM_STR);
        $insertion->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $insertion->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $insertion->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
        $insertion->execute();
    }}
?>
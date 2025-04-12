<?php
require('bdn.php');
require('ajouter2.php');
// formulair
$update3 = $_GET['update3'];
var_dump($update3);
//insertion
if (isset($_POST['Enregistre'])){
    if (!empty($_POST['nom_comm']) AND !empty($_POST['nom']) AND !empty($_POST['Prenom']) AND !empty($_POST['telephone']) AND !empty($_POST['nom_reg']) AND !empty($_POST['nom_pro'])){
        $insertion = $connexion->prepare('INSERT INTO commune(id,nom_comm,nom,prenom,telephone,nom_reg,nom_pro)VALUES(null, :nom_comm, :nom, :prenom, :telephone, :nom_reg, :nom_pro)');
        $insertion->bindValue(':nom_comm', $_POST['nom_comm'], PDO::PARAM_STR);
        $insertion->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $insertion->bindValue(':prenom', $_POST['Prenom'], PDO::PARAM_STR);
        $insertion->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
        $insertion->bindValue(':nom_reg', $_POST['nom_reg'], PDO::PARAM_STR);
        $insertion->bindValue(':nom_pro', $_POST['nom_pro'], PDO::PARAM_STR);
        $insertion->execute();
        require('fin.html');
    }else{
        echo " tsy mety1";
    };
}else{
    echo " tsy mety2";
}

?>
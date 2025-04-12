<?php
require('bdn.php');
// formulair

//insertion
if (isset($_POST['Enregistre'])){
    if (!empty($_POST['nom_reg']) AND !empty($_POST['nom']) AND !empty($_POST['prenom'])AND !empty($_POST['telephone']) AND !empty($_POST['nom_pro'])){
        $insertion = $connexion->prepare('INSERT INTO region(id,nom_reg,nom,prenom,telephone,nom_pro)VALUES(null, :nom_reg, :nom, :prenom, :telephone, :nom_pro)');
        $insertion->bindValue(':nom_reg', $_POST['nom_reg'], PDO::PARAM_STR);
        $insertion->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $insertion->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $insertion->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
        $insertion->bindValue(':nom_pro', $_POST['nom_pro'], PDO::PARAM_STR);
        $insertion->execute();
        echo"<script>document.location='Region.php'</script>";
        
    }else{
        echo " tsy mety1 ";
    };
}else{
    echo " tsy mety2";
};
?>
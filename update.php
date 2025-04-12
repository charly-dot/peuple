<?php 
require('bdn.php');
$nom_pro = $_POST['nom_pro'];
$nom_reg = $_POST['nom_reg'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$btn = $_POST['Enregistre'];
$id = $_POST['id'];
$upd2 = $_POST['upd2']; 
$ins1 = $_POST['ins1']; 
// commune
$nom_comm = $_POST['nom_comm'];
$upd4 = $_POST['upd4'];
$ins2  = $_POST['ins2'];
//fokotany
$upd5 = $_POST['upd5'];
$ist3 = $_POST['ist3'];
$nom_fkt = $_POST['nom_fkt'];


function update($nom_pro,$btn,$nom,$prenom,$telephone,$upd2,$id,$nom_reg,$ins1){
    global $connexion;
    if(isset($btn)){
        $update = $connexion->prepare("UPDATE province SET  nom_pro = :nom_pro, nom = :nom, prenom = :prenom, telephone = :telephone WHERE id = :id");
        $update->bindValue(':nom_pro',  $nom_pro, PDO::PARAM_STR);
        $update->bindValue(':nom',  $_POST['nom'], PDO::PARAM_STR);
        $update->bindValue(':prenom',  $_POST['prenom'], PDO::PARAM_STR);
        $update->bindValue(':telephone',  $_POST['telephone'], PDO::PARAM_INT);
        $update->bindValue(':id',  $_POST['id'], PDO::PARAM_INT);
        $update->execute();
        echo "<script>document.location='Acceuil.php'</script>";
        return($update);
    }
    if (isset($upd2)){
        $update = $connexion->prepare("UPDATE region SET  nom_reg = :nom_reg, nom = :nom, prenom = :prenom, telephone = :telephone WHERE id = :id");
        $update->bindValue(':nom_reg',  $nom_reg, PDO::PARAM_STR);
        $update->bindValue(':nom',  $nom, PDO::PARAM_STR);
        $update->bindValue(':prenom',  $prenom, PDO::PARAM_STR);
        $update->bindValue(':telephone',  $telephone, PDO::PARAM_INT);
        $update->bindValue(':id',  $id, PDO::PARAM_INT);
        echo "<script>document.location='Region.php'</script>";
        $update->execute();
        return($update);
    }
    if (isset($ins1)){
        require_once('insertion.php');
        region($nom,$prenom,$telephone,$id,$nom_reg,$ins1,$nom_pro);
        echo "mety";
    };
};
update($nom_pro,$btn,$nom,$prenom,$telephone,$upd2,$id,$nom_reg,$ins1);

    if (isset($upd4)){
        $update = $connexion->prepare("UPDATE commune SET  nom_comm = :nom_comm, nom = :nom, prenom = :prenom, telephone = :telephone WHERE id = :id");
        $update->bindValue(':nom_comm',  $nom_comm, PDO::PARAM_STR);
        $update->bindValue(':nom',  $nom, PDO::PARAM_STR);
        $update->bindValue(':prenom',  $prenom, PDO::PARAM_STR);
        $update->bindValue(':telephone',  $telephone, PDO::PARAM_INT);
        $update->bindValue(':id',  $id, PDO::PARAM_INT);
        echo "<script>document.location='commune.php'</script>";
        $update->execute();
        return($update);
    }
    if (isset($ins2)){
        require_once('insertion.php');
        commune1($nom,$prenom,$telephone,$id,$nom_reg,$ins1,$nom_pro,$nom_comm,$ins2);
    }



if (isset($ist3)){
    require_once('insertion.php');
    insert3($nom,$prenom,$telephone,$id,$nom_reg,$nom_fkt,$nom_pro,$nom_comm,$ins3);
}else{
    echo "tsy mety";
}
if (isset($upd5)){
    $insertion = $connexion->prepare('UPDATE Fokotany SET nom_fkt = :nom_fkt ,nom = :nom, prenom = :prenom, telephone = :telephone WHERE id = :id');
    $insertion->bindValue(':nom_fkt', $_POST['nom_fkt'], PDO::PARAM_STR);
    $insertion->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $insertion->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $insertion->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
    $insertion->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
    $insertion->execute();
    echo "<script>document.location='Fokotany.php'</script>";
}




?>
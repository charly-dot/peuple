<?php 
require('bdn.php');
$nom_pro = $_POST['nom_pro'] ?? null;
$nom_reg = $_POST['nom_reg'] ?? null;
$nom = $_POST['nom'] ?? null;
$prenom = $_POST['prenom'] ?? null;
$telephone = $_POST['telephone'] ?? null;
$btn = $_POST['Enregistre'] ?? null;
$id = $_POST['id'] ?? null;
$delete = $_GET['nom'] ?? null;
$delete2 = $_GET['delete2'] ?? null;
$update2 = $_POST['update2'] ?? null;
$delete2 = $_GET['delete4'] ?? null;
$delete3 = $_GET['delete3'] ?? null;

$btn2 = $_POST['Enregistre2'];

// echo $nom_pro .' '. $nom .' '. $prenom .' '. $telephone .' '. $id; 

function update($nom_pro,$btn,$nom,$prenom,$telephone,$id,$update2,$update3,$btn2){
    global $connexion;
    if(isset($btn)){
        $update = $connexion->prepare("UPDATE province SET  nom_pro = :nom_pro, nom = :nom, prenom = :prenom, telephone = :telephone WHERE id = :id");
        $update->bindValue(':nom_pro',  $nom_pro, PDO::PARAM_STR);
        $update->bindValue(':nom',  $_POST['nom'], PDO::PARAM_STR);
        $update->bindValue(':prenom',  $_POST['prenom'], PDO::PARAM_STR);
        $update->bindValue(':telephone',  $_POST['telephone'], PDO::PARAM_INT);
        $update->bindValue(':id',  $_POST['id'], PDO::PARAM_INT);
        $update->execute();
        return($update);
    }

    if(isset($update2)){
        $update = $connexion->prepare("UPDATE region SET  nom_reg = :nom_reg, nom = :nom, prenom = :prenom, telephone = :telephone WHERE id = :id");
        $update->bindValue(':nom_reg',  $_POST['nom_reg'], PDO::PARAM_STR);
        $update->bindValue(':nom',  $_POST['nom'], PDO::PARAM_STR);
        $update->bindValue(':prenom',  $_POST['prenom'], PDO::PARAM_STR);
        $update->bindValue(':telephone',  $_POST['telephone'], PDO::PARAM_INT);
        $update->bindValue(':id',  $_POST['id'], PDO::PARAM_INT);
        echo "<script>document.location='Region.php'</script>";
        $update->execute();
        return($update);
    }
    if ($update3){
        $update = $connexion->prepare("UPDATE commune SET  nom_reg = :nom_reg, nom = :nom, prenom = :prenom, telephone = :telephone, nom_pro = :nom_pro WHERE id = :id");
        $insertion->bindValue(':nom_comm', $_POST['nom_comm'], PDO::PARAM_STR);
        $insertion->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $insertion->bindValue(':prenom', $_POST['Prenom'], PDO::PARAM_STR);
        $insertion->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
        $insertion->bindValue(':nom_reg', $_POST['nom_reg'], PDO::PARAM_STR);
        $insertion->bindValue(':nom_pro', $_POST['nom_pro'], PDO::PARAM_STR);
        $insertion->bindValue(':id', $_POST['id'], PDO::PARAM_STR);
        $insertion->execute();
        echo "<script>document.location='commune.php'</script>";
    }else{
        echo " tsy mety1";
    };
};
function inser(){
    if (!empty($_POST['nom_reg']) AND !empty($_POST['nom']) AND !empty($_POST['prenom'])AND !empty($_POST['telephone']) AND !empty($_POST['nom_pro'])){
        $insertion = $connexion->prepare('INSERT INTO region(id,nom_reg,nom,prenom,telephone,nom_pro)VALUES(null, :nom_reg, :nom, :prenom, :telephone, :nom_pro)');
        $insertion->bindValue(':nom_reg', $_POST['nom_reg'], PDO::PARAM_STR);
        $insertion->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $insertion->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $insertion->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
        $insertion->bindValue(':nom_pro', $_POST['nom_pro'], PDO::PARAM_STR);
        $insertion->execute();
        echo"<script>document.location='Region.php'</script>";}
        else{
            echo "tsy mety";
        }
    }
function delete($delete,$delete2,$delete3,$delete4){
    
    global $connexion;
    if($delete){
        $supprimer = $connexion->prepare("DELETE FROM province WHERE nom_pro = :nom_pro");
        $supprimer->execute([":nom_pro"=> $delete,]);
        echo "<script>document.location='Acceuil.php'</script>";
        return($supprimer);
    }
    if($delete2){
        $supprimer1 = $connexion->prepare("DELETE FROM region WHERE nom_reg = :nom_pro");
        $supprimer1->execute([":nom_pro"=> $delete2,]);
        echo "<script>document.location='Region.php'</script>";
        return($supprimer1);  
    }
    if ($delete3) {
        $supprimer = $connexion->prepare("DELETE FROM commune WHERE id = :id");
        $supprimer->execute([":id" => $delete3]);
        echo "<script>document.location='commune.php'</script>";
    }else{
        echo "tsy mety";
    }
}
update($nom_pro, $btn, $nom, $prenom, $telephone, $id, $update2, $update3, $nom_reg, $nom_comm);
delete($delete,$delete2,$delete3,$delete4);



?>
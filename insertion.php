<?php 
require_once('bdn.php');
require_once('Ajouter2.php');
$nom_pro = $_POST['nom_pro'];
$nom_reg = $_POST['nom_reg'];
$nom_comm = $_POST['nom_comm'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];

if (isset($_POST['Enregistre'])){
    if (!empty($_POST['nom_pro']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['telephone'])){
        $insertion = $connexion->prepare('INSERT INTO province(nom_pro,nom,prenom,telephone)VALUES(:nom_pro, :nom, :prenom, :telephone)');
        $insertion->bindValue(':nom_pro', $_POST['nom_pro'], PDO::PARAM_STR);
        $insertion->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $insertion->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $insertion->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
        $insertion->execute();
        echo "<script>document.location='Acceuil.php'</script>";
    }}
function region($nom,$prenom,$telephone,$id,$nom_reg,$ins1,$nom_pro){
    global $connexion;
    if (isset($ins1)){
        if (!empty($_POST['nom_pro']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['telephone'])){
            $update = $connexion->prepare("INSERT INTO region(nom_reg,nom,prenom,telephone,nom_pro)VALUES(:nom_reg, :nom, :prenom, :telephone, :nom_pro)");
            $update->bindValue(':nom_reg',  $nom_reg, PDO::PARAM_STR);
            $update->bindValue(':nom',  $nom, PDO::PARAM_STR);
            $update->bindValue(':prenom',  $prenom, PDO::PARAM_STR);
            $update->bindValue(':telephone',  $telephone, PDO::PARAM_INT);
            $update->bindValue(':nom_pro',  $nom_pro, PDO::PARAM_INT);
            header("location: Region.php?ajoute");
            $update->execute();
            return($update);
       }
    }
}
   if (isset($_POST['enr2'])){
    if (!empty($_POST['nom_pro']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['telephone'])){
        $update = $connexion->prepare("INSERT INTO commune(id,nom_comm,nom,prenom,telephone,nom_reg,nom_pro)VALUES(15, :nom_comm, :nom, :prenom, :telephone, nom_reg, :nom_pro)");
        $update->bindValue(':nom_reg',  $nom_reg, PDO::PARAM_STR);
        $update->bindValue(':nom_comm',  $nom_comm, PDO::PARAM_STR);
        $update->bindValue(':nom',  $nom, PDO::PARAM_STR);
        $update->bindValue(':prenom',  $prenom, PDO::PARAM_STR);
        $update->bindValue(':telephone',  $telephone, PDO::PARAM_INT);
        $update->bindValue(':nom_pro',  $nom_pro, PDO::PARAM_INT);
         echo "<script>document.location='commune.php'</script>";
        $update->execute();
        // echo "mety";
        return($update);
   }
} 
    if(isset($_POST['upd2'])){
        $upd3 = $_POST['upd2'];
        update_comm($upd3,$nom_pro,$nom_reg,$nom_comm,$nom,$prenom,$telephone);
        
    }else{

    }
    function commune1($nom,$prenom,$telephone,$id,$nom_reg,$ins1,$nom_pro,$nom_comm,$ins2){
        global $connexion;
        if (!empty($nom_pro) AND !empty($nom_reg) AND !empty($nom) AND !empty($telephone) AND !empty($nom_comm) AND !empty($prenom)){
             $update = $connexion->prepare("INSERT INTO commune(nom_cum,nom,prenom,telephone,nom_reg,nom_pro)VALUES(:nom_comm, :nom, :prenom, :telephone, :nom_reg, :nom_pro)");
             $update->bindValue(':nom_reg',  $nom_reg, PDO::PARAM_STR);
             $update->bindValue(':nom_comm',  $nom_comm, PDO::PARAM_STR);
             $update->bindValue(':nom',  $nom, PDO::PARAM_STR);
             $update->bindValue(':prenom',  $prenom, PDO::PARAM_STR);
             $update->bindValue(':telephone',  $telephone, PDO::PARAM_INT);
             $update->bindValue(':nom_pro',  $nom_pro, PDO::PARAM_INT);
             $update->execute();
             header("location: commune.php?ajoute");
             return($update);
         }
    }
    function insert3($nom,$prenom,$telephone,$id,$nom_reg,$nom_fkt,$nom_pro,$nom_cum,$ins3){
        global $connexion;
             $insertion = $connexion->prepare('INSERT INTO fokotany(nom_fkt,nom,prenom,telephone,nom_pro,nom_reg,nom_comm)VALUES(:nom_fkt, :nom, :prenom, :telephone, :nom_pro, :nom_reg, :nom_comm)');
            $insertion->bindValue(':nom_comm', $nom_cum, PDO::PARAM_STR);
            $insertion->bindValue(':nom', $nom, PDO::PARAM_STR);
            $insertion->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $insertion->bindValue(':telephone', $telephone, PDO::PARAM_INT);
            $insertion->bindValue(':nom_reg', $nom_reg, PDO::PARAM_STR);
            $insertion->bindValue(':nom_pro', $nom_pro, PDO::PARAM_STR);
            $insertion->bindValue(':nom_fkt', $nom_fkt, PDO::PARAM_STR);
            
             header("location: Fokotany.php?ajoute");
            $insertion->execute();
            return($insertion);
    }
    if(isset($_POST['ins4'])){
        $update = $connexion->prepare('INSERT INTO maison(adress,nom,prenom,telephone,nom_pro,nom_reg,nom_comm,nom_fkt)VALUES(:adress, :nom, :prenom,  :telephone, :nom_pro, :nom_reg, :nom_comm, :nom_fkt)');
        $update->bindValue(':adress',  $_POST['adress'], PDO::PARAM_STR);
        $update->bindValue(':telephone',  $_POST['telephone'], PDO::PARAM_INT);
        $update->bindValue(':nom_pro',  $_POST['nom_pro'], PDO::PARAM_STR);
        $update->bindValue(':nom_reg',  $_POST['nom_reg'], PDO::PARAM_STR);
        $update->bindValue(':nom_fkt',  $_POST['nom_fkt'], PDO::PARAM_STR);
        $update->bindValue(':nom_comm',  $_POST['nom_comm'], PDO::PARAM_STR);
        $update->bindValue(':nom',  $_POST['nom'], PDO::PARAM_STR);
        $update->bindValue(':prenom',  $_POST['prenom'], PDO::PARAM_STR);
        $update->execute();
        header("location: Fokotany.php?ajoute");
        
    }
?>
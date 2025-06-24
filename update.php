<?php 
require('bdn.php');
$nom_pro = $_POST['nom_pro'] ?? null;
$nom_reg = $_POST['nom_reg'] ?? null;
$nom = $_POST['nom'] ?? null;
$prenom = $_POST['prenom'] ?? null;
$telephone = $_POST['telephone'] ?? null;
$btn = $_POST['Enregistre'] ?? null;
$id = $_POST['id'] ?? null;
$upd2 = $_POST['upd2'] ?? null; 
$ins1 = $_POST['ins1'] ?? null; 
// commune
$nom_cum = $_POST['nom_cum'] ?? null;
$nom_comm = $_POST['nom_comm'] ?? null;
$upd4 = $_POST['upd4'];
$ins2  = $_POST['ins2'] ?? null;
//fokotany
$upd5 = $_POST['upd5'] ?? null;
$ist3 = $_POST['ist3'] ?? null;
$nom_fkt = $_POST['nom_fkt'] ?? null;
$ist4 = $_POST['ist4'] ?? null;
$updmaison = $_POST['updmaison'] ?? null; 
$modofierHabitant = $_POST['modofierHabitant'] ?? null; 



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
        header("location: Acceuil.php?modification");
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
        
    };
};
update($nom_pro,$btn,$nom,$prenom,$telephone,$upd2,$id,$nom_reg,$ins1);

if (isset($_POST['upd4'])) {
    $nom_pro = $_POST['nom_pro'];
    $nom_reg = $_POST['nom_reg'];
    $nom_comm = $_POST['nom_comm'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $id = $_POST['id'];

    $update = $connexion->prepare("UPDATE commune SET nom_cum = :nom_comm, nom = :nom, prenom = :prenom, telephone = :telephone WHERE id = :id");
    $update->bindValue(':nom_comm', $nom_comm);
    $update->bindValue(':nom', $nom);
    $update->bindValue(':prenom', $prenom);
    $update->bindValue(':telephone', $telephone);
    $update->bindValue(':id', $id, PDO::PARAM_INT);
    $update->execute();
    header("location: commune.php?modification");
}
    if (isset($ins2)){
        require_once('insertion.php');
        commune1($nom,$prenom,$telephone,$id,$nom_reg,$ins1,$nom_pro,$nom_comm,$ins2);
    }

if (isset($ist3)){
    require_once('insertion.php');
    insert3($nom,$prenom,$telephone,$id,$nom_reg,$nom_fkt,$nom_pro,$nom_cum,$ins3);

}
    if (isset($upd5)){
        $insertion = $connexion->prepare('UPDATE Fokotany SET nom_fkt = :nom_fkt ,nom = :nom, prenom = :prenom, telephone = :telephone WHERE id = :id');
        $insertion->bindValue(':nom_fkt', $_POST['nom_fkt'], PDO::PARAM_STR);   
        $insertion->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $insertion->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $insertion->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
        $insertion->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $insertion->execute();
        header("location: Fokotany.php?modification");
    }

    if (isset($ist4)) {
        $update = $connexion->prepare('
        INSERT INTO maison(nom_reg, nom_pro, nom_cum, adress, nom_fkt, nom, prenom, telephone)
        VALUES(:nom_reg, :nom_pro, :id_comm, :adress, :nom_fkt, :nom, :prenom, :telephone)
    ');

    $update->bindValue(':adress',    $_POST['adress'], PDO::PARAM_STR);
    $update->bindValue(':nom',       $_POST['nom'], PDO::PARAM_STR);
    $update->bindValue(':prenom',    $_POST['prenom'], PDO::PARAM_STR);
    $update->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
    $update->bindValue(':nom_pro',   $_POST['nom_pro'], PDO::PARAM_STR);
    $update->bindValue(':nom_reg',   $_POST['nom_reg'], PDO::PARAM_STR);
    $update->bindValue(':nom_fkt',   $_POST['nom_fkt'], PDO::PARAM_STR);
    $update->bindValue(':id_comm',   $_POST['nom_comm'], PDO::PARAM_INT);
    $update->execute();
    // echo "<script>document.location='Fokotany.php'</script>";
    header("location: Fokotany.php?ajoute");
    // var_dump($_POST['telephone'] . $_POST['nom_comm']);
    }

    if (isset($updmaison)) {
        $update = $connexion->prepare("UPDATE maison SET adress = :adress, nom = :nom, prenom = :prenom, telephone = :telephone WHERE id = :id");
        $update->bindValue(':id',    $_POST['id'], PDO::PARAM_STR);
        $update->bindValue(':adress',    $_POST['adress'], PDO::PARAM_STR);
        $update->bindValue(':nom',       $_POST['nom'], PDO::PARAM_STR);
        $update->bindValue(':prenom',    $_POST['prenom'], PDO::PARAM_STR);
        $update->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
        // echo "<script>document.location='Fokotany.php'</script>";
        header("location: Fokotany.php?modification");
        $update->execute();
        return($update);
   }

   if (isset($modofierHabitant)) {
    if (
        !empty($_POST['id']) &&
        !empty($_POST['genre']) &&
        !empty($_POST['nom']) &&
        !empty($_POST['prenom']) &&
        !empty($_POST['date_de_naissance']) &&
        !empty($_POST['lieu_de_naissance']) &&
        !empty($_POST['CIN']) &&
        !empty($_POST['telephone']) 
    ) {
        try {
            $update = $connexion->prepare("UPDATE habitant SET genre = :genre, nom = :nom, prenom = :prenom, telephone = :telephone, date_de_naissance = :date_de_naissance, cin = :cin, lieu_de_naissance = :lieu_de_naissance WHERE id = :id");
            $update->bindValue(':nom',               $_POST['nom'], PDO::PARAM_STR);
            $update->bindValue(':prenom',            $_POST['prenom'], PDO::PARAM_STR);
            $update->bindValue(':date_de_naissance', $_POST['date_de_naissance'], PDO::PARAM_STR);
            $update->bindValue(':lieu_de_naissance', $_POST['lieu_de_naissance'], PDO::PARAM_STR);
            $update->bindValue(':cin',               $_POST['CIN'], PDO::PARAM_STR);
            $update->bindValue(':genre',             $_POST['genre'], PDO::PARAM_STR);
            $update->bindValue(':telephone',         $_POST['telephone'], PDO::PARAM_STR);
            $update->bindValue(':id',                $_POST['id'], PDO::PARAM_STR);

            $update->execute();
            // echo "<script>document.location='Fokotany.php'</script>";
            header("location: Fokotany.php?modification");
        } catch (PDOException $e) {
            echo "❌ Erreur de modification : " . $e->getMessage();
        }
    } else {
    }
   }



?>
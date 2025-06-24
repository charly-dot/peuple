<?php
require('bdn.php');
require_once('function.php');

if (isset($_POST['Enregistre2'])) {
    try {
        $update = $connexion->prepare('
            INSERT INTO habitant (
                nom_reg, nom_pro, nom_cum, adress,
                prenom, nom, date_de_naissance,
                telephone, cin, genre, lieu_de_naissance, nom_fkt, nom_maison
            ) VALUES (
                :nom_reg, :nom_pro, :nom_cum, :adress,
                :prenom, :nom, :date_de_naissance,
                :telephone, :cin, :genre, :lieu_de_naissance, :nom_fkt, :nom_maison
            )
        ');

        $update->bindValue(':nom',               $_POST['nom'], PDO::PARAM_STR);
        $update->bindValue(':prenom',            $_POST['prenom'], PDO::PARAM_STR);
        $update->bindValue(':date_de_naissance', $_POST['date_de_naissaince'], PDO::PARAM_STR);
        $update->bindValue(':lieu_de_naissance', $_POST['lieu_de_naissance'], PDO::PARAM_STR);
        $update->bindValue(':cin',               $_POST['CIN'], PDO::PARAM_STR);
        $update->bindValue(':genre',             $_POST['genre'], PDO::PARAM_STR);
        $update->bindValue(':nom_fkt',           $_POST['nom_fkt'], PDO::PARAM_STR);
        $update->bindValue(':adress',            $_POST['adress'], PDO::PARAM_STR);
        $update->bindValue(':telephone',         $_POST['telephone'], PDO::PARAM_STR);
        $update->bindValue(':nom_reg',           $_POST['nom_reg'], PDO::PARAM_STR);
        $update->bindValue(':nom_cum',           $_POST['nom_cum'], PDO::PARAM_STR);
        $update->bindValue(':nom_pro',           $_POST['nom_pro'], PDO::PARAM_STR);
        $update->bindValue(':nom_maison',        $_POST['id_maison'], PDO::PARAM_STR); // 👈 Corrigé ici aussi

        $update->execute();
        // Redirection si tu veux :
        header("location: Fokotany.php?ajoute");
        
        
    } catch (PDOException $e) {
        echo "❌ Erreur d'insertion : " . $e->getMessage();
    }
}

if (isset($_POST['formulair'])){
    if (!empty($_POST['compte']) AND !empty($_POST['pss'])){
        $id = $_POST['compte'];
        $PSS = $_POST['pss'];
        $premier = authontification($id,$PSS);
        if (!empty($premier)){
            echo "<script>document.location='index2.php'</script>";
        }else{
            header("location: index.php?faux");}
    }
    
    else if(empty($_POST['compte']) OR empty($_POST['pss'])){
        header("location: index.php?error= formation est incomplet");
    }
    else{header("location: index.php?faux");}
}

?>


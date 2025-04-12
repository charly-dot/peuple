<?php
require('bdn.php');
require_once('function.php');





//CREATE TABLE habitant(id int, nom varchar(155), prenom varchar(155), date_de_naissaince date, lieu_de_naissance
//varchar(155), CIN int(50), genre varcha
//r(30), adress varchar(200), nom_fkt varchar(155), telephone int null);
if(isset($_POST['Enregistre2'])){
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date_de_naissaince']) AND !empty($_POST['lieu_de_naissance']) AND !empty($_POST['CIN']) AND !empty($_POST['nom_fkt']) AND !empty($_POST['adress']) AND !empty($_POST['telephone'])){
        $update = $connexion->prepare('INSERT INTO habitant(id,nom,prenom,date_de_naissaince,lieu_de_naissance,CIN,genre,adress,nom_fkt,telephone)VALUES(3, :nom, :prenom, :date_de_naissaince, :lieu_de_naissance, :CIN, :genre, :adress, :nom_fkt, :telephone)');
        $update->bindValue(':nom',  $_POST['nom'], PDO::PARAM_STR);
        $update->bindValue(':prenom',  $_POST['prenom'], PDO::PARAM_INT);
        $update->bindValue(':date_de_naissaince',  $_POST['date_de_naissaince'], PDO::PARAM_STR);
        $update->bindValue(':lieu_de_naissance',  $_POST['lieu_de_naissance'], PDO::PARAM_STR);
        $update->bindValue(':CIN',  $_POST['CIN'], PDO::PARAM_STR);
        $update->bindValue(':genre',  $_POST['genre'], PDO::PARAM_STR);
        $update->bindValue(':nom_fkt',  $_POST['nom_fkt'], PDO::PARAM_STR);
        $update->bindValue(':adress',  $_POST['adress'], PDO::PARAM_STR);
        $update->bindValue(':telephone',  $_POST['telephone'], PDO::PARAM_STR);
        $update->execute();
        echo "mety";
        //echo "<script> document.location='Fokotany.php'</script>"; 
    }
}elseif(isset($_POST['supprimer'])){
   
}else{
}

/*if (isset($_POST['formulair'])){
    if (!empty($_POST['compte']) AND !empty($_POST['pss'])){
        $condition = strlen($_POST['pss']);
        if($condition < 100){
            $id = $_POST['compte'];
            $PSS = $_POST['pss'];
            $premier = authontification($id,$PSS);
            if (!empty($premier)){
                echo "<script>document.location='Acceuil.php'</script>";}
                }else{echo "ldsj";
                   }

    }else if(empty($_POST['compte']) OR empty($_POST['pss'])){
        echo "dans le dexieume requete";
        header("location: authontification.php?error= formation est incomplet");
    }
    else{header("location: authontification.php?faux");}
}
else{
    echo "fin de requete ";
}
*/
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
else{
    echo "fin de requete ";
}
?>


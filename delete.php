<?php 
require('bdn.php');
$delete = $_GET['nom'];
$dlt2 = $_GET['dlt2'];
$dlt3 = $_GET['dlt3'];
$dlt4 = $_GET['dlt4'];
    if(isset($delete)){
        $supprimer = $connexion->prepare("DELETE FROM province WHERE id = :id");
        $supprimer->execute([
            "id"=>$delete,
        ]);  
        echo "<script>document.location='Acceuil.php'</script>";
        return($supprimer);
    }
    if(isset($dlt2)){
        $supprimer = $connexion->prepare("DELETE FROM region WHERE id = :id");
        $supprimer->execute([
            "id"=>$dlt2,
        ]);  
        echo "<script>document.location='region.php'</script>";
        return($supprimer);
    }
    if(isset($dlt3)){
        $supprimer = $connexion->prepare("DELETE FROM commune WHERE id = :id");
        $supprimer->execute([
            "id"=>$dlt3,
        ]);  
        echo "<script>document.location='commune.php'</script>";
        return($supprimer);
    }else{
        echo "tsy mety";
    }
    if(isset($dlt4)){
        $supprimer = $connexion->prepare("DELETE FROM Fokotany WHERE id = :id");
        $supprimer->execute([
            "id"=>$dlt4,
        ]);  
        echo "<script>document.location='Fokotany.php'</script>";
        return($supprimer);
    }

?>
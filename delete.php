<?php 
require('bdn.php');
$delete = $_GET['nom'] ?? null;
$dlt2 = $_GET['dlt2'] ?? null;
$dlt3 = $_GET['dlt3'] ?? null;
$dlt4 = $_GET['dlt4'] ?? null;
$suppressionHabitant = $_GET['suppressionHabitant'] ?? null;
$suppressionadress = $_GET['suppressionadress'] ?? null;
    if(isset($delete)){
        $supprimer = $connexion->prepare("DELETE FROM province WHERE id = :id");
        $supprimer->execute([
            "id"=>$delete,
        ]);  
        
        header("location: Acceuil.php?delete");
        return($supprimer);
    }
    if(isset($dlt2)){
        $supprimer = $connexion->prepare("DELETE FROM region WHERE id = :id");
        $supprimer->execute([
            "id"=>$dlt2,
        ]);  
        
        header("location: region.php?delete");
        return($supprimer);
    }
    if(isset($dlt3)){
        $supprimer = $connexion->prepare("DELETE FROM commune WHERE id = :id");
        $supprimer->execute([
            "id"=>$dlt3,
        ]);  
        // echo "<script>document.location='commune.php'</script>";
        header("location: commune.php?delete");
        return($supprimer);
    }
    if(isset($dlt4)){
        $supprimer = $connexion->prepare("DELETE FROM Fokotany WHERE id = :id");
        $supprimer->execute([
            "id"=>$dlt4,
        ]);  
        header("location: Fokotany.php?delete");
        return($supprimer);
        
        
    }
    if(isset($suppressionadress)){
       $supprimer = $connexion->prepare("DELETE FROM maison WHERE id = :id");
       $supprimer->execute([
           "id"=>$suppressionadress,
       ]);  
       header("location: Fokotany.php?delete");
       return($supprimer);
    }   

     if(isset($suppressionHabitant)){
        $supprimer = $connexion->prepare("DELETE FROM habitant WHERE id = :id");
        $supprimer->execute([
            "id"=>$suppressionHabitant,
        ]);  
        header("location: Fokotany.php?delete");
        return($supprimer);
     }
    
?>
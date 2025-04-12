<?php
try{
    $connexion = new PDO('mysql:host=localhost;dbname=division_madagascar', 'root', '');
    $connexion1 = new PDO('mysql:host=localhost;dbname=cytoyen', 'root', '');
}catch(PDOException $e){
    echo "ce pas bon" .$è->getMessage();
}
/*
$tableau = array ("charly", "kennedy", "fracky", "nicky", "diary", "hoby");
$province = array ("Antananarivo", "fianaratsoa", "toamasina", "toliara", "farafangana", "manjunga");
$district = array ("Ambalavao", "Ambanja", "Ambatomampy", "Ambato Boeny", "Ambatondrazaka", "Amboasary");
$commune = array ("commune1", "commune2", "commune3", "commune4", "commune5", "commune6");
$fokotany = array ("fokotany1", "fokotany2", "fokotany3", "fokotany4", "fokotany5", "fokotany6");
//region
$region = array ("haute matsiatra", "region Diana", "Boeny", "Amorony Mania", "Vakinakaratra", "Melaky", "Alaotra Mangoro", "Region Diana", "Analamanga");
$e = 1;



/*for ($source = 0; $source = 8; $source++){
   
    $insertion = "INSERT INTO province(id,nom_pro,nom,prenom,telephone)VALUES($e, '$province[$source]', 'charly', 'lantotiana', 22)";
    $verification = $connexion->exec($insertion);
    $e++;
    /*
    $insertion = "INSERT INTO district(id,nom_dist,nom,prenom,telephone,nom_pro,nom_reg)VALUES($e, '$region[$source]', null, null, null, null, null)";
    $verification = $connexion->exec($insertion);

    $insertion = "INSERT INTO region(id,nom_reg,nom,prenom,telephone,nom_pro)VALUES($e, '$region[$source]', null, null, null, farafangana)";
    $verification = $connexion->exec($insertion);

    $insertion = "INSERT INTO commune(id,nom_comm,nom,prenom,telephone,nom_pro,nom_reg)VALUES($e, '$commune[$source]', '$tableau[$source]', 'responble commune', 0345990241, null, 'Vakinakaratra')";
    $verification = $connexion->exec($insertion);
    $e++;
$delete = $connexion->prepare("DELETE FROM fokotany WHERE id > 3");
$verification = $delete->execute();
*/
/*
if($verification){
    echo "mety";
 }else{
    echo "tsy mety";
};
*/
//INSERT INTO maison(id,adress,telephone,nom_pro,nom_reg,nom_comm,nom_fkt)VALUES(1, '176ter', 0345990241, null, null, null, 'fokotany1');
?>
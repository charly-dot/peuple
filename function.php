<?php
require_once('bdn.php');
function select($id2){
    global $connexion;
    $commune = $connexion->prepare('SELECT * FROM Region WHERE id = :e');
    $commune->execute([
        "e"=>$id2,
    ]);
    $detail3 = $commune->fetch();
    return($detail3);
}

function select1(){
    echo "blblbla";
}
select1();

function fokotany($verification){
    global $connexion;
    if(isset($verification)){
        $fokotany = $connexion->prepare('SELECT * FROM fokotany WHERE id = :ef');
        $fokotany->execute([
            "ef"=>$verification,
        ]);
        $detail5 = $fokotany->fetch();
    return($detail5);
    }else{
        $fokotany = $connexion->prepare('SELECT * FROM fokotany');
        $fokotany->execute();
        $detail5 = $fokotany->fetchAll();
    }
};
function province(){
    global $connexion;
    $province = $connexion->prepare('SELECT * FROM province');
    $province->execute();
    $detail = $province->fetchAll();
    return($detail);
};
function region3(){
    global $connexion;
    $region = $connexion->prepare('SELECT nom_reg FROM region');
    $region->execute();
    $detail1 = $region->fetchAll();
    return($detail1);
}
function commune(){
    global $connexion;
    $region = $connexion->prepare('SELECT * FROM commune');
    $region->execute();
    $detail1 = $region->fetchAll();
    return($detail1);
}
function commune_where($upd3){
    global $connexion;
    $commune = $connexion->prepare('SELECT * FROM commune WHERE nom_comm= :e');
    $commune->execute([
        "e"=>$upd3,
    ]);
    $detail3 = $commune->fetch();
    return($detail3);
}

function habitant(){
    global $connexion1;
    $select = $connexion1->prepare('SELECT * FROM habitant');
    $select->execute();
    $graphe = $select->fetchAll();
    return($graphe);
}
function province_where($path){
    global $connexion;
	$affichage = $connexion->prepare('SELECT * FROM province WHERE nom_pro = :e');
	$affichage->execute([
        "e"=>$path,
    ]);
	$liste = $affichage->fetch();
	return($liste);
}
 
function select_all(){
    global $connexion;
    $province = $connexion->prepare('SELECT nom_pro FROM province');
    $province->execute();
    $detail = $province->fetchAll();
    return($detail);
    echo "mety";
}

function authontification($id,$PSS){
    global $connexion1;
    $utilisateur = $connexion1->prepare('SELECT * FROM utilisateur WHERE nom_du_compte = :e AND pss = :a');
    $utilisateur->execute([
        "e"=> $id, 
        "a"=> $PSS,
    ]);
    $tout = $utilisateur->fetchAll();
    return $tout;
}
if(isset($_GET['detail'])){
    $id1 = $_GET['detail'];
}






//INSERTION CREATE TABLE 176ter(id int primary key auto_increment, nom varchar(155), 
//prenom varchar(155), date_de_naissance date, lieu varchar(155), numero_CIN varchar(155), genre varchar(50));
//insert into INSERT INTO 176ter(id,nom,prenom,date_de_naissance,lieu,numero_CIN,genre)VALUES(1, 'charly', 'lantotiana', null, 'ambomahasoa', '62626', 'lehilahy');


?>
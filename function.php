<?php
require_once('bdn.php');

function province_recherche($recherche_province) {
    global $connexion;
    
    $province = $connexion->prepare("SELECT * FROM province WHERE nom_pro LIKE :e OR nom LIKE :e OR prenom LIKE :e OR telephone LIKE :e");
    $province->execute([
        "e" => '%' . $recherche_province . '%',
    ]);
    
    return $province->fetchAll();
}

function region_recherche($recherche_province) {
    global $connexion;
    
    $province = $connexion->prepare("SELECT * FROM region WHERE nom_reg LIKE :e OR nom LIKE :e OR prenom LIKE :e OR telephone LIKE :e OR nom_pro LIKE :e");
    $province->execute([
        "e" => '%' . $recherche_province . '%',
    ]);
    
    
    return $province->fetchAll();
}

function commune_recherche($recherche_province) {
    global $connexion;
    
    $province = $connexion->prepare("SELECT * FROM commune WHERE nom_cum LIKE :e OR nom LIKE :e OR prenom LIKE :e OR telephone LIKE :e");
    $province->execute([
        "e" => '%' . $recherche_province . '%',
    ]);
    
    return $province->fetchAll();
}

function fokotany_recherche($recherche_province) {
    global $connexion;
    
    $province = $connexion->prepare("SELECT * FROM fokotany WHERE nom_comm LIKE :e OR nom_reg LIKE :e OR nom_fkt LIKE :e OR telephone LIKE :e OR nom LIKE :e OR prenom LIKE :e");
    $province->execute([
        "e" => '%' . $recherche_province . '%',
    ]);
    
    return $province->fetchAll();
}

function maison_recherche($recherche_province) {
    global $connexion;
    
    $province = $connexion->prepare("SELECT * FROM maison WHERE  nom_cum LIKE :e OR nom_reg LIKE :e OR nom_pro LIKE :e OR nom_fkt LIKE :e OR telephone LIKE :e OR nom LIKE :e OR prenom LIKE :e OR adress LIKE :e");
    $province->execute([
        "e" => '%' . $recherche_province . '%',
    ]);
    
    return $province->fetchAll();
}

function habitant_recherche($recherche_province) {
    global $connexion;
    
    $province = $connexion->prepare("SELECT * FROM habitant WHERE nom_cum LIKE :e OR  nom_reg LIKE :e OR nom_maison LIKE :e OR lieu_de_naissance LIKE :e OR nom_fkt LIKE :e OR date_de_naissance LIKE :e OR telephone LIKE :e OR nom LIKE :e OR prenom LIKE :e OR adress LIKE :e OR cin LIKE :e OR genre LIKE :e");
    $province->execute([
        "e" => '%' . $recherche_province . '%',
    ]);
    
    return $province->fetchAll();
}


function addres(){
    global $connexion;
    $province = $connexion->prepare('SELECT * FROM maison');
    $province->execute();
    $detail = $province->fetchAll();
    return($detail);
};

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
    // echo "";
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
    $commune = $connexion->prepare('SELECT * FROM commune WHERE id = :e');
    $commune->execute([
        "e"=>$upd3,
    ]);
    $detail3 = $commune->fetch();
    return($detail3);
}

function habitant(){
    global $connexion;
    $select = $connexion->prepare('SELECT * FROM habitant');
    $select->execute();
    $graphe = $select->fetchAll();
    return($graphe);
}
function province_where($path){
    global $connexion;
	$affichage = $connexion->prepare('SELECT * FROM province WHERE id = :e');
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
    
}

function authontification($id,$PSS){
    global $connexion;
    $utilisateur = $connexion->prepare('SELECT * FROM utilisateur WHERE nom_du_compte = :e AND pss = :a');
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


//recherche


//total habitant

function province_total_habitant() {
    global $connexion;
    $province = $connexion->prepare('
        SELECT province.nom_pro, COUNT(habitant.id)  total_habitants
        FROM province
        LEFT JOIN habitant ON province.nom_pro = habitant.nom_pro
        GROUP BY province.nom_pro
    ');
    $province->execute();
    return $province->fetchAll();
}

function region_total_habitant() {
    global $connexion;
    $province = $connexion->prepare('
        SELECT region.nom_reg, COUNT(habitant.id) total_habitants
        FROM region
        LEFT JOIN habitant ON region.nom_reg = habitant.nom_reg
        GROUP BY region.nom_reg
    ');
    $province->execute();
    return $province->fetchAll();
}

function commune_total_habitant() {
    global $connexion;
    $province = $connexion->prepare('
        SELECT commune.nom_cum, COUNT(habitant.id) total_habitants
        FROM commune
        LEFT JOIN habitant ON commune.nom_cum = habitant.nom_cum
        GROUP BY commune.nom_cum
    ');
    $province->execute();
    return $province->fetchAll();
}

function fokotany_total_habitant() {
    global $connexion;
    $province = $connexion->prepare('
        SELECT fokotany.nom_fkt, COUNT(habitant.id) total_habitants
        FROM fokotany
        LEFT JOIN habitant ON fokotany.nom_fkt = habitant.nom_fkt
        GROUP BY fokotany.nom_fkt
    ');
    $province->execute();
    return $province->fetchAll();
}

function address_total_habitant() {
    global $connexion;
    $province = $connexion->prepare('
        SELECT maison.adress, COUNT(habitant.id) total_habitants
        FROM maison
        LEFT JOIN habitant ON maison.adress = habitant.adress
        GROUP BY maison.adress
    ');
    $province->execute();
    return $province->fetchAll();
}


// total ef general//

function address_total_habitant_general() {
    global $connexion;
    $stmt = $connexion->prepare('SELECT COUNT(*) AS total_habitants FROM habitant');
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//INSERTION CREATE TABLE 176ter(id int primary key auto_increment, nom varchar(155), 
//prenom varchar(155), date_de_naissance date, lieu varchar(155), numero_CIN varchar(155), genre varchar(50));
//insert into INSERT INTO 176ter(id,nom,prenom,date_de_naissance,lieu,numero_CIN,genre)VALUES(1, 'charly', 'lantotiana', null, 'ambomahasoa', '62626', 'lehilahy');


?>
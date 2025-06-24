<?php
try {
    $connexion = new PDO('mysql:host=localhost;dbname=division_madagascar', 'root', 'root');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // bonne pratique
   
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage(); // corriger ici
    exit; // arrête l'exécution si la connexion échoue
    echo ('erreur de base de donne');
}
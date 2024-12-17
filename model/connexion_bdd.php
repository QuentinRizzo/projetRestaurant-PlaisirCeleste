<?php
// Model/connexionbdd.php
// PDO = PhP Data Object
// Permet de protéger face a l'ingection par SQL
$username = 'root';
$mdp = '';

try{
    $pdo = new PDO('mysql:host=localhost;dbname=plaisirceleste', $username, $mdp);
}catch (PDOException $e){
    echo $e -> getMessage();
    die();
}
?>
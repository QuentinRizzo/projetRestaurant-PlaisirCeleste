<?php
require "../model/connexion_bdd.php";
require "../model/fonctions.php";

if(isset($_POST['action'])){
    if($_POST['action'] == 'selectvilledept'){
        $idDept = $_POST['idDepartement'];
        $villesDept = recupVillesDept($pdo, $idDept);

        echo json_encode($villesDept);
    }
}



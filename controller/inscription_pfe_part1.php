<?php

ob_start();
require_once "../model/crudetudiant.php";
require_once "../model/etudiant.php";
require_once "../model/pfe.php";
require_once "../model/pfecrud.php";

session_start();
$_SESSION['id'] = 2 ;

$etudiant = null;
if(isset($_SESSION['id'])){
    $etudiant=(new crudetudiant())->getetudiantById($_SESSION['id']) ;
    if(!$etudiant){
        header('location:inscription.php');
        exit();
    }
}

$err1 = "";
$err2 = "";

if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    if( $_POST["cin2"] && $_POST["titre"]){
        
    }
}

include "../view/inscription_pfe_part1.php";

$contenu = ob_get_clean();
include "../home.php";
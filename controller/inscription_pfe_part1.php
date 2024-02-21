<?php
session_start();
ob_start();
require_once "../model/crudetudiant.php";
require_once "../model/etudiant.php";
require_once "../model/pfe.php";
require_once "../model/pfecrud.php";

//redirect
require_once "auth/auth.php";
$auth = new auth();
if(!$auth->check()){
    header("location: login.php");
}


$etudiant = null;
if(isset($_SESSION['token'])){

    $data = $auth->getUserData();

    $etudiant = ( new crudetudiant() )->getetudiantById($data->user_id);
    if(!$etudiant){
        header('location:login.php');
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
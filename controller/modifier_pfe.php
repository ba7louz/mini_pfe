<?php
session_start();
require_once "../model/crudetudiant.php";
require_once "../model/etudiant.php";
require_once "../model/pfe.php";
require_once "../model/pfecrud.php";

//redirect
require_once "auth/auth.php";
$auth = new auth();
if(!$auth->check(0)){
    header("location: login.php");
}

$etudiant = null;
$pfe = null;
if( isset($_SESSION['token']) ){
    $data = $auth->getUserData();
    $etudiant = ( new crudetudiant() )->getetudiantById($data->user_id);
    if(!$etudiant){
        header('location:login.php');
        exit();
    }else {
        $res = (new crud_pfe())->getPfeByIdEtudiant($etudiant['id']);
        if($res) $pfe = $res;
        else header('location:login.php');
    }
}
$err1 = "";
$err2 = "";
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    if( 
        $_POST["titre"] && 
        $_POST['sujet'] && 
        $_POST['nom_entreprise']
    ){  
        $fileData = null;
        if (count($_FILES) > 0) {
            if ( is_uploaded_file($_FILES['fiche_pfe']['tmp_name']) ) {
                $fileData =file_get_contents($_FILES['fiche_pfe']['tmp_name']);
            }
        }
        $cin2 =  isset($_POST["cin2"])  ?  htmlspecialchars( $_POST["cin2"] ) : null; 
        $titre =    htmlspecialchars($_POST["titre"] );
        $sujet =    htmlspecialchars($_POST['sujet'] );
        $encadrant_iset = isset($_POST['encadreur_iset'] ) ? htmlspecialchars( $_POST['encadreur_iset']  ) : null;
        $nom_entreprise = htmlspecialchars($_POST['nom_entreprise'] );
        $encadrant_entreprise = isset ($_POST['encadreur_entreprise'] ) ?  htmlspecialchars($_POST['encadreur_entreprise']  ) : null;

        $pfe = new pfe($pfe['id'], null,null ,$encadrant_iset ,$nom_entreprise,$encadrant_entreprise ,$titre,$sujet,  $fileData  , $pfe['id'] ,null,null);
        (new crud_pfe())->EditPfe($pfe);  
        header('location:inscription_pfe_part1.php');
    }
}
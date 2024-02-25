<?php
ob_start();
require_once "../model/crudetudiant.php";
require_once "../model/etudiant.php";
session_start();

// redirect
require_once "auth/auth.php";
$auth = new auth();
if($auth->check()){
    header("location: inscription_pfe_part1.php");
}


$errorMessage = "";
$successMessage = "";

if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    if(isset($_POST["cin"],$_POST["mdp"] )){
        $cin=htmlspecialchars($_POST["cin"]);
        $password=htmlspecialchars($_POST["mdp"]); 
        if($cin != "" || $password != ""){

            $ce=new crudetudiant();
            $etudiant = $ce->getetudiantByCin($cin);
            $e1 = new etudiant($etudiant->id,$etudiant->cin,$etudiant->nom,$etudiant->prenom,$etudiant->email,$etudiant->id_classe,$etudiant->password);
            $verif = $ce->modifetudiant($e1);
            if($verif){
                $successMessage = "ajout avec succés";
            }else{
                $errorMessage = "Ressayez";
            }
        }
    }
}

/* get classes */
require_once "../model/classecrud.php";
$classes = (new crudclasse())->getAll();
/*--- ----*/

include "../view/inscription.php";
$contenu = ob_get_clean();


include "../home.php";

?>
<?php
ob_start();
require_once "../model/crudetudiant.php";
require_once "../model/etudiant.php";

$errorMessage = "";
$successMessage = "";

if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    if(isset($_POST["cin"],$_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["classe"],$_POST["mdp"])){
        $cin=htmlspecialchars($_POST["cin"]);
        $nom=htmlspecialchars($_POST["nom"]);
        $prenom=htmlspecialchars($_POST["prenom"]);
        $email=htmlspecialchars($_POST["email"]);
        $id_classe=htmlspecialchars($_POST["classe"]);
        $password=htmlspecialchars($_POST["mdp"]); 
        if($cin != "" && $nom != "" && $prenom != "" && $email != "" && $id_classe !="" && $password != ""){
            $etudiant=new etudiant(null,$cin,$nom,$prenom,$email,$id_classe,$password);
            $ce=new crudetudiant();
            $verif=$ce->getetudiantByCin($cin);
            if($verif){
                $errorMessage = "votre CIN $cin existe déja dans la base de données";
            }else{
                $ce->addetudiant($etudiant);
                $successMessage = "ajout avec succés";
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
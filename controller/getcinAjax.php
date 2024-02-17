<?php

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if( isset($_GET['cin']) ){
        $cin = $_GET['cin'];
        if(preg_match('/^[0-9]+$/', $cin)){
            require_once "../model/crudetudiant.php";
            $ce=new crudetudiant();
            $verif = $ce->getetudiantByCin($cin); 
            if($verif){
                echo "votre CIN $cin existe déja dans la base de données";
                exit();
            }
        }
        echo "";
    } else if( isset($_GET['getNameByCin']) ){
        $cin = $_GET['getNameByCin'];
        if(preg_match('/^[0-9]+$/', $cin)){
            require_once "../model/crudetudiant.php";
            $ce=new crudetudiant();
            $etudiant = $ce->getetudiantByCin($cin); 
            if($etudiant){
                echo $etudiant['nom']." ".$etudiant['prenom'];
                exit();
            }
        }
        echo "";
    }
}

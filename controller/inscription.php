<?php
require_once "../model/crudetudiant.php";
require_once "../model/etudiant.php";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cin=htmlspecialchars ($_POST["cin"]);
    $nom=htmlspecialchars ($_POST["nom"]);
    $prenom=htmlspecialchars ($_POST["prenom"]);
    $email=htmlspecialchars ($_POST["email"]);
    $id_classe=htmlspecialchars($_POST["classe"]);
    $password=htmlspecialchars($_POST["mdp"]); 
    $etudiant=new etudiant(null,$cin,$nom,$prenom,$email,$id_classe,$password);
    $ce=new crudetudiant();
    $verif=$ce-> recupereretudiantparcin($cin);
    if($verif){
        echo "<script>alert('Erreur : votre CIN $cin existe déja dans la base de données')</script>";
        header("location: ../home.php");
        exit();
    }else{
        $ce->addetudiant($etudiant);
        echo "<script>alert('ajout avec succés')</script>";
        header("location: ../home.php");
        exit();
    }
}
include "../view/inscription.php";
?>
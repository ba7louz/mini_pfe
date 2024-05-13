<?php
session_start();
ob_start();
require_once "../config/connexion.php";
require_once "../model/etudiant.php";
require_once "../model/crudetudiant.php";


$crudEtudiant = new crudetudiant();


$idEtudiant = $_GET['id']; 

$etudiantData = $crudEtudiant->getetudiantById($idEtudiant);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nouvelEmail = $_POST['nouvel_email']; 

    $crudEtudiant->modifierEmailEtudiant($idEtudiant, $nouvelEmail);

    header("Location: inscription_pfe_part1.php?message=email_changed");
    exit(); 
}

$contenu = ob_get_clean();

include "../home.php";

require_once "../view/profil.php";

?>

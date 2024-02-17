<?php
// Démarrer la session
session_start();

require_once "../model/crudetudiant.php";
require_once "../model/etudiant.php";

$obj = new config();
$connexion = $obj->getConnexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["cin"], $_POST["mdp"])) {
        $cin = htmlspecialchars($_POST["cin"]);
        $password = htmlspecialchars($_POST["mdp"]);
        if ($cin != "" && $password != "") {
            $sql = "SELECT * FROM etudiant WHERE cin='$cin' AND password='$password'";
            $res = $connexion->query($sql);
            $etudexist = $res->fetch();
            if ($etudexist) {
                $etudID = $etudexist['id'];
                
                // Stocker l'URL actuelle dans la session
                $_SESSION['url'] = $_SERVER['REQUEST_URI'];
                
                // Rediriger vers la page formulaire avec l'ID de l'étudiant
                header("location: ../view/formulaire.php?id=$etudID");
                exit();
            } else {
                echo "<script>alert('Identifiants incorrects. Veuillez réessayer.')</script>";
            }
        }
    }
}

// Inclure la vue du formulaire
include "../view/login.php";
$contenu=ob_get_clean();
include "../home.php";
?>

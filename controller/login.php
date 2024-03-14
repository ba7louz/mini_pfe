<?php
// Démarrer la session
session_start();

require_once "../model/crudetudiant.php";
require_once "../model/etudiant.php";

require_once "auth/auth.php";
$auth = new auth();
if($auth->check()){
    heaader("location: inscription_pfe_part1.php");
}

$obj = new config();
$connexion = $obj->getConnexion();
$errmsg="";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["cin"], $_POST["mdp"])) {
        $cin = htmlspecialchars($_POST["cin"]);
        $password = htmlspecialchars($_POST["mdp"]);
        if ($cin != "" && $password != "") {
            // Vérification pour les étudiants
            $sql = "SELECT * FROM etudiant WHERE cin='$cin' AND password='$password' ";
            $res = $connexion->query($sql);
            $etudexist = $res->fetch();
            if ($etudexist) {
                $payload = array(
                    "user_id" => $etudexist['id'],
                    "type" => 0  // 0 -> etudiant
                );
                $auth->login($payload);
                header("location: inscription_pfe_part1.php");
                exit();
            }
            
            $sql_admin = "SELECT * FROM admin WHERE login='$cin' AND password='$password' ";
            $res_admin = $connexion->query($sql_admin);
            $adminexist = $res_admin->fetch();
            if ($adminexist) {
                $payload = array(
                    "user_id" => $admin['id'],
                    "type" => 1  // 0 -> Admin
                );
                header("location: admin.php");
                exit();
            }
            $errmsg = "Identifiants ou Mot de passe incorrects";
        }
    }
}

// Inclure la vue du formulaire
include "../view/login.php";
$contenu = ob_get_clean();
include "../home.php";
?>

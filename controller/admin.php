<?php
session_start();
ob_start();
require_once "auth/auth.php";
$Logged = (new auth)->check();
require_once "../config/connexion.php";
$obj=new config();
$connexion=$obj->getConnexion();

$sql = "SELECT e1.nom AS nom1, e1.prenom AS prenom1, c1.nom_classe AS classe1,
               e2.nom AS nom2, e2.prenom AS prenom2, c2.nom_classe AS classe2,
               p.id AS pfe_id
        FROM pfe p
        INNER JOIN etudiant e1 ON p.id_etudiant1 = e1.id
        INNER JOIN classe c1 ON e1.id_classe = c1.id
        INNER JOIN etudiant e2 ON p.id_etudiant2 = e2.id
        INNER JOIN classe c2 ON e2.id_classe = c2.id";

$resultat = $connexion->query($sql);

$binomes = $resultat->fetchAll(PDO::FETCH_ASSOC);

include "../view/admin.php";
$contenu=ob_get_clean();
include "../home.php";

?>
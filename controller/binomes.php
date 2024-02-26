<?php
ob_start();

require_once "../config/connexion.php";
$obj=new config();
$connexion=$obj->getConnexion();

$pfe_id = $_GET['pfe_id'];

$sql = "SELECT p.encadrant_iset, p.nom_entreprise, p.encadrant_entreprise, p.titre, p.fiche_pfe, 
                e1.cin AS cin1,e1.nom AS nom1, e1.prenom AS prenom1, e1.email AS email1, e1.password AS password1, e1.cin AS cin1, 
                e1.cin AS cin2,e2.nom AS nom2, e2.prenom AS prenom2, e2.email AS email2, e2.password AS password2, e2.cin AS cin2
        FROM pfe p
        INNER JOIN etudiant e1 ON p.id_etudiant1 = e1.id
        INNER JOIN etudiant e2 ON p.id_etudiant2 = e2.id
        WHERE p.id = :pfe_id";


$stmt = $connexion->prepare($sql);
$stmt->bindParam(':pfe_id', $pfe_id);
$stmt->execute();
$binome = $stmt->fetch(PDO::FETCH_ASSOC);

$etudiant1 = array(
    'cin' => $binome['cin1'],
    'nom' => $binome['nom1'],
    'prenom' => $binome['prenom1'],
    'email' => $binome['email1']
);

$etudiant2 = array(
    'cin' => $binome['cin2'],
    'nom' => $binome['nom2'],
    'prenom' => $binome['prenom2'],
    'email' => $binome['email2']
);


include "../view/binomes.php";
$contenu=ob_get_clean();
include "../home.php";
?>

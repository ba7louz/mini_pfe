<?php
require_once "../config/connexion.php";
require_once "../model/pfecrud.php";

require_once "../config/connexion.php";
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require_once "../model/crudetudiant.php";
require_once "../model/classecrud.php";
session_start();
ob_start();
$ce = new crudetudiant();
require_once "auth/auth.php";
$auth = new auth();
if(!$auth->check(1)){
    header("location: login.php");
}


$obj = new config();
$connexion = $obj->getConnexion();

if(isset($_GET['pfe_id'])) {
    $pfe_id = $_GET['pfe_id'];

    $result = ( (new crud_pfe())->GetstartById($pfe_id) );
    
    if( $result ) {
        // Récupérer le chemin de la fiche PFE et les données des étudiants
        $fiche_pfe_path = $result['fiche_pfe'];


        $etudiant1 = $ce ->getetudiantById($result["id_etudiant1"]);
        $c1  = (new crudclasse())->getById( $etudiant1["id_classe"] );
        $etudiant2 = null ;
        $nom_etudiant2 = '';
        if($result["id_etudiant2"]){
            $etudiant2 =  $ce->getetudiantById($result["id_etudiant2"]);
            $c2 = (new crudclasse())->getById( $etudiant2 ["id_classe"] );
            $nom_etudiant2 = $etudiant2['nom'] . '_' . $$etudiant2['prenom'];
        }
        $nom_etudiant1 = $etudiant1['nom'] . '_' . $etudiant1['prenom'];
        

        // Vérifier si le fichier existe
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename='.$nom_etudiant1.'_'.$nom_etudiant2.'_PFE.pdf');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        header('Content-Length: ' . strlen($fiche_pfe_path));
        echo ($fiche_pfe_path);
        exit; // Arrêter l'exécution du script après le téléchargement du fichier
         
    } else {
        echo "Aucun enregistrement PFE trouvé.";
    }
} else {
    echo "L'identifiant PFE n'est pas spécifié dans l'URL.";
}
?>

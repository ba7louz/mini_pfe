<?php
require_once "../config/connexion.php";
require_once "../model/pfecrud.php";
$obj = new config();
$connexion = $obj->getConnexion();

if(isset($_GET['pfe_id'])) {
    $pfe_id = $_GET['pfe_id'];

    $result = ((new crud_pfe())->GetstartById($pfe_id) );
    
    if( $result ) {
        // Récupérer le chemin de la fiche PFE et les données des étudiants
        $fiche_pfe_path = $result['fiche_pfe'];
        $nom_etudiant1 = $result['nom1'] . '_' . $result['prenom1'];
        $nom_etudiant2 = $result['nom2'] . '_' . $result['prenom2'];

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

<?php
require_once "../config/connexion.php";
require_once "../model/pfecrud.php";
$obj = new config();
$connexion = $obj->getConnexion();

if(isset($_GET['pfe_id'])) {
    $pfe_id = $_GET['pfe_id'];

    $result = ((new crud_pfe())->GetById($pfe_id) );
    
    if( $result ) {
        // Récupérer le chemin de la fiche PFE et les données des étudiants
        $fiche_pfe_path = $result['fiche_pfe'];
        $nom_etudiant1 = $result['nom1'] . '_' . $result['prenom1'];
        $nom_etudiant2 = $result['nom2'] . '_' . $result['prenom2'];


        // Vérifier si le fichier existe
        if(file_exists($fiche_pfe_path)) {
            // Télécharger la fiche PFE avec un nom de fichier personnalisé
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment; filename='$nom_etudiant1-$nom_etudiant2-PFE.pdf'");
            readfile($fiche_pfe_path);
            exit; // Arrêter l'exécution du script après le téléchargement du fichier
            
        } else {
            echo "La fiche PFE n'existe pas.";
        }
    } else {
        echo "Aucun enregistrement PFE trouvé.";
    }
} else {
    echo "L'identifiant PFE n'est pas spécifié dans l'URL.";
}
?>

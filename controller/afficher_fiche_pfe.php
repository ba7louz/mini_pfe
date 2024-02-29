<?php
require_once "../config/connexion.php";
$obj = new config();
$connexion = $obj->getConnexion();

if(isset($_GET['pfe_id'])) {
    $pfe_id = $_GET['pfe_id'];

    // Préparer la requête SQL pour récupérer la fiche PFE et les données des étudiants
    $sql = "SELECT 
                p.fiche_pfe,
                e1.nom AS nom1,
                e1.prenom AS prenom1,
                e2.nom AS nom2,
                e2.prenom AS prenom2
            FROM 
                pfe p
            INNER JOIN 
                etudiant e1 ON p.id_etudiant1 = e1.id
            INNER JOIN 
                etudiant e2 ON p.id_etudiant2 = e2.id
            WHERE 
                p.id = :pfe_id";

    // Préparer et exécuter la requête
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':pfe_id', $pfe_id);
    $stmt->execute();

    // Vérifier si des résultats ont été retournés
    if($stmt->rowCount() > 0) {
        // Récupérer le chemin de la fiche PFE et les données des étudiants
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
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

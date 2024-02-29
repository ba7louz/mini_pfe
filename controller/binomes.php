<?php
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../config/connexion.php";
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

$obj = new config();
$connexion = $obj->getConnexion();

// Vérifier si l'identifiant PFE est passé dans l'URL
if(isset($_GET['pfe_id'])) {
    $pfe_id = $_GET['pfe_id'];

    // Préparer la requête SQL
    $sql = "SELECT 
                p.encadrant_iset, 
                p.nom_entreprise, 
                p.encadrant_entreprise, 
                p.titre, 
                p.fiche_pfe,
                p.date_demande,
                p.date_reponse,
                p.validite,
                e1.cin AS cin1,
                e1.nom AS nom1,
                e1.prenom AS prenom1,
                e1.email AS email1,
                e2.cin AS cin2,
                e2.nom AS nom2,
                e2.prenom AS prenom2,
                e2.email AS email2
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
        // Récupérer les données du binôme
        $binome = $stmt->fetch(PDO::FETCH_ASSOC);

        // Créer les tableaux pour les étudiants
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

        // Vérifier si le bouton Refuser ou Accepter a été cliqué
        if(isset($_POST['action'])) {
            $action = $_POST['action'];
            if($action == 'accepter') {
                $mailContent = isset($_POST['mailContent']) ? $_POST['mailContent'] : '';
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = 'ramisassi11@gmail.com';
                $mail->Password = 'ryfj ztxy pwyp ojyk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom("ramisassi11@gmail.com");
                $mail->addAddress($etudiant1['email']);
                $mail->isHTML(true);
                $mail->Subject = "Acceptation de votre PFE";
                $mail->Body = "Votre PFE a été accepté.";
                $mail->send();
                echo "<script>alert('sent')</script>";
            }elseif($action == 'refuser'){
                $mailContent = isset($_POST['mailContent']) ? $_POST['mailContent'] : '';
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = 'ramisassi11@gmail.com';
                $mail->Password = 'ryfj ztxy pwyp ojyk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom("ramisassi11@gmail.com");
                $mail->addAddress($etudiant1['email']);
                $mail->isHTML(true);
                $mail->Subject = "refus de votre PFE";
                $mail->Body = $mailCotent;
                $mail->send();
                echo "<script>alert('sent')</script>";
            }
        }

        // Inclure la vue
        include "../view/binomes.php";
    } else {
        // Gérer le cas où aucun binôme n'est trouvé
        echo "Aucun binôme trouvé pour l'identifiant PFE spécifié.";
    }
} else {
    // Gérer le cas où l'identifiant PFE n'est pas passé dans l'URL
    echo "L'identifiant PFE n'est pas spécifié dans l'URL.";
}

// Nettoyer la mémoire tampon et inclure le fichier home.php
$contenu = ob_get_clean();
include "../home.php";
?>

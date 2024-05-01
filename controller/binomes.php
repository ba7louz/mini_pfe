<?php
session_start();
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../config/connexion.php";
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require_once "../model/pfecrud.php";

require_once "auth/auth.php";
$Logged = (new auth())->check(1);

$obj = new config();
$connexion = $obj->getConnexion();

// Vérifier si l'identifiant PFE est passé dans l'URL
if (isset($_GET['pfe_id'])) {
    $pfe_id = $_GET['pfe_id'];

    // Préparer la requête SQL
    $binome = ((new crud_pfe())->GetStartById($pfe_id) );

    // Vérifier si des résultats ont été retournés
    if ($binome) {

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
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
            if ($action == 'accepter') {
                $sql_update_validite_date = "UPDATE pfe SET validite = 1, date_reponse = :date_reponse WHERE id = :pfe_id";
                $stmt_update_validite_date = $connexion->prepare($sql_update_validite_date);
                $current_date = date("Y-m-d H:i:s");
                $stmt_update_validite_date->bindParam(':date_reponse', $current_date);
                $stmt_update_validite_date->bindParam(':pfe_id', $pfe_id);
                $stmt_update_validite_date->execute();
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
                header("location:admin.php");
            } elseif ($action == 'refuser') {
                $sql_update_validite_date = "UPDATE pfe SET validite = -1, date_reponse = :date_reponse WHERE id = :pfe_id";
                $stmt_update_validite_date = $connexion->prepare($sql_update_validite_date);
                $current_date = date("Y-m-d H:i:s");
                $stmt_update_validite_date->bindParam(':date_reponse', $current_date);
                $stmt_update_validite_date->bindParam(':pfe_id', $pfe_id);
                $stmt_update_validite_date->execute();
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
                $mail->Body = "Votre demande d'inscrit a été refusé .";
                $mail->send();
                echo "<script>alert('sent')</script>";
                header("location:admin.php");
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

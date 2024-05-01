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

if (isset($_GET['pfe_id'])) {
    $pfe_id = $_GET['pfe_id'];

    $binome = ((new crud_pfe())->GetStartById($pfe_id) );

    if ($binome) {
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

        if (isset($_POST['action'])) {
            $action = $_POST['action'];

            $mail = (new config())->getMailer();
            $mail->Subject = "Reponse de votre PFE";

            if ($action == 'accepter') {
                
                $res6 = (new crud_pfe())->Accepter($pfe_id);
                if ($res6){
                    $mail->addAddress($etudiant1['email']);
                    $mail->Body = "Votre PFE a été accepté.";
                    $mail->send();
                    header("location:admin.php");
                } else {
                    echo "<script>alert('some error is happend')</script>";
                }
                
            } elseif ($action == 'refuser') {
                
                $res6 = (new crud_pfe())->Refuser($pfe_id);
                if ($res6){
                $mail->addAddress($etudiant1['email']);
                
                $mail->Body = "Votre demande d'inscrit a été refusé .";
                $mail->send();
                header("location:admin.php");
                }else{
                    echo "<script>alert('Some error is happend')</script>";
                }
                
                
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

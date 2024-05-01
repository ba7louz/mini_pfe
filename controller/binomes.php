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
require_once "../model/crudetudiant.php";
require_once "../model/classecrud.php";

$ce = new crudetudiant();

require_once "auth/auth.php";
$Logged = (new auth())->check(1);

$obj = new config();
$connexion = $obj->getConnexion();

if (isset($_GET['pfe_id'])) {
    $pfe_id = $_GET['pfe_id'];

    $binome = ((new crud_pfe())->GetstartById($pfe_id) );

    if ($binome) {
        $etudiant1 = $ce ->getetudiantById($binome["id_etudiant1"]);
        $c1  = (new crudclasse())->getById( $etudiant1["id_classe"] );
        $etudiant2 = null ;
        if($binome["id_etudiant2"]){
            $etudiant2 =  $ce->getetudiantById($binome["id_etudiant2"]);
            $c2 = (new crudclasse())->getById( $etudiant2 ["id_classe"] );
        }

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

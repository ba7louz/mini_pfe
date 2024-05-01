<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class config
    { 
        public function getConnexion(){
            $dns="mysql:host=localhost;dbname=gestion_pfe";
            $utilisateur="root";
            $password="";
            $connexion=new PDO($dns,$utilisateur,$password);
            return $connexion;
    }
    public function getMailer(){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = 'ramisassi11@gmail.com';
        $mail->Password = 'ryfj ztxy pwyp ojyk';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom("ramisassi11@gmail.com");
        $mail->isHTML(true);
        return $mail;
    }
}
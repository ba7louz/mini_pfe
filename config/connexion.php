<?php
    class config
    {
        
        public function getConnexion(){
            
            $dns="mysql:host=localhost;dbname=gestion_pfe";
            $utilisateure="root";
            $password="";
            $connexion=new PDO($dns,$utilisateur,$password);
            return $connexion;

       
    }
   
        

        

    }
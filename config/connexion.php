<?php
    class config
    {
        
        public function getConnexion(){
            
            $dns="mysql:host=localhost;dbname=gestion_pfe";
            $utilisateur="root";
            $password="";
            $connexion=new PDO($dns,$utilisateur,$password);
            return $connexion;

       
    }
   
        

        

    }
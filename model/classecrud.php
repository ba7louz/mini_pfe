<?php
    require_once "../config/connexion.php";
    class crudclasse{
        private $connexion;
        public function __construct(){
            $obj = new config();
            $this->connexion = $obj->getConnexion();
        }
        public function getAll(){
            $sql = "select * from classe";
            $res=$this->connexion->query($sql);
            return $res->fetchALL(PDO::FETCH_ASSOC);
        }
    }
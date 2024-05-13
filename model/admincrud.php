<?php
    require_once "../config/connexion.php";
    class admincrud{
        private $connexion;
        public function __construct(){
            $obj = new config();
            $this->connexion = $obj->getConnexion();
        }
        public function Auth($login,$password){
            $sql = "select * from admin where login = '$login' and password = '$password'";
            $res=$this->connexion->query($sql);
            return $res->fetchALL(PDO::FETCH_ASSOC);
        }


        public function getAll(){
            $sql = "select * from admin";
            $res=$this->connexion->query($sql);
            return $res->fetchALL(PDO::FETCH_ASSOC);
        }
        public function getById( $id ){
            $sql = "select * from admin where id = $id";
            $res=$this->connexion->query($sql);
            return $res->fetch(PDO::FETCH_ASSOC);
        }
    }
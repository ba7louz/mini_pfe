<?php
    require_once "../config/connexion.php";
    require_once "etudiant.php";
    class crudetudiant{
        private $connexion;
        public function __construct(){
            $obj=new config();
            $this->connexion=$obj->getConnexion();
        }
        public function getetudiantByCin($cin){
            $sql="select * from etudiant where cin=$cin";
            $res=$this->connexion->query($sql);
            return  $res->fetch(PDO::FETCH_ASSOC);
        }
        
        public function addetudiant(etudiant $et){
            $sql="insert into etudiant values(
                null,
                {$et->getCin()},
                '{$et->getNom()}',
                '{$et->getPrenom()}',
                '{$et->getEmail()}',
                {$et->getIdclasse()},
                '{$et->getPassword()}'
                )";
                $res=$this->connexion->exec($sql);
                return $res;
        }
    }
?>
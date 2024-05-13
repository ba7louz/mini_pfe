<?php
    require_once "../config/connexion.php";
    require_once "etudiant.php";
    class crudetudiant{
        private $connexion;
        public function __construct(){
            $obj=new config();
            $this->connexion=$obj->getConnexion();
        }

        
        public function getetudiantById($id){
            $sql="select * from etudiant where id=$id";
            $res=$this->connexion->query($sql);
            return  $res->fetch(PDO::FETCH_ASSOC);
        }

        public function getetudiantByCin($cin){
            $sql="select * from etudiant where cin=$cin";
            $res=$this->connexion->query($sql);
            return  $res->fetch(PDO::FETCH_ASSOC);
        }
        public function modifetudiant(etudiant $et){
            $sql="  
                    update etudiant set
                    cin = {$et->getCin()},
                    nom = '{$et->getNom()}',
                    prenom ='{$et->getPrenom()}',
                    email = '{$et->getEmail()}',
                    id_classe ={$et->getIdclasse()},
                    password = '{$et->getPassword()}'
                    where id = {$et->getId()}
            ";
            echo "$sql";
                $res=$this->connexion->exec($sql);
                return $res;
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
        public function modifierEmailEtudiant($id, $nouvelEmail){
            $sql = "UPDATE etudiant SET email = '{$nouvelEmail}' WHERE id = {$id}";
            $res = $this->connexion->exec($sql);
            return $res;
        }
        
    }
?>
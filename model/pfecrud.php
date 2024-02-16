<?php
    require_once "../config/connexion.php";
    require_once "pfe.php";
    class crud_pfe{
        private $connexion;
        public function __construct(){
            $obj = new config();
            $this->connexion = $obj->get_connection();
        }
        public function AjoutPfe(pfe $pfe){
            $sql = "    insert into pfe
                        values( 
                            null,
                            {$pfe->getIdEtudiant1()} ,  
                            {$pfe->getIdEtudiant2()},
                            '{$pfe->getEncadrantIset()}',
                            '{$pfe->getNomEntreprise()}',
                            '{$pfe->getEncadrantEntreprise()}',
                            '{$pfe->getTitre()}',
                            {$pfe->getFichePfe()},
                            0
                        ) ";
            return $this->connexion->exec($sql);
        }

    }

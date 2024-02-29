<?php
    require_once "../config/connexion.php";
    require_once "pfe.php";
    class crud_pfe{
        private $connexion;
        public function __construct(){
            $obj = new config();
            $this->connexion = $obj->getConnexion();
        }
        public function AjoutPfe(pfe $pfe){
            $stmt = $this->connexion->prepare("INSERT INTO pfe VALUES (
                    null,
                    ? , ?, ?,?,?,?,?,?,
                    0,
                    NOW(),
                    null
                )"
            );
            $stmt->bindParam(1, $pfe->id_etudiant1);
            $stmt->bindParam(2, $pfe->id_etudiant2);
            $stmt->bindParam(3, $pfe->encadrant_iset);
            $stmt->bindParam(4, $pfe->nom_entreprise);
            $stmt->bindParam(5, $pfe->encadrant_entreprise);
            $stmt->bindParam(6, $pfe->titre);
            $stmt->bindParam(7, $pfe->sujet); 
            $stmt->bindParam(8, $pfe->fiche_pfe, PDO::PARAM_LOB);
            return $stmt->execute();
        }
        public function getPfeByEtudiant($id){
            $sql = "select ";
        }

    }

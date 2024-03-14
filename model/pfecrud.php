<?php
    require_once "../config/connexion.php";
    require_once "pfe.php";
    class crud_pfe{
        private $connexion;
        public function __construct(){
            $obj = new config();
            $this->connexion = $obj->getConnexion();
        }
        public function getPfeByIdEtudiant($id){
            $sql="  select * from pfe 
                    where   id_etudiant1=$id 
                            or id_etudiant2=$id
                    ";
            $res=$this->connexion->query($sql);
            return  $res->fetch(PDO::FETCH_ASSOC);
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
        public function EditPfe(pfe $pfe){
            $stmt = $this->connexion->prepare(
                "
                    update pfe
                    set encadrant_iset = ?,
                    nom_entreprise = ?,
                    encadrant_entreprise = ?,
                    titre = ?,
                    sujet = ?
                    where id = ?
                "
            );
            $encadrantIset = $pfe->encadrant_iset == '' ? null : $pfe->getEncadrantIset();
            $nomEntreprise = $pfe->nom_entreprise == '' ? null : $pfe->getNomEntreprise() ;
            $encadrantEntreprise = $pfe->encadrant_entreprise == ''? null : $pfe->getEncadrantEntreprise();
            $titre = $pfe->titre  == ''? null : $pfe->getTitre();
            $sujet = $pfe->sujet  == ''? null : $pfe->getSujet();
            $id =  $pfe->getId();

            $stmt->bindParam(1, $encadrantIset);
            $stmt->bindParam(2, $nomEntreprise);
            $stmt->bindParam(3,$encadrantEntreprise ) ;
            $stmt->bindParam(4,$titre );
            $stmt->bindParam(5,  $sujet ); 
            $stmt->bindParam(6,$id);
            $stmt->execute();

            if($pfe->fiche_pfe){
                $stmt = $this->connexion->prepare(
                    "
                        update from pfe
                        fiche_pfe = ?
                        where id = ?
                    "
                );
                $id =  $pfe->getId();
                $pdf = $pfe->getFichePfe();
                $stmt->bindParam(1, $pdf , PDO::PARAM_LOB);
                $stmt->bindParam(2, $id);
                $stmt->execute();
            }
    }
}

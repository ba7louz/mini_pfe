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
        public function ListPfe(){
            $sql = "SELECT e1.nom AS nom1, e1.prenom AS prenom1, c1.nom_classe AS classe1,
                        e2.nom AS nom2, e2.prenom AS prenom2, c2.nom_classe AS classe2,
                        p.id AS pfe_id,
                        p.date_reponse as DateD,
                        p.validite
                    FROM pfe p
                    INNER JOIN etudiant e1 ON p.id_etudiant1 = e1.id
                    INNER JOIN classe c1 ON e1.id_classe = c1.id
                    INNER JOIN etudiant e2 ON p.id_etudiant2 = e2.id
                    INNER JOIN classe c2 ON e2.id_classe = c2.id";
            $res=$this->connexion->query($sql);
            $ret = $res->fetchAll(PDO::FETCH_ASSOC);
            return $ret ;
        }
        public function GetById($id){
            $sql = "SELECT 
                        p.fiche_pfe,
                        e1.nom AS nom1,
                        e1.prenom AS prenom1,
                        e2.nom AS nom2,
                        e2.prenom AS prenom2
                    FROM 
                        pfe p
                    INNER JOIN 
                        etudiant e1 ON p.id_etudiant1 = e1.id
                    INNER JOIN 
                        etudiant e2 ON p.id_etudiant2 = e2.id
                    WHERE 
                        p.id = " .$id ;
                $res=$this->connexion->query($sql);
                $ret = $res->fetch(PDO::FETCH_ASSOC);
                return $ret ;
        }
        public function GetstartById($id){
            $sql = "SELECT 
                p.encadrant_iset, 
                p.nom_entreprise, 
                p.encadrant_entreprise, 
                p.titre, 
                p.fiche_pfe,
                p.date_demande,
                p.date_reponse,
                p.validite,
                e1.cin AS cin1,
                e1.nom AS nom1,
                e1.prenom AS prenom1,
                e1.email AS email1,
                e2.cin AS cin2,
                e2.nom AS nom2,
                e2.prenom AS prenom2,
                e2.email AS email2
            FROM 
                pfe p
            INNER JOIN 
                etudiant e1 ON p.id_etudiant1 = e1.id
            INNER JOIN 
                etudiant e2 ON p.id_etudiant2 = e2.id
            WHERE 
                p.id = ".$id;
            $res=$this->connexion->query($sql);
            $ret = $res->fetch(PDO::FETCH_ASSOC);
            return $ret ;

        }
        public function Refuser($id){
            $sql = "UPDATE pfe SET validite = -1, date_reponse = NOW() WHERE id = :pfe_id";
            echo $sql;
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':pfe_id', $pfe_id);
            $stmt->execute();
        }
        public function Accepter($id){
            $sql = "UPDATE pfe SET validite = 1, date_reponse = NOW() WHERE id = :pfe_id";
                $stmt = $this->connexion->prepare($sql);
                $stmt->bindParam(':pfe_id', $pfe_id);
                $stmt->execute();
        }
}

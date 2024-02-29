<?php 
    class pfe{
        public $id;
        public $id_etudiant1;
        public $id_etudiant2;
        public $encadrant_iset;
        public $nom_entreprise;
        public $encadrant_entreprise;
        public $titre;
        public $sujet;
        public $fiche_pfe;
        public $validite;
        public $date_demande;
        public $date_reponse;


        public function __construct(        
                    $id,
                    $id_etudiant1,
                    $id_etudiant2,
                    $encadrant_iset,
                    $nom_entreprise,
                    $encadrant_entreprise,
                    $titre,
                    $sujet ,
                    $fiche_pfe,
                    $validite,
                    $date_demande,
                    $date_reponse
            ){
                $this->id = $id;
                $this->id_etudiant1 = $id_etudiant1;
                $this->id_etudiant2=$id_etudiant2;
                $this->encadrant_iset=$encadrant_iset;
                $this->nom_entreprise=$nom_entreprise;
                $this->encadrant_entreprise = $encadrant_entreprise;
                $this->titre=$titre;
                $this->sujet=$sujet;
                $this->fiche_pfe=$fiche_pfe;
                $this->validite=$validite;
                $this->date_demande = $date_demande;
                $this->date_reponse = $date_reponse;
            }

        /**
         * Get the value of id
         */
        public function getId() {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self {
                $this->id = $id;
                return $this;
        }

        /**
         * Get the value of id_etudiant1
         */
        public function getIdEtudiant1() {
                return $this->id_etudiant1;
        }

        /**
         * Set the value of id_etudiant1
         */
        public function setIdEtudiant1($id_etudiant1): self {
                $this->id_etudiant1 = $id_etudiant1;
                return $this;
        }

        /**
         * Get the value of id_etudiant2
         */
        public function getIdEtudiant2() {
                return $this->id_etudiant2;
        }

        /**
         * Set the value of id_etudiant2
         */
        public function setIdEtudiant2($id_etudiant2): self {
                $this->id_etudiant2 = $id_etudiant2;
                return $this;
        }

        /**
         * Get the value of encadrant_iset
         */
        public function getEncadrantIset() {
                return $this->encadrant_iset;
        }

        /**
         * Set the value of encadrant_iset
         */
        public function setEncadrantIset($encadrant_iset): self {
                $this->encadrant_iset = $encadrant_iset;
                return $this;
        }

        /**
         * Get the value of nom_entreprise
         */
        public function getNomEntreprise() {
                return $this->nom_entreprise;
        }

        /**
         * Set the value of nom_entreprise
         */
        public function setNomEntreprise($nom_entreprise): self {
                $this->nom_entreprise = $nom_entreprise;
                return $this;
        }

        /**
         * Get the value of titre
         */
        public function getTitre() {
                return $this->titre;
        }

        /**
         * Set the value of titre
         */
        public function setTitre($titre): self {
                $this->titre = $titre;
                return $this;
        }

        /**
         * Get the value of fiche_pfe
         */
        public function getFichePfe() {
                return $this->fiche_pfe;
        }

        /**
         * Set the value of fiche_pfe
         */
        public function setFichePfe($fiche_pfe): self {
                $this->fiche_pfe = $fiche_pfe;
                return $this;
        }

        /**
         * Get the value of validite
         */
        public function getValidite() {
                return $this->validite;
        }

        /**
         * Set the value of validite
         */
        public function setValidite($validite): self {
                $this->validite = $validite;
                return $this;
        }

        /**
         * Get the value of encadrant_entreprise
         */
        public function getEncadrantEntreprise() {
                return $this->encadrant_entreprise;
        }

        /**
         * Set the value of encadrant_entreprise
         */
        public function setEncadrantEntreprise($encadrant_entreprise): self {
                $this->encadrant_entreprise = $encadrant_entreprise;
                return $this;
        }

        /**
         * Get the value of sujet
         */
        public function getSujet() {
                return $this->sujet;
        }

        /**
         * Set the value of sujet
         */
        public function setSujet($sujet): self {
                $this->sujet = $sujet;
                return $this;
        }

        /**
         * Get the value of date_demande
         */
        public function getDateDemande() {
                return $this->date_demande;
        }

        /**
         * Set the value of date_demande
         */
        public function setDateDemande($date_demande): self {
                $this->date_demande = $date_demande;
                return $this;
        }

        /**
         * Get the value of date_reponse
         */
        public function getDateReponse() {
                return $this->date_reponse;
        }

        /**
         * Set the value of date_reponse
         */
        public function setDateReponse($date_reponse): self {
                $this->date_reponse = $date_reponse;
                return $this;
        }
    }
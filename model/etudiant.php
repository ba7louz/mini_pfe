<?php
class etudiant {
    public $id;
    public $cin;
    public $nom;
    public $prenom;
    public $email;
    public $id_classe;
    public $password;
    public  function __construct($id,$cin,$nom,$prenom,$email,$id_classe,$password){
        $this->id=$id;
        $this->cin=$cin;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->id_classe=$id_classe;
        $this->password=$password;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Get the value of cin
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set the value of cin
     */
    public function setCin($cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom($prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

     /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }
   

    /**
     * Get the value of id_classe
     */
    public function getIdClasse()
    {
        return $this->id_classe;
    }

    /**
     * Set the value of id_classe
     */
    public function setIdClasse($id_classe): self
    {
        $this->id_classe = $id_classe;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    

   
}
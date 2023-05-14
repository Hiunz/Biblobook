<?php

class Utilisateur {

    private $id_utilisateur;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $tel_fixe;
    private $tel_portable;
    private $rue;
    private $cp;
    private $ville;
    private $admin;


    public function __construct($id_utilisateur, $nom, $prenom, $email, $mdp, $tel_fixe, $tel_portable, $rue, $cp, $ville, $admin = false)
    {
        $this->id_utilisateur = $id_utilisateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->tel_fixe = $tel_fixe;
        $this->tel_portable = $tel_portable;
        $this->rue = $rue;
        $this->cp = $cp;
        $this->ville = $ville;
        $this->admin = $admin;
    }

    public static function find($utilisateurId)
    {
    }


    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
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
     *
     * @return  self
     */ 
    public function setNom($nom)
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
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
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
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of tel_fixe
     */ 
    public function getTel_fixe()
    {
        return $this->tel_fixe;
    }

    /**
     * Set the value of tel_fixe
     *
     * @return  self
     */ 
    public function setTel_fixe($tel_fixe)
    {
        $this->tel_fixe = $tel_fixe;

        return $this;
    }

    /**
     * Get the value of tel_portable
     */ 
    public function getTel_portable()
    {
        return $this->tel_portable;
    }

    /**
     * Set the value of tel_portable
     *
     * @return  self
     */ 
    public function setTel_portable($tel_portable)
    {
        $this->tel_portable = $tel_portable;

        return $this;
    }

    /**
     * Get the value of rue
     */ 
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set the value of rue
     *
     * @return  self
     */ 
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get the value of cp
     */ 
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     *
     * @return  self
     */ 
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of admin
     */ 
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set the value of admin
     *
     * @return  self
     */ 
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get the value of mdp
     */ 
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */ 
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }
}

<?php

class Utilisateur {

    private $nom;
    private $prenom;
    private $email;
    private $tel_fixe;
    private $tel_portable;
    private $rue;
    private $cp;
    private $ville;
    private $admin;

    
    public function __construct($id_utilisateur, $nom, $prenom, $email, $mdp, $tel_fixe, $tel_portable, $rue, $cp, $ville, $admin)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
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


}
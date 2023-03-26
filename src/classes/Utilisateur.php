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

    /**
     * @param $nom
     * @param $prenom
     * @param $email
     * @param $tel_fixe
     * @param $tel_portable
     * @param $rue
     * @param $cp
     * @param $ville
     * @param $admin
     */
    public function __construct($nom, $prenom, $email, $tel_fixe, $tel_portable, $rue, $cp, $ville, $admin)
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


}
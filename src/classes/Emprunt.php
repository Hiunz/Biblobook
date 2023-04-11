<?php

class Emprunt {

    private $idEmprunt;
    private $date;
    private $delai;
    private $livre;
    private $utilisateur;

    public function __construct($date,$delai,$livre,$utilisateur,$id = null) {
        $this->date = $date;
        $this->delai = $delai;
        $this->livre = $livre;
        $this->utilisateur = $utilisateur;
        $this->idEmprunt = $id;
    }

    /**
     * @return mixed
     */
    public function getDate() { return $this->date; }

    /**
     * @param mixed $date
     */
    public function setDate($date) { $this->date = $date; }

    /**
     * @return mixed
     */
    public function getDelai() { return $this->delai; }

    /**
     * @param mixed $delai
     */
    public function setDelai($delai) { $this->delai = $delai; }



    /**
     * Get the value of idEmprunt
     */ 
    public function getIdEmprunt()
    {
        return $this->idEmprunt;
    }

    /**
     * Get the value of livre
     */ 
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * Get the value of utilisateur
     */ 
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}

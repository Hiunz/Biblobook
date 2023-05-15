<?php

class Emprunt {

    private $idEmprunt;
    private $date_start;
    private $date_end;
    private $utilisateur;
    private $livre;
    private $exemplaire;

    public function __construct($date_start,$date_end,$livre,$utilisateur,$id = null) {
        $this->date_start = $date_start;
        $this->date_end = $date_end;
        $this->livre = $livre;
        $this->utilisateur= $utilisateur;
        $this->idEmprunt = $id;
    }


    /**
     * @return mixed|null
     */
    public function getIdEmprunt()
    {
        return $this->idEmprunt;
    }

    /**
     * @param mixed|null $idEmprunt
     */
    public function setIdEmprunt($idEmprunt)
    {
        $this->idEmprunt = $idEmprunt;
    }

    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->date_start;
    }

    /**
     * @param mixed $date_start
     */
    public function setDateStart($date_start)
    {
        $this->date_start = $date_start;
    }

    /**
     * @return mixed
     */
    public function getDateEnd()
    {
        return $this->date_end;
    }

    /**
     * @param mixed $date_end
     */
    public function setDateEnd($date_end)
    {
        $this->date_end = $date_end;
    }

    /**
     * @param mixed $ref_exemplaire
     */
    public function setRefExemplaire($ref_exemplaire)
    {
        $this->exemplaire = ExemplaireController::getExemplaire($ref_exemplaire);
    }

    

    /**
     * @return mixed
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * @param mixed $utilisateur
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;
    }

    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * Get the value of exemplaire
     */ 
    public function getExemplaire()
    {
        return $this->exemplaire;
    }
}

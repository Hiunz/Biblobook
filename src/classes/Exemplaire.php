<?php

class Exemplaire
{
    private $idExemplaire;
    private $Livre;

    public function __construct($idExemplaire, $Livre){
        $this->idExemplaire = $idExemplaire;
        $this->Livre = $Livre;
}

    /**
     * @return mixed
     */
    public function getIdExemplaire()
    {
        return $this->idExemplaire;
    }

    /**
     * @return mixed
     */
    public function getLivre()
    {
        return $this->Livre;
    }

    /**
     * @param mixed $refLivre
     */
    public function setLivre($refLivre)
    {
        $this->Livre = $refLivre;
    }
}

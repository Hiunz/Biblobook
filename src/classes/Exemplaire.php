<?php

class Exemplaire
{
    private $idExemplaire;
    private $refLivre;
    private $refEdition;

    public function __construct($idExemplaire, $refLivre, $refEdition){
        $this->id_exemplaire = $idExemplaire;
        $this->refLivre = $refLivre;
        $this->refEdition = $refEdition;
}

    /**
     * @return mixed
     */
    public function getIdExemplaire()
    {
        return $this->id_exemplaire;
    }

    /**
     * @return mixed
     */
    public function getRefLivre()
    {
        return $this->refLivre;
    }

    /**
     * @param mixed $refLivre
     */
    public function setRefLivre($refLivre)
    {
        $this->refLivre = $refLivre;
    }

    /**
     * @return mixed
     */
    public function getRefEdition()
    {
        return $this->refEdition;
    }

    /**
     * @param mixed $refEdition
     */
    public function setRefEdition($refEdition)
    {
        $this->refEdition = $refEdition;
    }
}

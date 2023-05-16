<?php

class Exemplaire
{
    private $id;
    private $Livre;

    public function __construct($idExemplaire, $Livre){
        $this->id = $idExemplaire;
        $this->Livre = $Livre;
}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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

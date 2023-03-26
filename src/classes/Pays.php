<?php
class Pays {

    private $nom;

    /**
     * @param $id_pays
     * @param $nom
     */
    public function __construct($nom)
    {
        $this->nom = $nom;
    }
}
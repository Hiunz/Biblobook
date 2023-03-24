<?php
class Pays {
    private $id_pays;
    private $nom;

    /**
     * @param $id_pays
     * @param $nom
     */
    public function __construct($id_pays, $nom)
    {
        $this->id_pays = $id_pays;
        $this->nom = $nom;
    }
}
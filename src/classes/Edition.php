<?php
class Edition {

    private $nom;


    public function __construct($nom) {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getNom() { return $this->nom; }

    /**
     * @param mixed $nom
     */
    public function setNom($nom) { $this->nom = $nom; }
}
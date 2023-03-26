<?php
class Livre {

    private $titre;
    private $annee;
    private $resume;
    private $edition;
    private $categorie;




    public function __construct($titre,$annee,$resume,$edition,$categorie)
    {
        $this->titre = $titre;
        $this->annee = $annee;
        $this->resume->$resume;
        $this->edition = $edition;
        $this->categorie = $categorie;
    }
    /**
     * Set the value of titre
     *
     * @return  self
     */
    public function setTitre($titre)
    {$this->titre = $titre;
    return $this;}

    /**
     * Get the value of titre
     */
    public function getTitre(){return $this->titre;}

    /**
     * Get the value of annee
     */
    public function getAnnee() {return $this->annee;}

    /**
     * Set the value of annee
     *
     * @return  self
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get the value of resume
     */
    public function getResume(){return $this->resume;}

    /**
     * Set the value of resume
     *
     * @return  self
     */
    public function setResume($resume){ $this->resume = $resume;

        return $this; }

    /**
     * @return mixed
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

}
?>

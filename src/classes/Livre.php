<?php
class Livre {

    private $id_livre;
    private $titre;
    private $annee;
    private $resume;
    private $edition;



    public function __construct($id_livre,$titre,$annee,$resume,$edition)
    {
        $this->id_livre = $id_livre;
        $this->titre = $titre;
        $this->annee = $annee;
        $this->resume->$resume;
        $this->edition = $edition;
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
     * Get the value of id_livre
     */
    public function getId_livre(){ return $this->id_livre;}

    /**
     * @return mixed
     */
    public function getEdition()
    {
        return $this->edition;
    }


}
?>

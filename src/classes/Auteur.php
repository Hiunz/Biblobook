<?php
class Auteur {
private $id;
private $nom;
private $prenom;
private $date_de_naissance;
private $pays;

public function __construct($id = null,$nom = null,$prenom = null,$date_de_naissance = null,$pays = null)
{
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->date_de_naissance = $date_de_naissance;
    $this->pays = $pays;

}

/**
 * Get the value of nom
 */ 
public function getNom()
{return $this->nom;}

/**
 * Set the value of nom
 *
 * @return  self
 */ 
public function setNom($nom)
{$this->nom = $nom;
return $this;}

/**
 * Get the value of prenom
 */ 
public function getPrenom()
{return $this->prenom;}

/**
 * Set the value of prenom
 *
 * @return  self
 */ 
public function setPrenom($prenom)
{$this->prenom = $prenom;
return $this;}

/**
 * Get the value of date_de_naissance
 */ 
public function getDate_de_naissance()
{
return $this->date_de_naissance;
}

/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Get the value of pays
 */ 
public function getPays()
{
return $this->pays;
}
}
?>
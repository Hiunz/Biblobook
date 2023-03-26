<?php
class Auteur {
private $nom;
private $prenom;
private $date_de_naissance;
private $bdd;

public function __construct($nom,$prenom,$date_de_naissance,$bdd)
{
    $this->$nom;
    $this->$prenom;
    $this->$date_de_naissance;
    $this->bdd;
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
}
?>
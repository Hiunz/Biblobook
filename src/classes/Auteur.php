<?php
public class Auteur {
private $id_auteur;
private $nom;
private $prenom;
private $date_de_naissance;
private $bdd;

public function __construct($id_auteur,$nom,$prenom,$date_de_naissance,$bdd)
{
    $this->id_auteur = $id_auteur;
    $this->$nom;
    $this->$prenom;
    $this->$date_de_naissance;
    $this->bdd;
}


/**
 * Get the value of id_auteur
 */ 
public function getId_auteur()
{return $this->id_auteur;}

/**
 * Set the value of id_auteur
 *
 * @return  self
 */ 
public function setId_auteur($id_auteur)
{$this->id_auteur = $id_auteur;
return $this;}

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
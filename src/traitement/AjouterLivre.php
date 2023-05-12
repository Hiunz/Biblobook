<?php
require_once "../controller/LivreController.php";
require_once "../controller/AuteurController.php";
require_once "../bdd/Bdd.php";
require_once "../classes/Livre.php";
require_once "../classes/Auteur.php";
session_start();
$livre = new Livre();
$livre->setTitre($_POST['titre']);
$livre->setAnnee($_POST['annee']);
$livre->setResume($_POST['resume']);
$livre->setEdition($_POST['edition']);
$livre->setCategorie($_POST['categorie']);
$livre->setAuteur(AuteurController::getAuteur($_POST['auteur']));
LivreController::AddLivre($livre);
<?php
require_once "../bdd/Bdd.php";
require_once "../controller/LivreController.php";
$livreController = new LivreController();
$error = $livreController->getLivres();
session_start();

if (!$error){
    $_SESSION['message'] = "Voici les livres correspondants à votre recherche";
    exit();
} else {
    $_SESSION['error'] = $error;
    exit();
}
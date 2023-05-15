<?php
require_once "../bdd/Bdd.php";
require_once "../controller/EmpruntController.php";
require_once "../controller/LivreController.php";
require_once "../controller/AuteurController.php";
require_once "../controller/UtilisateurController.php";
require_once "../controller/ExemplaireController.php";
require_once "../classes/Emprunt.php";
require_once "../classes/Livre.php";
require_once "../classes/Auteur.php";
require_once "../classes/Utilisateur.php";

if(isset($_POST['date_start']) && isset($_POST['date_end']) && $_POST['date_start'] < $_POST['date_end']) {
    session_start();
    $emprunt = new Emprunt($_POST['date_start'], $_POST['date_end'], LivreController::getLivre($_SESSION['livre']), UtilisateurController::getUtilisateur($_SESSION['user']));
    $exemplaire = ExemplaireController::getUnusedExemplaire($emprunt);
    if($exemplaire){
        $emprunt->setRefExemplaire($exemplaire);
        EmpruntController::addEmprunt($emprunt);
        $_SESSION['message'] = "Livre ".LivreController::getLivre($_SESSION['livre'])->getTitre()." emprunté !!";
        header("Location: ../../index.php");
    } else {
        $_SESSION['error'] = "Il n'y a malheureusement <br> aucun exemplaire du livre disponible <br> pour ces dates là <br> ".date("d/m/Y", strtotime($_POST['date_start']))." - ".date("d/m/Y", strtotime($_POST['date_start']));
        header("Location: ../affichage/emprunt.php");

    }
} else {
    $_SESSION['error'] = 'La date de fin d\'emprunt doit être inférieure à la date de début d\'emprunt';
    header("Location: ../affichage/emprunt.php");
}


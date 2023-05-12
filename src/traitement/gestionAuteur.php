<?php
require_once "../bdd/Bdd.php";
require_once "../controller/LivreController.php";
require_once "../classes/Livre.php";
require_once "../classes/Auteur.php";
require_once "../controller/AuteurController.php";

if(isset($_POST["auteurSelect"])) {
    if (isset($_POST["modif"])) {
        Session_Start();
        $controller = new AuteurController();
        $_SESSION["auteurSelect"]= $_POST["auteurSelect"];
        header("Location: ../affichage/ModifAuteur.php");
    } else if (isset($_POST["supp"])) {
        AuteurController::DeleteAuteur($_POST["auteurSelect"]);
    }
}
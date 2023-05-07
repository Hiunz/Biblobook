<?php
    require_once "../bdd/Bdd.php";
    require_once "../controller/LivreController.php";
    require_once "../classes/Livre.php";
    require_once "../classes/Auteur.php";
    require_once "../controller/AuteurController.php";

    if(isset($_POST["livreSelect"])) {
        if (isset($_POST["modif"])) {
            Session_Start();
            $_SESSION["livreSelect"]=livreController::getLivre($_POST["livreSelect"]);
            header("Location: ../affichage/ModifLivre.php");
        } else if (isset($_POST["supp"])) {
            LivreController::DeleteLivre($_POST["livreSelect"]);
        }
    }
<?php
    require_once "../bdd/Bdd.php";
    require_once "../controller/LivreController.php";
    require_once "../classes/Livre.php";
    require_once "../classes/Auteur.php";
    require_once "../controller/AuteurController.php";

    if(isset($_POST["livreSelect"])) {
        if (isset($_POST["modif"])) {
            Session_Start();
            $controller = new LivreController;
            $_SESSION["livreSelect"]= $_POST["livreSelect"];
            header("Location: ../affichage/modifLivre.php");
        } else if (isset($_POST["supp"])) {
            LivreController::DeleteLivre($_POST["livreSelect"]);
            header("Location: ../affichage/GestionLivre.php");
        }
        else if (isset($_POST["ajouter"])){
            header("Location: ../affichage/ajouterLivre.php");


        }
    }
<?php
    require_once "../bdd/Bdd.php";
    require_once "../classes/Utilisateur.php";
    require_once "../controller/UtilisateurController.php";
    $userController = new UtilisateurController();
    session_start();
    if (isset($_POST['delete'])) {
        $userController->deleteUtilisateur($_SESSION['user']);
    } else {
        $error = $userController->updateUtilisateur(new Utilisateur($_SESSION['user'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp'], $_POST['telfixe'][0], $_POST['telfixe'][1], $_POST['rue'], $_POST['cp'], $_POST['ville']));
        if (!$error) {
            $_SESSION['message'] = "Votre compte à été modifié avec succès !";
            header("Location: ../../index.php");
            exit();
        }else{
            $_SESSION['error'] = $error;
            $_SESSION['cache'] = $_POST;
            header("Location: ../affichage/Monprofil.php");
            exit();
        }
    }
?>
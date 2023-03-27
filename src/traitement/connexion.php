<?php
    require_once "../bdd/Bdd.php";
    require_once "../controller/userController.php";
    $userController = new userController();
    $user = $userController->connexion($_POST["email"], $_POST["mdp"]);
    session_start();
    if (is_int($user)) {
        $_SESSION['user'] = $user;
        header("Location: ../../index.php");
        exit();
    } else {
        $_SESSION['error'] = $user;
        $_SESSION['cache'] = $_POST;
        header("Location: ../affichage/connexion.php");
        exit();
    }

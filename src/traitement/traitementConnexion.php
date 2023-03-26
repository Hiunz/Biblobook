<?php
require_once "../bdd/Bdd.php";

if (isset($_POST["login"]) && isset($_POST["mdp"])) {
    $userController = new userController();
    $user = $userController->connexion($_POST["login"], $_POST["mdp"]);
    if ($user != false) {
        $_SESSION['user'] = $user;
    } else {
        $_SESSION['error'] = "attention mdp ou login incorrect";
    }
}

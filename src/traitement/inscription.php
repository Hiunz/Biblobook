<?php
    require_once "../bdd/Bdd.php";
    require_once "../controller/UtilisateurController.php";
    $userController = new UtilisateurController();
    var_dump($_POST);
    $error = $userController->inscription($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp'], $_POST['telfixe'], $_POST['rue'], $_POST['cp'], $_POST['ville']);
    if (!$error) {
        $_SESSION['message'] = "Votre compte à été créé avec succès !";
        header("Location: ../affichage/connexion.php");
        exit();
    }else{
        $_SESSION['error'] = $error;
        $_SESSION['cache'] = $_POST;
        header("Location: ../affichage/inscription.php");
        exit();
    }

?>
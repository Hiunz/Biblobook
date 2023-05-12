<!DOCTYPE html>
<html>
<head>
    <title>Modifier un auteur</title>
    <?php
    require_once "../bdd/Bdd.php";
    require_once "../controller/LivreController.php";
    require_once "../classes/Livre.php";
    require_once "../classes/Auteur.php";
    require_once "../controller/AuteurController.php";
    Session_start();
    ?>
</head>
<body>
<h1>Modifier un auteur</h1>
<form method="post" action="../traitement/ModifAuteur.php">
    <?php
    $auteur = (new AuteurController())->getAuteur($_SESSION['auteurSelect']);
    ?>

    <label for="titre">Nom:</label>
    <input type="text" id="nom" name="nom" value="<?= $auteur->getNom() ?>" required>
    <br>
    <label for="prenom">Prenom:</label>
    <input type="text" id="prenom" name="prenom" value="<?= $auteur->getPrenom() ?>" required>
    <br>
    <label for="resume">Date de naissance:</label>
    <textarea id="date_de_naissance" name="date_de_naissance" rows="5" cols="30" value="<?= $auteur->getDate_de_naissance() ?>" required>Date de naissance de l'auteur</textarea>
    <br>
    <label for="pays">Pays:</label>
    <input type="text" id="pays" name="pays" value="<?= $auteur->getPays() ?>" required>
    <br>


    <input type="submit" value="Modifier">
</form>
</body>
</html>
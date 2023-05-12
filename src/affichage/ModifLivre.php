<!DOCTYPE html>
<html>
<head>
    <title>Modifier un livre</title>
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
<h1>Modifier un livre</h1>
<form method="post" action="../traitement/ModifLivre.php">
    <?php
        $livre = (new LivreController())->getLivre($_SESSION['livreSelect']);
    ?>

    <label for="titre">Titre:</label>
    <input type="text" id="titre" name="titre" value="<?= $livre->getTitre() ?>" required>
    <br>
    <label for="annee">Année:</label>
    <input type="number" id="annee" name="annee" value="<?= $livre->getAnnee() ?>" required>
    <br>
    <label for="resume">Résumé:</label>
    <textarea id="resume" name="resume" rows="5" cols="30" value="<?= $livre->getResume() ?>" required>Résumé du livre</textarea>
    <br>
    <label for="edition">Édition:</label>
    <input type="text" id="edition" name="edition" value="<?= $livre->getEdition() ?>" required>
    <br>
    <label for="categorie">Catégorie:</label>
    <input type="text" id="categorie" name="categorie" value="<?= $livre->getCategorie() ?>" required>

    <input type="submit" value="Modifier">
</form>
</body>
</html>
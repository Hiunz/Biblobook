<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un livre</title>
</head>
<body>
<h1>Ajouter un livre</h1>
<form method="post" action="../traitement/ajouterLivre.php">
    <label for="titre">Titre:</label>
    <input type="text" id="titre" name="titre" required>
    <br>
    <label for="auteur">Auteur:</label>
    <?php
    require_once "../classes/Auteur.php";
    require_once "../bdd/Bdd.php";
    require_once "../controller/AuteurController.php";
    var_dump(AuteurController::getAuteurs());
    ?>
    <select name="auteur">
        <?php
        foreach (AuteurController::getAuteurs() as $auteur){
        ?>
        <option value="<?= $auteur->getId() ?>"><?= $auteur->getNom()." ".$auteur->getPrenom() ?></option>
        <?php
        }
        ?>

    </select>
    <br>
    <label for="anneePublication">Année de publication:</label>
    <input type="number" id="annee" name="annee" required>
    <br>
    <br>
    <label for="resume">Resumé: </label>
    <input type="text" id="resume" name="resume" required>
    <br>
    <label for="edition">Edition:</label>
    <input type="text" id="edition" name="edition" required>
    <br>
    <br>
    <label for="categorie">Catégorie:</label>
    <input type="text" id="categorie" name="categorie" required>
    <br>
    <br>

    <input type="submit" value="Ajouter">
</form>
</body>
</html>








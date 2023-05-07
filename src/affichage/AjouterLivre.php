<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un livre</title>
</head>
<body>
<h1>Ajouter un livre</h1>
<form method="post" action="gestionLivre">
    <label for="titre">Titre:</label>
    <input type="text" id="titre" name="titre" required>
    <br>
    <label for="auteur">Auteur:</label>
    <input type="text" id="auteur" name="auteur" required>
    <br>
    <label for="anneePublication">Année de publication:</label>
    <input type="number" id="anneePublication" name="anneePublication" required>
    <br>
    <input type="submit" value="Ajouter">
</form>
</body>
</html>








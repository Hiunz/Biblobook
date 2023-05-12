<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un auteur</title>
</head>
<body>
<h1>Ajouter un auteur</h1>
<form method="post" action="gestionAuteur">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" required>
    <br>
    <label for="prenom">Prenom:</label>
    <input type="text" id="prenom" name="prenom" required>
    <br>
    <label for="dateNaissance">Date de naissance:</label>
    <input type="date" id="date_de_naissance" name="date_de_naissance" required>
    <br>
    <label for="pays">Pays:</label>
    <input type="text" id="pays" name="pays" required>
    <br>
    <input type="submit" value="Ajouter">
</form>
</body>
</html>

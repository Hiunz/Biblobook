<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page des emprunts</title>
</head>

<body>
<form action="../traitement/traitementEmprunt.php" method="post">

    <label for="1">Date de début d'emprunt : </label>
    <input id="1" type="date" name="date_start" required="required"> <br>

    <label for="2">Date de fin d'emprunt : </label>
    <input id="2" type="date" name="date_end" required="required"> <br>

    <input type="submit" value="Valider">
</form>
</body>

</html>
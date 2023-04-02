<?php
require_once "../bdd/Bdd.php";
require_once "../controller/EmpruntController.php";
require_once "../classes/Emprunt.php";
$empruntController = new EmpruntController();

if(isset($_POST['date_start']) && isset($_POST['date_end']) && $_POST['date_start'] < $_POST['date_end']) {
    //il manque ici la vérification qu'un exemplaire du livre soit disponible (pas tous empruntés par d'autres) sinon :
    // D'ailleurs combien d'exemplaires par livre ?
    $emprunt = new Emprunt($_POST['date_start'], $_POST['date_end']);
    $empruntController->addEmprunt($emprunt);

} else {
    $message = 'La date de fin d\'emprunt doit être inférieure à la date de début d\'emprunt';
    return $message;
}





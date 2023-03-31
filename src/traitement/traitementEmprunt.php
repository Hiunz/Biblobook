<?php
require_once "../affichage/emprunt.php";
require_once "../controller/EmpruntController.php";
require_once "../bdd/Bdd.php";


if(isset($_POST['date_start']) && isset($_POST['date_end']) && $_POST['date_start'] < $_POST['date_end']) {
    $emprunt = new Emprunt();

} else {
    return 'La date de fin d\'emprunt doit être inférieure à la date de début d\'emprunt';
}





<?php
require_once "../bdd/Bdd.php";

class LivreControlleur {

    private $bdd;

    public function construct__(){
        $this->bdd = (new Bdd())->getBdd();
    }

public function searchTitre(){
    $req = $this->bdd->prepare('SELECT id_livre, titre, annee, resume, edition FROM livre WHERE titre = :titre');
    $req->execute(array("titre" => $_POST["titre"]));
}



}

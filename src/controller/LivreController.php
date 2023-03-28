<?php
require_once "../bdd/Bdd.php";
require_once "../classes/Livre.php";
class livreController
{
    public function getLivres(){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('SELECT * FROM livre');
        $req->execute();
        $res = $req->fetchAll();
        $result = [];
        foreach ($res as $value) {
            array_push($result, new Livre($value['titre'], $value['annee'], $value['resume'], $value['edition'], $value['categorie']));
        }
        return $result;
    }

}


<?php

class livreController
{
    public function getLivres(){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('SELECT * FROM livre');
        $res = $req->fetchAll();
        return $res;
    }

}


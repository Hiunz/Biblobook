<?php

class Bdd {

    private $bdd;

    public function getBdd(){
        $bdd = new PDO('mysql:host=localhost;dbname=biblobook;','root','');
        return $this->bdd;
    }
}

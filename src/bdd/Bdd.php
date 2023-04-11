<?php

class Bdd {
    public static function getBdd(){
        return new PDO('mysql:host=localhost;dbname=biblobook;','root','');
    }
}

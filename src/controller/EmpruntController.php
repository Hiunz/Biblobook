<?php

class EmpruntController
{

    public function addEmprunt(Emprunt $emprunt){
        if (isset($_POST['date_start']) && isset($_POST['$date_end'])) {
            $bdd = (new Bdd())->getBdd();
            $req = $bdd->prepare('INSERT INTO emprunt (date, delai) VALUES (:date, :delai)');
            $req->execute(['date' => $emprunt->getDate(), 'delai' => $emprunt->getDelai()]);
        }
    }

    public function RemoveEmprunt(){

    }

    public function updateEmprunt(){

    }

}
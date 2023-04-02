<?php

class EmpruntController {

    public function addEmprunt(Emprunt $emprunt){
        if (isset($_POST['date_start']) && isset($_POST['$date_end'])) {
            $bdd = (new Bdd())->getBdd();
            $req = $bdd->prepare('INSERT INTO emprunt (date, delai, ref_exemplaire, ref_utilisateur) VALUES (:date, :delai, :ref_exemplaire, :ref_utilisateur)');
            $req->execute(['date' => $emprunt->getDate(),
                           'delai' => $emprunt->getDelai(),
                           'ref_exemplaire' => $_SESSION['ref_exemplaire'],
                           'ref_utilisateur' => $_SESSION['ref_utilisateur']]);
        }
    }

    public function removeEmprunt(Emprunt $emprunt){
        if ($emprunt->getDelai() == 0){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('DELETE FROM emprunt WHERE id_emprunt = :id_emprunt');
        $req->execute(['id_emprunt'=>$emprunt->getIdEmprunt()]);
        }
    }

    public function updateEmprunt(Emprunt $emprunt){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('UPDATE emprunt SET date = :date, delai = :delai WHERE id_emprunt = :id_emprunt');
        $req->execute(['date'=>$emprunt->getDate(),
                       'delai'=>$emprunt->getDelai(),
                       'id_emprunt'=>$emprunt->getIdEmprunt()]);
    }
}

<?php

class EmpruntController {

    public static function getEmprunts(){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('SELECT emprunt.*, exemplaire.ref_livre FROM emprunt inner join exemplaire on ref_exemplaire = id_exemplaire');
        $req->execute();
        $res = $req->fetchAll();
        $result = [];
        foreach ($res as $value) {
            $livre = null;
            $utilisateur = null;
            if (isset($value["ref_livre"])) {
                $livre = livreController::getLivre($value["ref_livre"]);
            }
            if (isset($value["ref_utilisateur"])) {
                $utilisateur = UtilisateurController::getUtilisateur($value["ref_utilisateur"]);
            }
            array_push($result, new Emprunt($value["date"], $value["delais"], $livre, $utilisateur, $value["id_emprunt"]));
        }
        return $result;
    }


    public static function addEmprunt(Emprunt $emprunt ){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('INSERT INTO emprunt (date_start, date_end, ref_exemplaire, ref_utilisateur) VALUES (:date_start, :date_end, :ref_exemplaire, :ref_utilisateur)');
        $req->execute([
            'date_start' => $emprunt->getDateStart(),
            'date_end' => $emprunt->getDateEnd(),
            'ref_exemplaire' => $emprunt->getRefExemplaire(),
            'ref_utilisateur' => $emprunt->getUtilisateur()->getIdUtilisateur()]);

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

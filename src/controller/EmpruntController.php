<?php

class EmpruntController {

    public static function getEmprunts($idUtilisateur = false){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('SELECT emprunt.*, exemplaire.ref_livre FROM emprunt inner join exemplaire on ref_exemplaire = id_exemplaire '.(($idUtilisateur) ? 'where ref_utilisateur = :id' : ''));
        $req->execute(($idUtilisateur) ? ['id'=>$idUtilisateur] : []);
        $res = $req->fetchAll();
        $result = [];
        foreach ($res as $value) {
            $livre = null;
            $utilisateur = null;
            if (isset($value["ref_livre"])) {
                $livre = ExemplaireController::getExemplaire($value["ref_exemplaire"])->getLivre();
            }
            if (isset($value["ref_utilisateur"])) {
                $utilisateur = UtilisateurController::getUtilisateur($value["ref_utilisateur"]);
            }
            array_push($result, new Emprunt($value["date_start"], $value["date_end"], $livre, $utilisateur, $value["id_emprunt"]));
        }
        return $result;
    }

    
    public static function addEmprunt(Emprunt $emprunt ){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('INSERT INTO emprunt (date_start, date_end, ref_exemplaire, ref_utilisateur) VALUES (:date_start, :date_end, :ref_exemplaire, :ref_utilisateur)');
        $req->execute([
            'date_start' => $emprunt->getDateStart(),
            'date_end' => $emprunt->getDateEnd(),
            'ref_exemplaire' => $emprunt->getExemplaire()->getIdExemplaire(),
            'ref_utilisateur' => $emprunt->getUtilisateur()->getIdUtilisateur()]);

    }

}

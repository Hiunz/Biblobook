<?php
require_once "../bdd/Bdd.php";
require_once "../classes/Emprunt.php";

class EmpruntController
{
    public function ajouterEmprunt($livreId, $utilisateurId, $dateEmprunt, $delai)
    {

        $bdd = (new Bdd())->getBdd();


        $req = $bdd->prepare('SELECT id_exemplaire FROM exemplaire WHERE ref_livre = :livreId AND disponible = 1 LIMIT 1');
        $req->execute(['livreId' => $livreId]);
        $res = $req->fetch(PDO::FETCH_ASSOC);

        if (!$res) {

            return "Aucun exemplaire disponible pour ce livre.";
        }

        // Créer un nouvel emprunt
        $req = $bdd->prepare('INSERT INTO emprunt(date_emprunt, date_retour_prevue, ref_utilisateur, ref_exemplaire) VALUES (:dateEmprunt, :dateRetourPrevue, :utilisateurId, :exemplaireId)');
        $req->execute([
            'dateEmprunt' => $dateEmprunt,
            'dateRetourPrevue' => date('Y-m-d', strtotime($dateEmprunt . ' + ' . $delai . ' days')),
            'utilisateurId' => $utilisateurId,
            'exemplaireId' => $res['id_exemplaire']
        ]);

        // MAJ
        $req = $bdd->prepare('UPDATE exemplaire SET disponible = 0 WHERE id_exemplaire = :exemplaireId');
        $req->execute(['exemplaireId' => $res['id_exemplaire']]);


        return "Emprunt ajouté avec succès !";
    }

}
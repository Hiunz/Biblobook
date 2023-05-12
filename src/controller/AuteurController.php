<?php
    class AuteurController{

        Public static function getAuteur($id_livre){
            $bdd = (new Bdd())->getBdd();
            $req = $bdd->prepare('select auteur.*, pays.nom as pays_nom from ecrire INNER JOIN auteur on ref_auteur = id_auteur INNER JOIN pays on ref_pays = id_pays WHERE ref_livre = :id ;');
            $req->execute(['id'=>$id_livre]);
            $rep = $req->fetch(MYSQLI_ASSOC);
            if ($rep) {
                $auteur = new Auteur($rep['id_auteur'], $rep['nom'], $rep['prenom'], $rep['date_naissance'], $rep['pays_nom']);
            }else{
                $auteur = new Auteur(null, "Anonyme");
            }
            return $auteur;
        }

        Public static function getAuteurs(){
            $bdd = (new Bdd())->getBdd();
            $req = $bdd->prepare('select auteur.*, pays.nom as pays_nom from ecrire INNER JOIN auteur on ref_auteur = id_auteur INNER JOIN pays on ref_pays = id_pays ;');
            $req->execute();
            $reps = $req->fetchAll();
            $auteurs = [];
            foreach ($reps as $rep) {
                $auteur = null;
                if ($rep) {
                    $auteur = new Auteur($rep['id_auteur'], $rep['nom'], $rep['prenom'], $rep['date_naissance'], $rep['pays_nom']);
                } else {
                    $auteur = new Auteur(null, "Anonyme");
                }
                array_push($auteurs, $auteur);
            }
            return $auteurs;
        }
    }

?>
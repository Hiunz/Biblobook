<?php
    class AuteurController{

        Public function getAuteur($id_livre){
            $bdd = (new Bdd())->getBdd();
            $req = $bdd->prepare('select auteur.*, pays.nom as pays_nom from ecrire INNER JOIN auteur on ref_auteur = id_auteur INNER JOIN pays on ref_pays = id_pays WHERE ref_livre = :id ;');
            $req->execute(['id'=>$id_livre]);
            $rep = $req->fetch(MYSQLI_ASSOC);
            $auteur = new Auteur($rep['id_auteur'], $rep['nom'], $rep['prenom'], $rep['date_naissance'], $rep['pays_nom']);
            return $auteur;
        }
    }

?>
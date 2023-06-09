<?php

class LivreController
{
    public function getLivres(){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('SELECT livre.*, COUNT(exemplaire.id_exemplaire) AS nb_exemplaires FROM livre INNER JOIN exemplaire ON livre.id_livre = exemplaire.ref_livre GROUP BY livre.id_livre;');
        $req->execute();
        $res = $req->fetchAll();
        $result = [];
        $AuteurController = new AuteurController();
        foreach ($res as $value) {
            array_push($result, new Livre($value['id_livre'], $value['titre'], $value['annee'], $value['resume'], $value['edition'], $value['categorie'], $AuteurController->getAuteur($value['id_livre']), $value['nb_exemplaires']));
        }
        return $result;
    }

    public static function getLivre($id){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('SELECT livre.*, COUNT(exemplaire.id_exemplaire) AS nb_exemplaires FROM livre INNER JOIN exemplaire ON livre.id_livre = exemplaire.ref_livre  where id_livre = :id GROUP BY livre.id_livre');
        $req->execute(['id'=>$id]);
        $res = $req->fetch(MYSQLI_ASSOC);
        return new Livre($res['id_livre'], $res['titre'], $res['annee'], $res['resume'], $res['edition'], $res['categorie'], AuteurController::getAuteur($res['id_livre']), $res['nb_exemplaires']);
    }

    public static function getNotUsedExemplaire($id){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('SELECT id_exemplaire FROM exemplaire WHERE ref_livre = :id AND id_exemplaire NOT IN (SELECT ref_exemplaire FROM emprunt)');
        $req->execute(['id' => $id]);
        $res = $req->fetch();
        if ($res) {
            return $res['id_exemplaire'];
        }
        return null;
    }



    public static function AddLivre($livre){
        $bdd = (new Bdd())->getBdd();
    $req= $bdd->prepare("INSERT INTO livre (titre,annee,resume,edition,categorie) VALUES (:titre,:annee,:resume,:edition,:categorie)");
    $req->execute([
        "titre"=>$livre->getTitre(),
        "annee"=>$livre->getAnnee(),
        "resume"=>$livre->getResume(),
        "edition"=>$livre->getedition(),
        "categorie"=>$livre->getCategorie()]);
}


  
public static function EditLivre($livre){
    $bdd = (new Bdd())->getBdd();

    $req= $bdd->prepare("UPDATE livre SET titre=:titre,annee=:annee,resume=:resume,edition=:edition,categorie=:categorie WHERE id_livre=:id");
    $req->execute([
        "titre"=>$livre->getTitre(),
        "annee"=>$livre->getAnnee(),
        "resume"=>$livre->getResume(),
        "edition"=>$livre->getedition(),
        "categorie"=>$livre->getCategorie(),
        "id"=>$livre->getId()]);
    }
    public static function DeleteLivre($id){
    $bdd = (new Bdd())->getBdd();
    $req= $bdd->prepare("DELETE FROM livre WHERE id_livre=:id");
    $req->execute([
        "id"=>$id]);
    }
}
?>
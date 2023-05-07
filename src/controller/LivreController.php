<?php

class livreController
{
    public function getLivres(){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('SELECT * FROM livre');
        $req->execute();
        $res = $req->fetchAll();
        $result = [];
        $AuteurController = new AuteurController();
        foreach ($res as $value) {
            array_push($result, new Livre($value['id_livre'], $value['titre'], $value['annee'], $value['resume'], $value['edition'], $value['categorie'], $AuteurController->getAuteur($value['id_livre'])));
        }
        return $result;
    }

    public static function getLivre($id){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('SELECT * FROM livre where id_livre = :id');
        $req->execute(['id'=>$id]);
        $res = $req->fetch(MYSQLI_ASSOC);
        return new Livre($res['id_livre'], $res['titre'], $res['annee'], $res['resume'], $res['edition'], $res['categorie'], AuteurController::getAuteur($res['id_livre']));
    }

    public static function getNotUsedExemplaire($id){
        
    }


    public function AddLivre($livre){
        $bdd = (new Bdd())->getBdd();
    $req= $bdd->prepare("INSERT INTO livre (titre,annee,resume,edition,categorie,ref_auteur) VALUES (:titre,:annee,:resume,:edition,:categorie,:auteur)");
    $req->execute([
        "titre"=>$livre->getTitre(),
        "annee"=>$livre->getAnnee(),
        "resume"=>$livre->getResume(),
        "edition"=>$livre->getedition(),
        "categorie"=>$livre->getCategorie(),
        "auteur"=>$livre->getAuteur()->getId()]);
}


  
public static function EditLivre($livre){
    $bdd = (new Bdd())->getBdd();

    $req= $bdd->prepare("UPDATE livre SET titre=:titre,annee=:annee,resume=:resume,edition=:edition,categorie=:categorie WHERE id=:id");
    $req->execute([
        "titre"=>$livre->getTitre(),
        "annee"=>$livre->getAnnee(),
        "resume"=>$livre->getResume(),
        "edition"=>$livre->getedition(),
        "categorie"=>$livre->getCategorie(),
        "auteur"=>$livre->getAuteur()->getId(),
        "id"=>$livre->getId()]);
    }
    public static function DeleteLivre($id){
    $bdd = (new Bdd())->getBdd();
    $req= $bdd->prepare("DELETE FROM livre WHERE id=:id");
    $req->execute([
        "id"=>$id->getId()]);
    }
}
?>
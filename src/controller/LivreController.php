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


  
public function EditLivre($id){
    $bdd = (new Bdd())->getBdd();

    $req= $bdd->prepare("UPDATE livre SET titre=:titre,annee=:annee,resume=:resume,edition=:edition,categorie=:categorie WHERE id=:id");
    $req->execute([
        "titre"=>$livre->getTitre(),
        "annee"=>$livre->getAnnee(),
        "resume"=>$livre->getResume(),
        "edition"=>$livre->getedition(),
        "categorie"=>$livre->getCategorie(),
        "auteur"=>$livre->getAuteur()->getId()]);
    }
    public function DeleteLivre($id){
    $bdd = (new Bdd())->getBdd();
    $req= $bdd->prepare("DELETE FROM livre WHERE id=:id");
    $req->execute([
        "id"=>$id]);
    }

}
?>
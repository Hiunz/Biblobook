<?php

class livreController
{
    public function getLivres(){
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('SELECT * FROM livre');
        $req->execute();
        $res = $req->fetchAll();
        $result = [];
        foreach ($res as $value) {
            array_push($result, new Livre($value['id_livre'], $value['titre'], $value['annee'], $value['resume'], $value['edition'], $value['categorie']));
        }
        return $result;
    }


    public function AddLivre($id){
        $bdd = (new Bdd())->getBdd();
    $req= $bdd->prepare("INSERT INTO livre(titre,annee,resume,edition,categorie) VALUES (:titre,:annee,:resume,:edition,:categorie)");
    $req->execute([
        "titre"=>$_POST["titre"],
        "annee"=>$_POST["annee"],
        "resume"=>$_POST["resume"],
        "edition"=>$_POST["edition"],
        "categorie"=>$_POST["categorie"]]
    );
}


  
public function EditLivre($id){
    $bdd = (new Bdd())->getBdd();

    $req= $bdd->prepare("UPDATE livre SET titre=:titre,annee=:annee,resume=:resume,edition=:edition,categorie=:categorie WHERE id=:id");
    $req->execute([
        "titre"=>$_POST["titre"],
        "annee"=>$_POST["annee"],
        "resume"=>$_POST["resume"],
        "edition"=>$_POST["edition"],
        "categorie"=>$_POST["categorie"],
        "id"=>$id]);
    }
    public function DeleteLivre($id){
    $bdd = (new Bdd())->getBdd();
    $req= $bdd->prepare("DELETE FROM livre WHERE id=:id");
    $req->execute([
        "id"=>$id]);
    }

}
?>
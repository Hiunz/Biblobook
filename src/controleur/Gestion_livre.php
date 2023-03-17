<?php
class GestionLivreController{
    
    
    public function createbook($titre,$annee,$resume){
        $bdd = new Bdd();
        $req= $this->bdd->prepare("INSERT INTO livre (titre,annee,resume) VALUES (:titre,:annee,:resume)");
        $req->execute([
            "titre"=>$titre,
            "annee"=>$annee,
            "resume"=>$resume
        ]);
    }
        
    public function Updatebook($titre,$annee,$resume){
        $req= $this->bdd->prepare("UPDATE livre SET titre= :titre,annee=:annee,resume=:resume WHERE id_livre=:id_livre");
        $req->execute(["titre"=>$titre,
        "annee"=>$annee,
        "resume"=>$resume]);
    }
    
    public function Deletebook($id_livre){
        $req= $this->bdd->prepare("DELETE FROM livre WHERE id_livre=:id_livre");
        $req->execute(["id_livre"=>$id_livre,]
    );
    }
}
?>
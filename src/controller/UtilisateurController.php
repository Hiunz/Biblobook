<?php

class UtilisateurController
{

    public static function getUtilisateur($id){
        $req = Bdd::getBdd()->prepare('SELECT nom,prenom,email,tel_fixe,tel_portable,rue,cp,ville,mdp,admin FROM utilisateur where id_utilisateur = :id');
        $req->execute(['id'=>$id]);
        $res = $req->fetch(MYSQLI_ASSOC);
        return new Utilisateur($id,$res['nom'],$res['prenom'],$res['email'],$res['mdp'],$res['tel_fixe'],$res['tel_portable'],$res['rue'],$res['cp'],$res['ville'],$res['admin']);
    }

    public function connexion($email, $mdp)
    {
        if (!empty($email) && !empty($mdp)) {
            $bdd = (new Bdd())->getBdd();
            $req = $bdd->prepare('SELECT id_utilisateur FROM utilisateur WHERE email = :email AND mdp = :mdp');
            $req->execute(["email" => $email, "mdp" => $mdp]);
            $res = $req->fetch(MYSQLI_ASSOC);
            if (!empty($res)) {
                return (int)$res["id_utilisateur"];
            } else {
                return "E-mail ou Mot de passe incorrect.";
            }
        }else{
            return (
                (empty($email))?"Vous n'avez saisit aucun e-mail.":
                ((empty($mdp))?"Vous n'avez saisit aucun mot de passe.":"Oups, une erreur est survenue !!"));
        }
    }
    public function inscription($nom, $prenom, $email, $mdp, $tel, $rue, $cp, $ville){
        if (!empty($nom)&&!empty($prenom)&&!empty($email)&&!empty($mdp)&&$mdp[0]==$mdp[1]&&!empty($rue)&&!empty($cp)&&!empty($ville)) {
            $bdd = (new Bdd())->getBdd();

            $req = $bdd->prepare('select count(id_utilisateur) as count from utilisateur where email = :email');
            $req->execute(["email" => $email]);
            $rep = $req->fetch(MYSQLI_ASSOC);
            if ($rep['count']==0) {
                $req = $bdd->prepare('insert into utilisateur(nom, prenom, email, mdp, tel_fixe, tel_portable, rue, cp, ville) values (:nom, :prenom, :email, :mdp, :telfixe, :telportable, :rue, :cp, :ville)');
                $req->execute(["nom" => $nom, "prenom" => $prenom, "email" => $email, "mdp" => $mdp[0],"telfixe" => $tel[1],"telportable" => $tel[0], "rue" => $rue, "cp" => $cp, "ville" => $ville]);
                return false;
            }else{
                return ("Un compte existe déjà avec cet e-mail !!");
            }
        }else{
            return (
                (empty($nom))?"Vous n'avez saisit aucun nom.":
                ((empty($prenom))?"Vous n'avez saisit aucun prénom.":
                ((empty($email))?"Vous n'avez saisit aucun e-mail.":
                ((empty($mdp))?"Vous n'avez saisit aucun mot de passe.":
                (($mdp[0]!=$mdp[1])?"Le mot de passe et la confirmations ne sont pas identique.":
                ((empty($rue)&&empty($cp)&&empty($ville))?"Vous n'avez saisit aucune adresse.":
                "Oups, une erreur est survenue."))))));
        }
    }

    public function updateUtilisateur($utilisateur){
        if (!empty($utilisateur->getNom())&&!empty($utilisateur->getPrenom())&&!empty($utilisateur->getEmail())&&!empty($utilisateur->getMdp())&&$utilisateur->getMdp()[0]==$utilisateur->getMdp()[1]&&!empty($utilisateur->getRue())&&!empty($utilisateur->getCp())&&!empty($utilisateur->getVille())) {
            $bdd = (new Bdd())->getBdd();
            $req = $bdd->prepare('select count(id_utilisateur) as count from utilisateur where email = :email');
            $req->execute(["email" => $utilisateur->getEmail()]);
            $rep = $req->fetch(MYSQLI_ASSOC);
            if ($rep['count']==0 || $utilisateur->getEmail() == $this->getUtilisateur($utilisateur->getIdUtilisateur())->getEmail()) {
                $req= $bdd->prepare("UPDATE utilisateur SET nom=:nom, prenom=:prenom, email=:email, mdp=:mdp, tel_fixe=:telfixe, tel_portable =:telportable, rue =:rue, cp=:cp, ville=:ville WHERE id_utilisateur=:id");
                $req->execute([
                "nom" => $utilisateur->getNom(),
                "prenom" => $utilisateur->getPrenom(),
                "email" => $utilisateur->getEmail(),
                "mdp" => $utilisateur->getMdp()[0],
                "telfixe" => $utilisateur->getTel_fixe(),
                "telportable" => $utilisateur->getTel_portable(),
                "rue" => $utilisateur->getRue(),
                "cp" => $utilisateur->getCp(),
                "ville" => $utilisateur->getVille(),
                "id"=>$utilisateur->getIdUtilisateur()]);
                return false;
            }else{
                return ("Un compte existe déjà avec cet e-mail !!");
            }
        }else{
            return (
                (empty($utilisateur->getNom()))?"Vous n'avez saisit aucun nom.":
                ((empty($utilisateur->getPrenom()))?"Vous n'avez saisit aucun prénom.":
                ((empty($utilisateur->getEmail()))?"Vous n'avez saisit aucun e-mail.":
                ((empty($utilisateur->getMdp()))?"Vous n'avez saisit aucun mot de passe.":
                (($utilisateur->getMdp()[0]!=$utilisateur->getMdp()[1])?"Le mot de passe et la confirmations ne sont pas identique.":
                ((empty($utilisateur->getRue())&&empty($utilisateur->getCp())&&empty($utilisateur->getVille()))?"Vous n'avez saisit aucune adresse.":
                "Oups, une erreur est survenue."))))));
        }
    }

    public function deleteUtilisateur($id){
        $bdd = (new Bdd())->getBdd();
        $req= $bdd->prepare("DELETE FROM utilisateur WHERE id=:id");
        $req->execute(["id"=>$id]);
    }

       
       

   
    
}

?>

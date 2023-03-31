<?php

class userController
{

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
                $req->execute(["nom" => $nom, "prenom" => $prenom, "email" => $email, "mdp" => $tel[1],"telfixe" => $tel[0],"telportable" => $mdp[0], "rue" => $rue, "cp" => $cp, "ville" => $ville]);
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

    public function UpdateUser($user){
        $bdd = (new Bdd())->getBdd();
         $req= $bdd->prepare("UPDATE utilisateur SET nom=:nom,prenom=:prenom,email=:email,mdp=:mdp,telfixe=:telfixe,telportable =: telportable , rue =:rue , cp=:cp ,ville =: ville WHERE id=:id");
         $req->execute(["nom" => $_POST["nom"],
         "prenom" => $_POST["prenom"],
          "email" => $_POST["email"],
          "mdp" => $_POST["mdp"],
          "telfixe" => $_POST["telfixe"],
          "telportable" => $_POST["telportable"],
          "rue" => $_POST["rue"],
          "cp" => $_POST["cp"],
          "ville" => $_POST["ville"],
          "id"=>$id]);
    }

    public function DeleteUser($user){
        $bdd = (new Bdd())->getBdd();
        $req= $bdd->prepare("DELETE FROM utilisateur WHERE id=:id");
        $req->execute(["id"=>$id]);
    }

       
       

   
    }
}

?>

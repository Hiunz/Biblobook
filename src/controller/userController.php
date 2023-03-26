<?php

class userController
{

    public function connexion($email, $mdp)
    {
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('SELECT id_utilisateur FROM utilisateur WHERE email = :email AND mdp = :mdp');
        $req->execute(["email" => $email, "mdp" => $mdp]);
        $res = $req->fetch(MYSQLI_ASSOC);

        if (!empty($res)) {
            return $res["id_utilisateur"];
        } else {
            return false;
        }
    }
    public function inscription($nom, $prenom, $email, $mdp, $tel, $rue, $cp, $ville){
        if (!empty($nom)&&!empty($prenom)&&!empty($email)&&!empty($mdp)&&$mdp[0]==$mdp[1]&&!empty($rue)&&!empty($cp)&&!empty($ville)) {
            $bdd = (new Bdd())->getBdd();

            $req = $bdd->prepare('select count(id_utilisateur) from utilisateur where email = :email');
            $req->execute(["email" => $email]);
            if ($req->fetch(MYSQLI_ASSOC)[0]==0) {
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
}

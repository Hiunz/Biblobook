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
    public function inscription($nom, $prenom, $email, $mdp, $rue, $cp, $ville){
        if (isset($nom)&&isset($prenom)&&isset($email)&&isset($mdp)&&$mdp[0]==$mdp[1]&&isset($rue)&&isset($cp)&&isset($ville)) {
            $bdd = (new Bdd())->getBdd();
            $req = $bdd->prepare('insert into utilisateur(nom, prenom, email, mdp, rue, cp, ville) values (:nom, :prenom, :email, :mdp, :rue, :cp, :ville)');
            $req->execute(["nom" => $nom, "prenom" => $prenom, "email" => $email, "mdp" => $mdp[0], "rue" => $rue, "cp" => $cp, "ville" => $ville]);
            return true;
        }else{
            return ((!isset($nom))?"Vous n'avez saisit aucun nom.":(!isset($penom))?"Vous n'avez saisit aucun prénom.":(!isset($email))?"Vous n'avez saisit aucun e-mail.":(!isset($mdp))?"Vous n'avez saisit aucun mot de passe.":($mdp[0]!=$mdp[1])?"Le mot de passe et la confirmations ne sont pas identique.":(!isset($rue)&&!isset($cp)&&!isset($ville))?"Vous n'avez saisit aucune adresse.":"Oups, une erreur est survenue.");
        }
    }
}

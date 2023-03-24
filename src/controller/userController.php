<?php

class userController
{

    public function connexion($login, $mdp)
    {
        $bdd = (new Bdd())->getBdd();
        $req = $bdd->prepare('SELECT id_utilisateur FROM utilisateur WHERE email = :email AND mdp = :mdp');
        $req->execute(["email" => $login, "mdp" => $mdp]);
        $res = $req->fetch(MYSQLI_ASSOC);

        if (!empty($res)) {
            return new Utilisateur();
        } else {
            return false;
        }
    }
}

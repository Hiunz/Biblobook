<?php
    class ExemplaireController {
        public static function getUnusedExemplaire($emprunt){
            $bdd = (new Bdd())->getBdd();
            $req = $bdd->prepare('
                SELECT exemplaire.id_exemplaire
                FROM exemplaire
                LEFT JOIN emprunt ON exemplaire.id_exemplaire = emprunt.ref_exemplaire
                WHERE exemplaire.ref_livre = :reflivre
                AND (
                    emprunt.id_emprunt IS NULL
                    OR NOT (
                        (emprunt.date_start BETWEEN :start AND :end )
                        OR (emprunt.date_end BETWEEN :start AND :end )
                        OR (emprunt.date_start < :start AND emprunt.date_end > :end )
                    )
                );
            ');
            $req->execute(['reflivre'=>$emprunt->getLivre()->getId(), 'start'=>$emprunt->getDateStart(), 'end'=>$emprunt->getDateEnd()]);
            $res = $req->fetch(MYSQLI_ASSOC);
            if($res){ return $res[0]; } else { return false; }
        }

        public static function getExemplaire($id){
            $bdd = (new Bdd())->getBdd();
            $req = $bdd->prepare('SELECT exemplaire.*, livre.* from exemplaire inner join livre on exemplaire.ref_livre = livre.id_livre where exemplaire.id_exemplaire = :id ;');
            $req->execute(['id'=>$id]);
            $res = $req->fetch(MYSQLI_ASSOC);
            if($res){
                return new Exemplaire($id, LivreController::getLivre($res['id_livre'])); 
            } else { return false; }
        }

    }

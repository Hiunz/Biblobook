<?php

class RetourLivreController {


    // Méthode pour le retour du livre
    public function retournerLivre($empruntId)
    {
        $emprunt = Emprunt::find($empruntId);

        if ($emprunt->getEtat() == "en cours") {
            $emprunt->setEtat("terminé");
            $emprunt->save();

            $livre = $emprunt->getLivre();

            $livre->setDisponible(true);
            $livre->save();

            return "Livre retourné avec succès !";
        } else {
            return "Cet emprunt est déjà terminé.";
        }
    }

    // Méthode pour vérifier si un livre est en retard
    public function livreEnRetard($empruntId)
    {
        $emprunt = Emprunt::find($empruntId);

        // Vérifier si l'emprunt est en cours
        if ($emprunt->getEtat() == "en cours") {
            $dateLimite = new DateTime($emprunt->getDate());
            $dateLimite->add(new DateInterval("P" . $emprunt->getDelai() . "D"));

            // Vérifier si la date limite est passée
            $aujourdHui = new DateTime();
            if ($aujourdHui > $dateLimite) {
                return "Le livre est en retard !";
            } else {
                return "Le livre est toujours en cours d'emprunt.";
            }
        } else {
            return "Cet emprunt est déjà terminé.";
        }
    }


}
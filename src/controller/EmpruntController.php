<?php


class EmpruntController
{

    public function ajouterEmprunt($livreId, $utilisateurId, $dateEmprunt, $delai)
    {

        $livre = Livre::find($livreId);


        $emprunt = new Emprunt($dateEmprunt, $delai);


        $livre->ajouterEmprunt($emprunt);

        // Enregistrer l'emprunt dans la base de données
        $emprunt->save();


        $livre->setDisponible(false);
        $livre->save();


        $utilisateur = Utilisateur::find($utilisateurId);


        $utilisateur->ajouterEmprunt($emprunt);


        $utilisateur->save();


        return "Emprunt ajouté avec succès !";
    }

    // Méthode pour prolonger un emprunt
    public function prolongerEmprunt($empruntId, $nouveauDelai)
    {

        $emprunt = Emprunt::find($empruntId);


        if ($emprunt->getEtat() == "en cours") {
            // Prolonger l'emprunt avec le nouveau délai
            $emprunt->setDelai($nouveauDelai);
            $emprunt->save();


            return "Emprunt prolongé avec succès !";
        } else {

            return "Cet emprunt ne peut pas être prolongé.";
        }
    }

    // Méthode pour calculer la durée d'un emprunt en cours
    public function dureeEmprunt($empruntId)
    {

        $emprunt = Emprunt::find($empruntId);


        if ($emprunt->getEtat() == "en cours") {
            // Calculer la durée de l'emprunt en jours
            $dateEmprunt = new DateTime($emprunt->getDate());
            $aujourdHui = new DateTime();
            $duree = $aujourdHui->diff($dateEmprunt)->format("%a");


            return "Durée de l'emprunt : " . $duree . " jours";
        } else {

            return "cet emprunt est déjà fini";
        }
    }

    // Méthode pour réserver un livre
    public function reserverLivre($livreId, $utilisateurId)
    {
        $livre = Livre::find($livreId);

        if ($livre->getDisponible()) {
            $reservation = new Reservation();
            $reservation->setUtilisateurId($utilisateurId);
            $reservation->setLivreId($livreId);
            $reservation->setDate(date("Y-m-d"));

            $livre->ajouterReservation($reservation);

            $reservation->save();

            $livre->setDisponible(false);
            $livre->save();

            return "Réservation effectuée avec succès !";
        } else {
            return "Ce livre n'est pas disponible pour le moment.";
        }
    }

}
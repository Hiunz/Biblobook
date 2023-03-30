<?php


class EmpruntController
{

    // Méthode pour ajouter un emprunt à un livre
    public function ajouterEmprunt($livreId, $utilisateurId, $dateEmprunt, $delai)
    {
        // Récupérer le livre correspondant à l'ID
        $livre = Livre::find($livreId);

        // Créer un nouvel emprunt avec les informations fournies
        $emprunt = new Emprunt($dateEmprunt, $delai);

        // Ajouter l'emprunt à la liste des emprunts du livre
        $livre->ajouterEmprunt($emprunt);

        // Enregistrer l'emprunt dans la base de données
        $emprunt->save();

        // Mettre à jour la disponibilité du livre dans la base de données
        $livre->setDisponible(false);
        $livre->save();

        // Récupérer l'utilisateur correspondant à l'ID
        $utilisateur = Utilisateur::find($utilisateurId);

        // Ajouter l'emprunt à la liste des emprunts de l'utilisateur
        $utilisateur->ajouterEmprunt($emprunt);

        // Enregistrer l'utilisateur dans la base de données
        $utilisateur->save();

        // Retourner une réponse de succès
        return "Emprunt ajouté avec succès !";
    }

    // Méthode pour prolonger un emprunt
    public function prolongerEmprunt($empruntId, $nouveauDelai)
    {
        // Récupérer l'emprunt correspondant à l'ID
        $emprunt = Emprunt::find($empruntId);

        // Vérifier si l'emprunt est en cours
        if ($emprunt->getEtat() == "en cours") {
            // Prolonger l'emprunt avec le nouveau délai
            $emprunt->setDelai($nouveauDelai);
            $emprunt->save();

            // Retourner une réponse de succès
            return "Emprunt prolongé avec succès !";
        } else {
            // Si l'emprunt n'est pas en cours, renvoyer un message d'erreur
            return "Cet emprunt ne peut pas être prolongé.";
        }
    }

    // Méthode pour calculer la durée d'un emprunt en cours
    public function dureeEmprunt($empruntId)
    {
        // Récupérer l'emprunt correspondant à l'ID
        $emprunt = Emprunt::find($empruntId);

        // Vérifier si l'emprunt est en cours
        if ($emprunt->getEtat() == "en cours") {
            // Calculer la durée de l'emprunt en jours
            $dateEmprunt = new DateTime($emprunt->getDate());
            $aujourdHui = new DateTime();
            $duree = $aujourdHui->diff($dateEmprunt)->format("%a");

            // Retourner la durée de l'emprunt en jours
            return "Durée de l'emprunt : " . $duree . " jours";
        } else {
            // Si l'empr
            return "cet emprunt est déjà fini";
        }
    }
}
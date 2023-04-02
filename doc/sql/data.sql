-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 02 avr. 2023 à 20:09
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblobook`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id_auteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `ref_pays` int(11) NOT NULL,
  PRIMARY KEY (`id_auteur`),
  KEY `fk_auteur_pays` (`ref_pays`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ecrire`
--

DROP TABLE IF EXISTS `ecrire`;
CREATE TABLE IF NOT EXISTS `ecrire` (
  `ref_livre` int(11) NOT NULL,
  `ref_auteur` int(11) NOT NULL,
  PRIMARY KEY (`ref_livre`,`ref_auteur`),
  KEY `fk_ecrire_auteur` (`ref_auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `edition`
--

DROP TABLE IF EXISTS `edition`;
CREATE TABLE IF NOT EXISTS `edition` (
  `id_edition` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_edition`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `id_emprunt` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `delais` int(3) NOT NULL,
  `ref_exemplaire` int(11) NOT NULL,
  `ref_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_emprunt`),
  KEY `fk_emprunt_exemplaire` (`ref_exemplaire`),
  KEY `fk_emprunt_utilisateur` (`ref_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

DROP TABLE IF EXISTS `exemplaire`;
CREATE TABLE IF NOT EXISTS `exemplaire` (
  `id_exemplaire` int(11) NOT NULL AUTO_INCREMENT,
  `ref_livre` int(11) NOT NULL,
  `ref_edition` int(11) NOT NULL,
  PRIMARY KEY (`id_exemplaire`),
  KEY `fk_exemplaire_edition` (`ref_edition`),
  KEY `fk_exemplaire_livre` (`ref_livre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id_livre` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `annee` varchar(4) NOT NULL,
  `resume` text NOT NULL,
  `edition` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_livre`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `titre`, `annee`, `resume`, `edition`, `categorie`) VALUES
(4, 'A la recherche du temps perdu', '1913', 'Le narrateur, adulte, y explore divers souvenirs de tous les âges de sa vie. Mais « À la recherche du temps perdu » n\'est pas simplement le récit de ces souvenirs : c\'est une réflexion sur la littérature, la mémoire et le temps.', 'Hachette', 'Roman'),
(5, 'Voyage au bout de la nuit', '1932', 'Bardamu s\'engage dans l\'armée par hasard et découvre l\'horreur de la première guerre mondiale, mais se lie d\'amitié avec Robinson, son frère d\'arme. Blessé, puis réformé, il fréquente quelques femmes de basse condition (Lola, Musyne) puis quitte la France pour l\'Afrique.', 'Editis', 'Roman'),
(6, 'L’Etranger', '1942', 'Publié en 1942, l\'Étranger retrace l\'histoire d\'un homme ordinaire soumis à l\'absurdité de l\'existence et de la condition. Rédigé au passé, ce récit propose de suivre le parcours de Meursault, de l\'annonce du décès de sa mère jusqu\'à sa condamnation pour homicide, un an plus tard.', 'Gallimard', 'Roman'),
(7, 'Alcools ', '1913', 'Alcools est un recueil pluriel, polyphonique, qui explore de nombreux aspects de la poésie, allant de l\'élégie au vers libre, mélangeant le quotidien aux paysages rhénans dans une poésie qui se veut expérimentale, alliant un travail sur la forme et sur l\'esthétique à un hermétisme et un art du choc.', 'La Martinière', 'Recueil'),
(8, 'Belle du Seigneur', '1968', 'Belle du Seigneur est le récit d\'une passion naissante et fulgurante (mai 1935) qui peu à peu se désagrège entre Solal et Ariane. Aussi belle est l\'éclosion de leur amour, aussi morbide en est la chute lorsque l\'enfer du couple, l\'ennui, et la volonté illusoire de perfection aura eu raison d\'eux.', 'Libella', 'Tragédie'),
(9, 'Mémoires d’Hadrien', '1951', 'Les Mémoires d\'Hadrien sont une réflexion sur le pouvoir. Hadrien réprouve l\'art de gouverner de Trajan qui repose sur l\'autorité, la guerre et la conquête. En humaniste, il préfère un règne fondé sur la modération et la pacifisme, tout en s\'inquiétant de la violence nécessaire et inhérente à l\'exercice du pouvoir.', 'Aparis', 'Historique'),
(10, 'La Trilogie des jumeaux', '1986', 'Klaus et Lucas sont jumeaux. La ville est en guerre, et ils sont envoyés à la campagne, chez leur grand-mère. Une grand-mère affreuse, sale et méchante, qui leur mènera la vie dure. Pour faire face aux atrocités qui les entourent, Klaus et Lucas vont entreprendre seuls une étrange éducation.', 'Albin Michel', 'Roman'),
(11, 'L’Usage du monde', '1963', 'Eté 1953 Nicolas Bouvier, un jeune homme de 24 ans décide de quitter Genève et son université pour se lancer dans un voyage aux confins de la Turquie. Il vise la Turquie, l\'Iran, Kaboul puis la frontière avec l\'Inde. Il est accompagné dans son périple par Thierry Vernet, un ami dessinateur.', 'Actes Sud', 'Récit de voyage'),
(12, 'En attendant Godot', '1952', 'Deux curieux personnages à l\'allure de clochards, Vladimir et Estragon, se rencontrent dans un lieu imprécis, au pied d\'un arbre squelettique. Leur but : attendre Godot, un énigmatique personnage dont on se saura jamais rien. Ils ne savent pas quand il viendra, ni même s\'il viendra vraiment.', 'Hachette', 'Théâtre'),
(13, 'Paroles ', '1945', 'Le recueil Paroles (1945) offre une poésie souvent corrosive, contestataire, parfois drôle et tendre, écrite avec des mots de tous les jours et donc accessible au plus grand nombre. Le poète invite le lecteur à refuser de soumettre sa pensée et à réfléchir par lui-même ; le poète transmet ainsi un message de liberté.', 'Editis', 'Recueil'),
(14, 'L’Ecume des jours', '1947', 'Dans \"L\'écume des jours\", tout se passe comme dans un rêve, un très beau rêve presque réaliste qui tourne en cauchemar surnaturel. La vie paisible de Colin, héros sans qualité spécial, avec son cuisinier habile, disciple de Gouffé, sera bouleversée le jour où il décide de tomber amoureux et de chercher une femme.', 'Gallimard', 'Roman'),
(15, 'La Prose du Transsibérien', '1913', 'La Prose du Transsibérien relate le voyage d\'un jeune homme, Blaise Cendrars lui-même, dans le Transsibérien allant de Moscou à Kharbine (Harbin) en compagnie de Jehanne, « Jeanne Jeannette Ninette » qui au fil des vers et du trajet se révèle être une fille de joie.', 'La Martinière', 'Poème'),
(16, 'La Promesse de l’aube', '1960', 'La Promesse de l\'aube est le récit de l\'amour inconditionnel qui lia Romain Gary à sa mère, tout au long de sa vie. N\'ayant pu vivre la vie qu\'elle aurait souhaité avoir, elle reporta ses ambitions sur Roman. Elle s\'efforça de lui offrir la meilleure éducation possible.', 'Libella', 'Roman autobiographique'),
(17, 'Vies minuscules', '1984', 'Dans Vies minuscules, il raconte, à travers un double, comment un écrivain naît au grand jour, comment une bibliothèque se constitue, comment on est façonné par le destin des autres, comment les vies simples sont toujours des vies complexes, comment la littérature et la géographie se fondent en un style singulier.', 'Aparis', 'Récit romancé'),
(18, 'Capitale de la douleur', '1926', 'Paris, capitale des Années folles. Malgré l\'effervescence littéraire et artistique, le poète Paul Éluard est rongé par une douleur intime : sa femme, Gala, est éprise du peintre Max Ernst et s\'éloigne peu à peu de lui. Il écrit alors ces textes, qui comptent aujourd\'hui parmi les plus beaux poèmes d\'amour.', 'Albin Michel', 'Recueil de poème'),
(19, 'La Condition humaine', '1933', 'La Condition humaine relate le parcours d\'un groupe de révolutionnaires communistes préparant le soulèvement de la ville de Shanghai. Au moment où commence le récit, le 21 mars 1927 , communistes et nationalistes préparent une insurrection contre le gouvernement.', 'Actes Sud', 'Roman'),
(20, 'La Vie mode d’emploi', '1978', 'Il retrace en quatre-vingt-dix-neuf chapitres la vie d\'un immeuble (un chapitre par pièce), avec ses habitants présents ou passés, leur histoire et les objets qui remplissent les différentes pièces. C\'est une narration titanesque et une tentative d\'épuisement du réel que Perec a judicieusement sous-titrée Romans.', 'Hachette', 'Roman'),
(21, 'L’Amant ', '1984', 'Le livre raconte la découverte précoce de la sexualité dans l\'Indochine des années 30. La narratrice explore les souvenirs d\'une enfance tourmentée au sein d\'une famille dysfonctionnelle. On y croise une mère au bord de la folie, un frère tyrannique et un \"petit frère\" brisé.', 'Editis', 'Roman autobiographique'),
(22, 'Le Parti pris des choses', '1942', 'Le parti pris des choses est un recueil de poèmes publié par Francis Ponge en 1942. Les poèmes de ce recueil s\'attachent à décrire des éléments du quotidien, choisis chacun pour son extrême banalité. Il s\'agit ainsi pour lui de rendre compte de la beauté des choses du monde, souvent oubliée dans leur usage.', 'Gallimard', 'Recueil de poèmes'),
(23, 'La Route des Flandres', '1960', 'Le capitaine de Reixach est abattu mystérieusement au cours de la débâcle de juin 1940 par un parachutiste allemand. Mais cette mort intrigue, traverse toute la mémoire et les pensées de son cousin Georges, simple cavalier qui cherche à comprendre. Le capitaine aurait-il cherché à mourir ?', 'La Martinière', 'Roman de guerre'),
(24, 'Fureur et Mystère', '1948', 'Fureur et mystère décrit la transformation d\'un « je », qui va s\'affirmer responsable devant ses contemporains, reconnaîtra la fragilité de l\'écriture poétique, tout en posant à la fois la nécessité de celle-ci pour l\'action et son indépendance à l\'égard des circonstances.', 'Libella', 'Recueil de poèmes'),
(25, 'La Place', '1983', '« La Place » est un court texte autobiographique d’Annie Ernaux publié en 1983. Caractérisé par la neutralité de son style, il a remporté le Prix Renaudot. Le livre a la particularité de ne pas être découpé en chapitres : on s’appuiera ici sur une division par partie suivant la chronologie du récit.', 'Aparis', 'Roman autobiographique'),
(26, 'Les Années', '2008', 'Le récit oscille entre des descriptions de photos décrivant l\'autrice, prises entre 1941 et 2006, et une peinture de l\'époque à laquelle ces photos ont été prises à travers les souvenirs qui se sont gravés dans son esprit, choisis pour leur pertinence sociologique.', 'Albin Michel', 'Roman autobiographique'),
(27, 'Paysages avec figures absentes', '1970', 'Cet ensemble de textes sur la campagne contient aussi de très belles méditations sur le travail du poète, sur sa condition d\'homme démuni et incertain, privé de tout recours à une foi ou à une idéologie rassurantes. La perception et le sentiment de la nature sont d\'une extrême délicatesse et d\'une rare ferveur.', 'Actes Sud', 'Recueil de poèmes'),
(28, 'Aline ', '1905', 'Une jeune paysanne est attirée par Julien Damon, le coq du village. Son amour grandit, mais il s\'éteint vite chez Julien. Aline (1905) est un chef-d\'oeuvre de jeunesse, une \"symphonie pastorale\" où Ramuz décrit avec subtilité la passion et le revirement des cœurs.', 'Hachette', 'Roman');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id_pays` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pays`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `tel_fixe` varchar(15) NOT NULL,
  `tel_portable` varchar(15) NOT NULL,
  `rue` varchar(80) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `mdp`, `tel_fixe`, `tel_portable`, `rue`, `cp`, `ville`, `admin`) VALUES
(2, 'Zins', 'Hugo', 'email@email', 'fixe', 'portable', 'mdp', 'undefined Adresse 1', '13114', 'Puyloubier', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD CONSTRAINT `fk_auteur_pays` FOREIGN KEY (`ref_pays`) REFERENCES `pays` (`id_pays`);

--
-- Contraintes pour la table `ecrire`
--
ALTER TABLE `ecrire`
  ADD CONSTRAINT `fk_ecrire_auteur` FOREIGN KEY (`ref_auteur`) REFERENCES `auteur` (`id_auteur`),
  ADD CONSTRAINT `fk_ecrire_livre` FOREIGN KEY (`ref_livre`) REFERENCES `livre` (`id_livre`);

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `fk_emprunt_exemplaire` FOREIGN KEY (`ref_exemplaire`) REFERENCES `exemplaire` (`id_exemplaire`),
  ADD CONSTRAINT `fk_emprunt_utilisateur` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `fk_exemplaire_edition` FOREIGN KEY (`ref_edition`) REFERENCES `edition` (`id_edition`),
  ADD CONSTRAINT `fk_exemplaire_livre` FOREIGN KEY (`ref_livre`) REFERENCES `livre` (`id_livre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

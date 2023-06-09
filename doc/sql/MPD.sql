
DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id_auteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `ref_pays` int(11) NOT NULL,
  PRIMARY KEY (`id_auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `ecrire`;
CREATE TABLE IF NOT EXISTS `ecrire` (
  `ref_livre` int(11) NOT NULL,
  `ref_auteur` int(11) NOT NULL,
  PRIMARY KEY (`ref_livre`,`ref_auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `id_emprunt` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `ref_exemplaire` int(11) NOT NULL,
  `ref_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_emprunt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `exemplaire`;
CREATE TABLE IF NOT EXISTS `exemplaire` (
  `id_exemplaire` int(11) NOT NULL AUTO_INCREMENT,
  `ref_livre` int(11) NOT NULL,
  PRIMARY KEY (`id_exemplaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `admin` BOOLEAN NOT NULL DEFAULT FALSE,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id_livre` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `annee` varchar(4) NOT NULL,
  `resume` text NOT NULL,
  `edition` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_livre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id_pays` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pays`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `auteur`
  ADD CONSTRAINT `fk_auteur_pays` FOREIGN KEY (`ref_pays`) REFERENCES `pays` (`id_pays`);

ALTER TABLE `ecrire`
  ADD CONSTRAINT `fk_ecrire_auteur` FOREIGN KEY (`ref_auteur`) REFERENCES `auteur` (`id_auteur`),
  ADD CONSTRAINT `fk_ecrire_livre` FOREIGN KEY (`ref_livre`) REFERENCES `livre` (`id_livre`);

ALTER TABLE `emprunt`
  ADD CONSTRAINT `fk_emprunt_exemplaire` FOREIGN KEY (`ref_exemplaire`) REFERENCES `exemplaire` (`id_exemplaire`),
  ADD CONSTRAINT `fk_emprunt_utilisateur` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

ALTER TABLE `exemplaire`
  ADD CONSTRAINT `fk_exemplaire_livre` FOREIGN KEY (`ref_livre`) REFERENCES `livre` (`id_livre`);


-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 03 nov. 2019 à 12:41
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `ajoutCommentaire`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutCommentaire` (IN `idEvent` INT, IN `commentaire` VARCHAR(255))  BEGIN
insert into commentaires (idEvent, commentaire) values (idEvent, commentaire);
END$$

DROP PROCEDURE IF EXISTS `ajouterFournitures`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouterFournitures` (IN `idEvent` INT, IN `fourniture` VARCHAR(255))  BEGIN
INSERT into fournitures (idEvent, fourniture, quantite) values(idEvent, fourniture, 0);
END$$

DROP PROCEDURE IF EXISTS `ajouterInvites`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouterInvites` (IN `pseudo` VARCHAR(50), IN `idEvent` INT)  BEGIN
insert into invite (idUser, idEvent) 
(select users.idUser, evenement.idEvent from users
natural join evenement
where users.pseudo = pseudo AND evenement.idEvent = idEvent
);
END$$

DROP PROCEDURE IF EXISTS `ajoutParticipant`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutParticipant` (IN `idEvent` INT, IN `idUser` INT)  BEGIN
update invite 
set participe = 1
where idEvent = invite.idEvent AND idUser = invite.idUser;
END$$

DROP PROCEDURE IF EXISTS `ajoutQuantite`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutQuantite` (IN `idEvent` INT(11), IN `nomFourniture` VARCHAR(255), IN `quantite` INT(255))  BEGIN
update fournitures
set  fournitures.quantite= quantite
where fournitures.idEvent = idEvent  AND   fournitures.fourniture = nomFourniture;
END$$

DROP PROCEDURE IF EXISTS `connexionUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `connexionUser` (IN `psd` VARCHAR(255), IN `pswd` VARCHAR(255))  BEGIN
select idUser, pseudo  from users
where psd = users.pseudo AND pswd = users.passwd;
END$$

DROP PROCEDURE IF EXISTS `creationUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `creationUser` (IN `psd` VARCHAR(50), IN `mail` VARCHAR(255), IN `pswd` VARCHAR(255))  BEGIN
INSERT INTO users(pseudo, email, passwd, dateCreation) values (psd, mail, pswd, NOW());
END$$

DROP PROCEDURE IF EXISTS `creerEvent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `creerEvent` (IN `nomEvent` VARCHAR(100), IN `hote` VARCHAR(50), IN `adresse` VARCHAR(100), IN `dateEvent` VARCHAR(50))  BEGIN
INSERT into evenement (nomEvent, hote, adresse, dateEvent) values (nomEvent, hote, adresse, dateEvent);
insert into invite (idUser, idEvent) 
(select idUser, MAX(idEvent) from users
join evenement on users.pseudo = evenement.hote
where hote = users.pseudo
group by idUser);
END$$

DROP PROCEDURE IF EXISTS `espaceMembre`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `espaceMembre` (IN `psd` VARCHAR(50))  BEGIN
select pseudo, email, substring(dateCreation, 1,10) as dateCrea from users
where psd = users.pseudo;
END$$

DROP PROCEDURE IF EXISTS `listeCommentaire`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listeCommentaire` (IN `idEvent` INT)  BEGIN
select commentaire from commentaires
where idEvent = commentaires.idEvent;
END$$

DROP PROCEDURE IF EXISTS `listeFourniture`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listeFourniture` (IN `idEvent` INT)  BEGIN
select fourniture, quantite  from fournitures
where idEvent = fournitures.idEvent;
END$$

DROP PROCEDURE IF EXISTS `listeInvites`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listeInvites` (IN `id` INT)  BEGIN
select evenement.idEvent,  pseudo from invite
join users on invite.idUser = users.idUser
join evenement on invite.idEvent = evenement.idEvent
where id = evenement.idEvent;
END$$

DROP PROCEDURE IF EXISTS `listeParticipant`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listeParticipant` (IN `idEvent` INT)  BEGIN
select evenement.idEvent,  pseudo from invite
join users on invite.idUser = users.idUser
join evenement on invite.idEvent = evenement.idEvent
where idEvent = evenement.idEvent AND invite.participe = 1;
END$$

DROP PROCEDURE IF EXISTS `modifMdp`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `modifMdp` (IN `psd` VARCHAR(50), IN `mdp` VARCHAR(255))  BEGIN
update users
set users.passwd = mdp
where users.pseudo = psd;
END$$

DROP PROCEDURE IF EXISTS `nombreComm`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `nombreComm` (IN `idEvent` INT)  BEGIN
select idEvent, count(commentaire) as nombreComm from commentaires
where idEvent = commentaires.idEvent;
END$$

DROP PROCEDURE IF EXISTS `nombreFour`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `nombreFour` (IN `idEvent` INT)  BEGIN
select idEvent, count(fourniture) as nombreFour from fournitures
where idEvent = fournitures.idEvent;
END$$

DROP PROCEDURE IF EXISTS `nombreInv`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `nombreInv` (IN `idEvent` INT)  BEGIN
select idEvent, count(idUser)-1 as nombreInv from invite
where idEvent = invite.idEvent;
END$$

DROP PROCEDURE IF EXISTS `nombreParticipant`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `nombreParticipant` (IN `idEvent` INT)  BEGIN
select count(participe) as participant from invite
where invite.participe = 1 AND idEvent = invite.idEvent;
END$$

DROP PROCEDURE IF EXISTS `supprCommentaire`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `supprCommentaire` (IN `idEvent` INT, IN `commentaire` VARCHAR(255))  BEGIN
delete from commentaires
where commentaires.idEvent = idEvent AND  commentaires.commentaire = commentaire;
END$$

DROP PROCEDURE IF EXISTS `supprFourniture`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `supprFourniture` (IN `idEvent` INT, IN `fourniture` VARCHAR(255))  BEGIN
delete from fournitures
where fournitures.idEvent = idEvent AND  fournitures.fourniture = fourniture;
END$$

DROP PROCEDURE IF EXISTS `supprInvites`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `supprInvites` (IN `idEvent` INT, IN `psd` VARCHAR(50))  BEGIN
delete invite
from invite
natural join users
where invite.idEvent = idEvent 
AND 
users.pseudo = psd;
END$$

DROP PROCEDURE IF EXISTS `supprParticipant`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `supprParticipant` (IN `idEvent` INT, IN `idUser` INT)  BEGIN
update invite 
set participe = 0
where idEvent = invite.idEvent AND idUser = invite.idUser;
END$$

DROP PROCEDURE IF EXISTS `tousLesUsers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tousLesUsers` ()  BEGIN
select pseudo from users;
END$$

DROP PROCEDURE IF EXISTS `verifEmail`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `verifEmail` (IN `mail` VARCHAR(255))  BEGIN
select idUser from users
where mail = users.email; 
END$$

DROP PROCEDURE IF EXISTS `verifPseudo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `verifPseudo` (IN `psd` VARCHAR(255))  BEGIN
select idUser from users
where psd = users.pseudo;
END$$

DROP PROCEDURE IF EXISTS `vosEventFutur`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `vosEventFutur` (IN `hote` VARCHAR(100))  BEGIN
select idEvent, nomEvent, hote, adresse, dateEvent
from evenement
where hote = evenement.hote AND dateEvent > now();
END$$

DROP PROCEDURE IF EXISTS `vosEventPasse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `vosEventPasse` (IN `hote` VARCHAR(100))  BEGIN
select idEvent, nomEvent, hote, adresse, dateEvent
from evenement
where hote = evenement.hote AND dateEvent < now();
END$$

DROP PROCEDURE IF EXISTS `vosInvitAno`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `vosInvitAno` (IN `idEvent` INT)  BEGIN
select idEvent,nomEvent, hote, adresse, dateEvent
from evenement
where idEvent = evenement.idEvent;
END$$

DROP PROCEDURE IF EXISTS `vosInvitFutur`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `vosInvitFutur` (IN `id` INT, IN `psd` VARCHAR(100))  BEGIN
select evenement.idEvent, nomEvent, hote, adresse, dateEvent from evenement
join invite on evenement.idEvent = invite.idEvent
where id = invite.idUser AND evenement.hote != psd AND dateEvent > now() ;
END$$

DROP PROCEDURE IF EXISTS `vosInvitPasse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `vosInvitPasse` (IN `id` INT, IN `psd` VARCHAR(100))  BEGIN
select evenement.idEvent, nomEvent, hote, adresse, dateEvent from evenement
join invite on evenement.idEvent = invite.idEvent
where id = invite.idUser AND evenement.hote != psd AND dateEvent < now();
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `idEvent` int(11) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  KEY `fk_eventComm` (`idEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`idEvent`, `commentaire`) VALUES
(29, 'saleeee'),
(38, 'DALTON TERROR !!!!!!!!'),
(37, 'saleeee'),
(38, 'saleeee');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `idEvent` int(11) NOT NULL AUTO_INCREMENT,
  `nomEvent` varchar(100) NOT NULL,
  `hote` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `dateEvent` varchar(50) NOT NULL,
  PRIMARY KEY (`idEvent`),
  KEY `fk_nomEvent` (`nomEvent`),
  KEY `fk_hote` (`hote`),
  KEY `fk_eventComm` (`idEvent`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`idEvent`, `nomEvent`, `hote`, `adresse`, `dateEvent`) VALUES
(25, 'Soiree cartes', 'ambroise', 'rue des 3 combattants', '2019-10-15'),
(26, 'Soiree walibi', 'ambroise', 'rue des 52 combattants', '2019-10-21'),
(27, 'soiree php', 'ambroise', 'Rue de bruxelles 38, 1348 LLN', '2019-10-08'),
(28, 'sqsqsq', 'ambroise', 'rue des 3 combattants', '2019-10-06'),
(29, 'Soiree monopoly', 'dominik', 'Rue de bruxelles 38, 1348 LLN', '2019-10-24'),
(30, 'Soiree monopoly', 'dominik', 'rue', '2019-10-15'),
(31, 'walibi', 'dominik', 'rue des 3 combattants, 1348 LLN', '2019-10-09'),
(32, 'Â§jjÂ§jtttuj,tug,kut,gk', 'dominik', 'rue des 3 combattants', '2019-10-09'),
(33, 'zzzzzzz', 'dominik', 'rue des ciseaux', '2019-10-25'),
(34, 'kkkkkkkkkkkkkkkkk', 'dominik', 'kk@kk', '2019-10-26'),
(35, 'Soiree cartes', 'toto', 'rue des 3 combattants', '2019-10-26'),
(36, 'epheccccccccccccc', 'toto', 'Avenue du ciseau, 1348 Louvain-la-Neuve', '2019-10-30'),
(37, 'soiree php', 'toto', 'rue des 3 combattants', '2019-11-03'),
(38, 'walibi', 'dominik', 'rue des 3 combattants, 1348 LLN', '2019-11-03'),
(39, 'Soiree monopoly', 'toto', 'rue des 3 combattants, 1348 LLN', '2019-11-16');

-- --------------------------------------------------------

--
-- Structure de la table `fournitures`
--

DROP TABLE IF EXISTS `fournitures`;
CREATE TABLE IF NOT EXISTS `fournitures` (
  `idEvent` int(11) NOT NULL,
  `fourniture` varchar(255) NOT NULL,
  `quantite` int(255) NOT NULL,
  KEY `fk_fournEvent` (`idEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournitures`
--

INSERT INTO `fournitures` (`idEvent`, `fourniture`, `quantite`) VALUES
(29, 'tartines', 0),
(34, 'tartines', 6),
(38, 'tartines', 5),
(38, 'bac de biere', 0),
(37, 'tartines', 3);

-- --------------------------------------------------------

--
-- Structure de la table `invite`
--

DROP TABLE IF EXISTS `invite`;
CREATE TABLE IF NOT EXISTS `invite` (
  `idUser` int(11) NOT NULL,
  `idEvent` int(11) NOT NULL,
  `participe` int(11) DEFAULT '0',
  KEY `fk_nomEvent` (`idEvent`),
  KEY `fk_pseudo` (`idUser`),
  KEY `fk_fournEvent` (`idEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `invite`
--

INSERT INTO `invite` (`idUser`, `idEvent`, `participe`) VALUES
(64, 25, 0),
(62, 25, NULL),
(63, 25, NULL),
(64, 26, NULL),
(63, 26, NULL),
(64, 27, NULL),
(64, 28, NULL),
(63, 28, NULL),
(63, 29, NULL),
(63, 30, NULL),
(63, 31, NULL),
(63, 32, NULL),
(63, 33, NULL),
(63, 34, NULL),
(64, 34, NULL),
(62, 34, NULL),
(62, 35, NULL),
(62, 36, NULL),
(62, 30, NULL),
(63, 36, NULL),
(62, 37, 0),
(63, 38, NULL),
(62, 38, 0),
(64, 38, 1),
(64, 37, 1),
(62, 39, 0),
(63, 39, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUser`),
  KEY `fk_pseudo` (`pseudo`),
  KEY `fk_hote` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `pseudo`, `email`, `passwd`, `dateCreation`) VALUES
(62, 'toto', 'toto@ici.be', '3691308f2a4c2f6983f2880d32e29c84', '2019-10-20 10:25:53'),
(63, 'dominik', 'HE201451@students.ephec.be', 'd73bc916993092a2f670042a8dcc8961', '2019-10-20 10:26:17'),
(64, 'ambroise', 'ambroise@alo', '4bc92a7aeb9478e6bf3f989025232b22', '2019-10-20 10:26:42');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_eventComm` FOREIGN KEY (`idEvent`) REFERENCES `evenement` (`idEvent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `fk_hote` FOREIGN KEY (`hote`) REFERENCES `users` (`pseudo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fournitures`
--
ALTER TABLE `fournitures`
  ADD CONSTRAINT `fk_fournEvent` FOREIGN KEY (`idEvent`) REFERENCES `evenement` (`idEvent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `invite`
--
ALTER TABLE `invite`
  ADD CONSTRAINT `fk_nomEvent` FOREIGN KEY (`idEvent`) REFERENCES `evenement` (`idEvent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pseudo` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

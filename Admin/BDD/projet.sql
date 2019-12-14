-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  sam. 14 déc. 2019 à 16:37
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `projet`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutAnnonce` (IN `idUserr` INT, IN `nomRestee` VARCHAR(255), IN `quantiteRestee` INT, IN `descriptionRestee` VARCHAR(255), IN `adressee` VARCHAR(255))  BEGIN
insert into reste (idReste, idUser, nomReste, quantiteReste, description, adresse) 
values (NULL, idUserr,  nomRestee, quantiteRestee,  descriptionRestee, adressee);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutCommentaire` (IN `idEvent` INT, IN `commentaire` VARCHAR(255))  BEGIN
insert into commentaires (idEvent, commentaire) values (idEvent, commentaire);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouterFournitures` (IN `idEvent` INT, IN `fourniture` VARCHAR(255))  BEGIN
INSERT into fournitures (idEvent, fourniture, quantite) values(idEvent, fourniture, 0);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajouterInvites` (IN `pseudo` VARCHAR(50), IN `idEvent` INT)  BEGIN
insert into invite (idUser, idEvent) 
(select users.idUser, evenement.idEvent from users
natural join evenement
where users.pseudo = pseudo AND evenement.idEvent = idEvent
);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutParticipant` (IN `idEvent` INT, IN `idUser` INT)  BEGIN
update invite 
set participe = 1
where idEvent = invite.idEvent AND idUser = invite.idUser;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ajoutQuantite` (IN `idEvent` INT(11), IN `nomFourniture` VARCHAR(255), IN `quantite` INT(255))  BEGIN
update fournitures
set  fournitures.quantite= quantite
where fournitures.idEvent = idEvent  AND   fournitures.fourniture = nomFourniture;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `connexionUser` (IN `psd` VARCHAR(255), IN `pswd` VARCHAR(255))  BEGIN
select idUser, pseudo  from users
where psd = users.pseudo AND pswd = users.passwd;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `connexionUserApp` (IN `email` VARCHAR(100), IN `passwd` VARCHAR(255))  NO SQL
BEGIN
select * from users where email = users.email and passwd = users.passwd;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `creationUser` (IN `psd` VARCHAR(50), IN `mail` VARCHAR(255), IN `pswd` VARCHAR(255))  BEGIN
INSERT INTO users(pseudo, email, passwd, dateCreation) values (psd, mail, pswd, NOW());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `creerEvent` (IN `nomEvent` VARCHAR(100), IN `hote` VARCHAR(50), IN `adresse` VARCHAR(100), IN `dateEvent` VARCHAR(50), IN `heureEvent` VARCHAR(50))  BEGIN
INSERT into evenement (nomEvent, hote, adresse, dateEvent, heure) values (nomEvent, hote, adresse, dateEvent, heureEvent);
insert into invite (idUser, idEvent) 
(select idUser, MAX(idEvent) from users
join evenement on users.pseudo = evenement.hote
where hote = users.pseudo
group by idUser);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAnnonce` (IN `idReste` INT)  NO SQL
BEGIN 
DELETE FROM reste WHERE reste.idReste = idReste;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `espaceMembre` (IN `psd` VARCHAR(50))  BEGIN
select pseudo, email, substring(dateCreation, 1,10) as dateCrea from users
where psd = users.pseudo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `infoEvent` (IN `idEvent` INT)  BEGIN
select idEvent, nomEvent, adresse, dateEvent, heure from evenement
where idEvent = evenement.idEvent;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listeCommentaire` (IN `idEvent` INT)  BEGIN
select commentaire from commentaires
where idEvent = commentaires.idEvent;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listeFourniture` (IN `idEvent` INT)  BEGIN
select fourniture, quantite  from fournitures
where idEvent = fournitures.idEvent;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listeInvites` (IN `id` INT)  BEGIN
select evenement.idEvent,  pseudo, email from invite
join users on invite.idUser = users.idUser
join evenement on invite.idEvent = evenement.idEvent
where id = evenement.idEvent;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listeParticipant` (IN `idEvent` INT)  BEGIN
select evenement.idEvent,  pseudo from invite
join users on invite.idUser = users.idUser
join evenement on invite.idEvent = evenement.idEvent
where idEvent = evenement.idEvent AND invite.participe = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mailSupprInvite` (IN `pseudo` VARCHAR(50))  BEGIN
select email from users 
where users.pseudo = pseudo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `marcheRestes` (IN `userId` INT)  BEGIN
select *, users.email from reste
JOIN users on reste.idUser = users.idUser
where userId != reste.idUser;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mesAnnoncesMarche` (IN `userId` INT)  BEGIN
select * from reste
where userId = reste.idUser;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifAnnonce` (IN `idReste` INT, IN `nomReste` VARCHAR(255), IN `quantiteReste` INT, IN `description` VARCHAR(255), IN `adresse` VARCHAR(255), IN `idUser` INT)  NO SQL
BEGIN 
update reste set reste.nomReste = nomReste,reste.quantiteReste = quantiteReste, reste.adresse = adresse, reste.description = description, reste.idUser = idUser
where reste.idReste = idReste;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifEvent` (IN `idEvent` INT, IN `nomEvent` VARCHAR(100), IN `adresse` VARCHAR(100), IN `dateEvent` VARCHAR(50), IN `heure` VARCHAR(45))  BEGIN
update evenement
set evenement.nomEvent= nomEvent, evenement.adresse = adresse, evenement.dateEvent = dateEvent,evenement.heure = heure 
where evenement.idEvent = idEvent;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modifMdp` (IN `psd` VARCHAR(50), IN `mdp` VARCHAR(255))  BEGIN
update users
set users.passwd = mdp
where users.pseudo = psd;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nombreComm` (IN `idEvent` INT)  BEGIN
select idEvent, count(commentaire) as nombreComm from commentaires
where idEvent = commentaires.idEvent;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nombreFour` (IN `idEvent` INT)  BEGIN
select idEvent, count(fourniture) as nombreFour from fournitures
where idEvent = fournitures.idEvent;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nombreInv` (IN `idEvent` INT)  BEGIN
select idEvent, count(idUser)-1 as nombreInv from invite
where idEvent = invite.idEvent;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nombreParticipant` (IN `idEvent` INT)  BEGIN
select count(participe) as participant from invite
where invite.participe = 1 AND idEvent = invite.idEvent;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `suppEvent` (IN `idEvent` INT)  BEGIN
delete from commentaires where idEvent = commentaires.idEvent;
delete from fournitures where idEvent = fournitures.idEvent;
delete from invite where idEvent = invite.idEvent;
delete from evenement where idEvent = evenement.idEvent;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supprCommentaire` (IN `idEvent` INT, IN `commentaire` VARCHAR(255))  BEGIN
delete from commentaires
where commentaires.idEvent = idEvent AND  commentaires.commentaire = commentaire;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supprFourniture` (IN `idEvent` INT, IN `fourniture` VARCHAR(255))  BEGIN
delete from fournitures
where fournitures.idEvent = idEvent AND  fournitures.fourniture = fourniture;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supprInvites` (IN `idEvent` INT, IN `psd` VARCHAR(50))  BEGIN
delete invite
from invite
natural join users
where invite.idEvent = idEvent 
AND 
users.pseudo = psd;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supprParticipant` (IN `idEvent` INT, IN `idUser` INT)  BEGIN
update invite 
set participe = 0
where idEvent = invite.idEvent AND idUser = invite.idUser;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tousLesUsers` ()  BEGIN
select pseudo from users;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verifEmail` (IN `mail` VARCHAR(255))  BEGIN
select idUser from users
where mail = users.email; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verifPseudo` (IN `psd` VARCHAR(255))  BEGIN
select idUser from users
where psd = users.pseudo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `vosEventFutur` (IN `hote` VARCHAR(100))  BEGIN
select idEvent, nomEvent, hote, adresse, dateEvent, heure
from evenement
where hote = evenement.hote AND dateEvent > now();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `vosEventPasse` (IN `hote` VARCHAR(100))  BEGIN
select idEvent, nomEvent, hote, adresse, dateEvent, heure
from evenement
where hote = evenement.hote AND dateEvent < now();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `vosInvitAno` (IN `idEvent` INT)  BEGIN
select idEvent,nomEvent, hote, adresse, dateEvent
from evenement
where idEvent = evenement.idEvent;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `vosInvitFutur` (IN `id` INT, IN `psd` VARCHAR(100))  BEGIN
select evenement.idEvent, nomEvent, hote, adresse, dateEvent, heure, invite.participe from evenement
join invite on evenement.idEvent = invite.idEvent
where id = invite.idUser AND evenement.hote != psd AND dateEvent > now() ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `vosInvitPasse` (IN `id` INT, IN `psd` VARCHAR(100))  BEGIN
select evenement.idEvent, nomEvent, hote, adresse, dateEvent, heure from evenement
join invite on evenement.idEvent = invite.idEvent
where id = invite.idUser AND evenement.hote != psd AND dateEvent < now();
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `idEvent` int(11) NOT NULL,
  `commentaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`idEvent`, `commentaire`) VALUES
(29, 'saleeee'),
(38, 'DALTON TERROR !!!!!!!!'),
(37, 'saleeee'),
(38, 'saleeee'),
(43, 'trop bien ce commentaire'),
(60, 'trop bien ce commentaire bis');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `idEvent` int(11) NOT NULL,
  `nomEvent` varchar(100) NOT NULL,
  `hote` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `dateEvent` varchar(50) NOT NULL,
  `heure` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`idEvent`, `nomEvent`, `hote`, `adresse`, `dateEvent`, `heure`) VALUES
(26, 'Soiree walibi', 'ambroise', 'rue des 52 combattants', '2019-10-21', NULL),
(27, 'soiree php', 'ambroise', 'Rue de bruxelles 38, 1348 LLN', '2019-10-08', NULL),
(28, 'sqsqsq', 'ambroise', 'rue des 3 combattants', '2019-10-06', NULL),
(29, 'Soiree monopoly', 'dominik', 'Rue de bruxelles 38, 1348 LLN', '2019-10-24', NULL),
(30, 'Soiree monopoly', 'dominik', 'rue', '2019-10-15', NULL),
(31, 'walibi', 'dominik', 'rue des 3 combattants, 1348 LLN', '2019-10-09', NULL),
(32, 'Â§jjÂ§jtttuj,tug,kut,gk', 'dominik', 'rue des 3 combattants', '2019-10-09', NULL),
(33, 'zzzzzzz', 'dominik', 'rue des ciseaux', '2019-10-25', NULL),
(34, 'kkkkkkkkkkkkkkkkk', 'dominik', 'kk@kk', '2019-10-26', NULL),
(35, 'Soiree cartes', 'toto', 'rue des 3 combattants', '2019-10-26', NULL),
(36, 'epheccccccccccccc', 'toto', 'Avenue du ciseau, 1348 Louvain-la-Neuve', '2019-10-30', NULL),
(37, 'soiree php', 'toto', 'rue des 3 combattants', '2019-11-03', NULL),
(38, 'walibi', 'dominik', 'rue des 3 combattants, 1348 LLN', '2020-11-03', NULL),
(41, 'alo', 'dominik', 'alo', '2019-11-22', NULL),
(42, 'Soiree monopoly', 'toto', 'rue des 3 combattants', '2020-01-15', '20:00'),
(43, 'soiree php', 'dominik', 'Rue de bruxelles 38, 1348 LLN', '2020-12-16', '15:00'),
(60, 'Soirée foot à la barake', 'Remy', '90 rue de l\'eglise', '2020-06-25', '18:00'),
(61, 'Soirée fricadelle', 'Remy', '90 rue de l\'eglise', '2020-11-2', '18:00');

-- --------------------------------------------------------

--
-- Structure de la table `fournitures`
--

CREATE TABLE `fournitures` (
  `idEvent` int(11) NOT NULL,
  `fourniture` varchar(255) NOT NULL,
  `quantite` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournitures`
--

INSERT INTO `fournitures` (`idEvent`, `fourniture`, `quantite`) VALUES
(29, 'tartines', 0),
(34, 'tartines', 6),
(38, 'tartines', 5),
(38, 'bac de biere', 0),
(37, 'tartines', 3),
(43, 'cannettes de coca', 4),
(60, 'cannette de cara', 45);

-- --------------------------------------------------------

--
-- Structure de la table `gestionrestes`
--

CREATE TABLE `gestionrestes` (
  `idUser` int(11) NOT NULL,
  `nomReste` varchar(255) NOT NULL,
  `quantiteReste` int(255) NOT NULL,
  `descriptionReste` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gestionrestes`
--

INSERT INTO `gestionrestes` (`idUser`, `nomReste`, `quantiteReste`, `descriptionReste`, `adresse`) VALUES
(65, 'alo', 10, 'alo', 'alo'),
(69, 'Bière', 2, 'Fauthygkgb', 'Utfuyfiuyguyyuffyfig'),
(69, 'Biera', 15, 'POUR IBRA', '90 rue fica'),
(69, 'Biera', 14, 'Vive la biere ', '9 rue de trazegnies'),
(69, 'Biera', 10, 'Remy', '9 rue fica'),
(69, 'Biera', 10, 'Remy', '9 rue ficus'),
(69, 'Bierazzz', 12, 'Vive la gnôle', '90 rue fica'),
(69, 'Bierazzz', 12, 'Vive la gnôle', '90 rue fica'),
(70, 'Chips', 15, 'Lays au sel,poivre,paprika', '56 rue du poirier '),
(70, 'Bouteille d’alcool', 4, 'Vodka, Rhum', '56 avenue pomme'),
(70, 'Troupeau de vitre', 51, 'Meuh meuh', 'Dans le champ');

-- --------------------------------------------------------

--
-- Structure de la table `invite`
--

CREATE TABLE `invite` (
  `idUser` int(11) NOT NULL,
  `idEvent` int(11) NOT NULL,
  `participe` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `invite`
--

INSERT INTO `invite` (`idUser`, `idEvent`, `participe`) VALUES
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
(65, 38, 0),
(63, 41, 0),
(62, 42, 0),
(63, 43, 0),
(62, 43, 0),
(70, 43, 0),
(70, 38, 1),
(62, 43, 1),
(66, 60, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reste`
--

CREATE TABLE `reste` (
  `idReste` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `nomReste` varchar(255) CHARACTER SET latin1 NOT NULL,
  `quantiteReste` int(255) NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL,
  `adresse` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reste`
--

INSERT INTO `reste` (`idReste`, `idUser`, `nomReste`, `quantiteReste`, `description`, `adresse`) VALUES
(3, 69, 'Chips Lays', 2, 'Deux paquets de chips Lays Sel et Paprika', '2 rue de l\'église '),
(7, 70, 'Télévision 4K', 1, 'Grosse télé', 'Rue du gazomètre '),
(8, 63, 'TestRefreshIIIINNNNGNGGGGGGG', 12, 'testResfreshINGGGGGGGGGGGG', 'resfreeeeeeeeeesh rue '),
(10, 73, 'Nico', 1, 'Ttessst', 'Ère'),
(11, 69, 'Chips Pringles', 2, 'deux paquets de pringles au seul', '24 rue de l\'église '),
(12, 69, 'chips pringles', 4, '4 pots de pringles Sel', '90 rue de l\'eglise');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `pseudo`, `email`, `passwd`, `dateCreation`) VALUES
(62, 'toto', 'toto@ici.be', '098f6bcd4621d373cade4e832627b4f6', '2019-10-20 10:25:53'),
(63, 'dominik', 'HE201451@students.ephec.be', 'd73bc916993092a2f670042a8dcc8961', '2019-10-20 10:26:17'),
(64, 'ambroise', 'ambroise@alo', '4bc92a7aeb9478e6bf3f989025232b22', '2019-10-20 10:26:42'),
(65, 'momo', 'momo@momo', '18f3af6147ba96618064459da6dd90b1', '2019-11-04 14:33:30'),
(66, 'alo', 'alo@aluile', '18f3af6147ba96618064459da6dd90b1', '2019-11-04 14:36:05'),
(67, 'test', 'test@hotmail.com', 'test', '2019-12-05 09:00:22'),
(68, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2019-12-05 09:23:50'),
(69, 'Jean', 'Jean@hotmail.com', '098f6bcd4621d373cade4e832627b4f6', '2019-12-05 16:26:20'),
(70, 'Remy', 'Remy@hotmail.com', '098f6bcd4621d373cade4e832627b4f6', '2019-12-08 15:55:34'),
(71, 'Test', 'Test@hotmail.com', '098f6bcd4621d373cade4e832627b4f6', '2019-12-12 08:32:40'),
(72, 'Test', 'Test@hotmail.com', '098f6bcd4621d373cade4e832627b4f6', '2019-12-12 11:20:57'),
(73, 'Toto', 'Toto@hotmail.com', '098f6bcd4621d373cade4e832627b4f6', '2019-12-12 11:23:40');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD KEY `fk_eventComm` (`idEvent`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`idEvent`),
  ADD KEY `fk_nomEvent` (`nomEvent`),
  ADD KEY `fk_hote` (`hote`),
  ADD KEY `fk_eventComm` (`idEvent`);

--
-- Index pour la table `fournitures`
--
ALTER TABLE `fournitures`
  ADD KEY `fk_fournEvent` (`idEvent`);

--
-- Index pour la table `gestionrestes`
--
ALTER TABLE `gestionrestes`
  ADD KEY `fk_user` (`idUser`);

--
-- Index pour la table `invite`
--
ALTER TABLE `invite`
  ADD KEY `fk_nomEvent` (`idEvent`),
  ADD KEY `fk_pseudo` (`idUser`),
  ADD KEY `fk_fournEvent` (`idEvent`);

--
-- Index pour la table `reste`
--
ALTER TABLE `reste`
  ADD PRIMARY KEY (`idReste`),
  ADD KEY `fk_foreign_reste_user` (`idUser`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `fk_pseudo` (`pseudo`),
  ADD KEY `fk_hote` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `idEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `reste`
--
ALTER TABLE `reste`
  MODIFY `idReste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
-- Contraintes pour la table `gestionrestes`
--
ALTER TABLE `gestionrestes`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `invite`
--
ALTER TABLE `invite`
  ADD CONSTRAINT `fk_nomEvent` FOREIGN KEY (`idEvent`) REFERENCES `evenement` (`idEvent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pseudo` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reste`
--
ALTER TABLE `reste`
  ADD CONSTRAINT `fk_foreign_reste_user` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

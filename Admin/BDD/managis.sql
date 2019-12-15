CREATE database managis;
USE managis;

CREATE TABLE IF NOT EXISTS evenement (
  idEvent int(11) NOT NULL AUTO_INCREMENT,
  nomEvent varchar(100) NOT NULL,
  hote varchar(50) NOT NULL,
  adresse varchar(100) NOT NULL,
  dateEvent varchar(50) NOT NULL,
  heure varchar(45) DEFAULT NULL,
  PRIMARY KEY (idEvent),
  KEY fk_nomEvent (nomEvent),
  KEY fk_hote (hote),
  KEY fk_eventComm (idEvent)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS fournitures (
  idEvent int(11) NOT NULL,
  fourniture varchar(255) NOT NULL,
  quantite int(255) NOT NULL,
  KEY fk_fournEvent (idEvent)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS invite (
  idUser int(11) NOT NULL,
  idEvent int(11) NOT NULL,
  participe int(11) DEFAULT '0',
  KEY fk_nomEvent (idEvent),
  KEY fk_pseudo (idUser),
  KEY fk_fournEvent (idEvent)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS users (
  idUser int(11) NOT NULL AUTO_INCREMENT,
  pseudo varchar(50) NOT NULL,
  email varchar(255) NOT NULL,
  passwd varchar(255) NOT NULL,
  dateCreation timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (idUser),
  KEY fk_pseudo (pseudo),
  KEY fk_hote (pseudo)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS commentaires (
  idEvent int(11) NOT NULL,
  idUser int(11) NOT NULL,
  commentaire varchar(255) NOT NULL,
  KEY fk_eventComm (idEvent),
  KEY fk_userId (idUser)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE table IF NOT EXISTS reste (
  idReste int(11) NOT NULL AUTO_INCREMENT,
  idUser int(11) NOT NULL,
  nomReste varchar(255) CHARACTER SET latin1 NOT NULL,
  quantiteReste int(255) NOT NULL,
  description varchar(255) CHARACTER SET latin1 NOT NULL,
  adresse varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE commentaires
  ADD CONSTRAINT fk_eventComm FOREIGN KEY (idEvent) REFERENCES evenement (idEvent) ON DELETE NO ACTION ON UPDATE NO ACTION;



ALTER TABLE evenement
  ADD CONSTRAINT fk_hote FOREIGN KEY (hote) REFERENCES users (pseudo) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE fournitures
  ADD CONSTRAINT fk_fournEvent FOREIGN KEY (idEvent) REFERENCES evenement (idEvent) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE invite
  ADD CONSTRAINT fk_nomEvent FOREIGN KEY (idEvent) REFERENCES evenement (idEvent) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_pseudo FOREIGN KEY (idUser) REFERENCES users (idUser) ON DELETE NO ACTION ON UPDATE NO ACTION;
  
ALTER TABLE reste
  
  ADD KEY fk_foreign_reste_user (idUser);

ALTER TABLE reste
  ADD CONSTRAINT fk_foreign_reste_user FOREIGN KEY (idUser) REFERENCES users (idUser);
  
COMMIT;

delimiter / 
CREATE PROCEDURE ajoutAnnonce (IN idUserr INT, IN nomRestee VARCHAR(255), IN quantiteRestee INT, IN descriptionRestee VARCHAR(255), IN adressee VARCHAR(255))  BEGIN
insert into reste (idReste, idUser, nomReste, quantiteReste, description, adresse) 
values (NULL, idUserr,  nomRestee, quantiteRestee,  descriptionRestee, adressee);
END; 
/

delimiter / 
CREATE PROCEDURE deleteAnnonce (IN idReste INT) 
BEGIN 
DELETE FROM reste WHERE reste.idReste = idReste;
END;
/

delimiter / 
CREATE PROCEDURE marcheRestes (IN userId INT)  BEGIN
select * from reste 
where userId != reste.idUser;
END;
/

delimiter / 
CREATE PROCEDURE mesAnnoncesMarche (IN userId INT)  BEGIN
select * from reste
where userId = reste.idUser;
END;
/

delimiter / 
CREATE PROCEDURE modifAnnonce (IN idReste INT, IN nomReste VARCHAR(255), IN quantiteReste INT, IN description VARCHAR(255), IN adresse VARCHAR(255), IN idUser INT)  NO SQL
BEGIN 
update reste set reste.nomReste = nomReste,reste.quantiteReste = quantiteReste, reste.adresse = adresse, reste.description = description, reste.idUser = idUser
where reste.idReste = idReste;
END;
/



delimiter / 
CREATE  PROCEDURE ajoutCommentaire (IN idEvent INT, IN userId INT, IN commentaire VARCHAR(255))  BEGIN
insert into commentaires (idEvent, idUser, commentaire) values (idEvent, userId,  commentaire);
END; 
/

delimiter / 
CREATE PROCEDURE ajouterFournitures (IN idEvent INT, IN fourniture VARCHAR(255))  BEGIN
INSERT into fournitures (idEvent, fourniture, quantite) values(idEvent, fourniture, 0);
END; 
/

delimiter / 
CREATE  PROCEDURE ajouterInvites (IN pseudo VARCHAR(50), IN idEvent INT)  BEGIN
insert into invite (idUser, idEvent) 
(select users.idUser, evenement.idEvent from users
natural join evenement
where users.pseudo = pseudo AND evenement.idEvent = idEvent
);
END; 
/

delimiter / 
CREATE  PROCEDURE ajoutParticipant (IN idEvent INT, IN idUser INT)  BEGIN
update invite 
set participe = 1
where idEvent = invite.idEvent AND idUser = invite.idUser;
END; 
/

delimiter / 
CREATE  PROCEDURE ajoutQuantite (IN idEvent INT(11), IN nomFourniture VARCHAR(255), IN quantite INT(255))  BEGIN
update fournitures
set  fournitures.quantite= quantite
where fournitures.idEvent = idEvent  AND   fournitures.fourniture = nomFourniture;
END; 
/

delimiter / 
CREATE  PROCEDURE connexionUser (IN psd VARCHAR(255), IN pswd VARCHAR(255))  BEGIN
select idUser, email, pseudo  from users
where psd = users.pseudo AND pswd = users.passwd;
END; 
/


delimiter / 
CREATE  PROCEDURE creationUser (IN psd VARCHAR(50), IN mail VARCHAR(255), IN pswd VARCHAR(255))  BEGIN
INSERT INTO users(pseudo, email, passwd, dateCreation) values (psd, mail, pswd, NOW());
END; 
/

delimiter / 
CREATE  PROCEDURE creerEvent (IN nomEvent VARCHAR(100), IN hote VARCHAR(50), IN adresse VARCHAR(100), IN dateEvent VARCHAR(50), IN heureEvent VARCHAR(50))  BEGIN
INSERT into evenement (nomEvent, hote, adresse, dateEvent, heure) values (nomEvent, hote, adresse, dateEvent, heureEvent);
insert into invite (idUser, idEvent, participe) 
(select idUser, MAX(idEvent), 1 from users
join evenement on users.pseudo = evenement.hote
where hote = users.pseudo
group by idUser);
END; 
/

delimiter / 
CREATE  PROCEDURE espaceMembre (IN psd VARCHAR(50))  BEGIN
select pseudo, email, substring(dateCreation, 1,10) as dateCrea from users
where psd = users.pseudo;
END; 
/

delimiter / 
CREATE  PROCEDURE infoEvent (IN idEvent INT)  BEGIN
select nomEvent, adresse, dateEvent, heure from evenement
where idEvent = evenement.idEvent;
END; 
/

delimiter / 
CREATE  PROCEDURE listeCommentaire (IN idEvent INT)  BEGIN
select pseudo,  commentaire from commentaires
natural join users
where idEvent = commentaires.idEvent;
END; 
/

delimiter / 
CREATE  PROCEDURE listeFourniture (IN idEvent INT)  BEGIN
select fourniture, quantite  from fournitures
where idEvent = fournitures.idEvent;
END; 
/

delimiter / 
CREATE  PROCEDURE listeInvites (IN id INT)  BEGIN
select evenement.idEvent,  pseudo, email from invite
join users on invite.idUser = users.idUser
join evenement on invite.idEvent = evenement.idEvent
where id = evenement.idEvent;
END; 
/

delimiter / 
CREATE  PROCEDURE listeParticipant (IN idEvent INT)  BEGIN
select evenement.idEvent,  pseudo from invite
join users on invite.idUser = users.idUser
join evenement on invite.idEvent = evenement.idEvent
where idEvent = evenement.idEvent AND invite.participe = 1;
END; 
/

delimiter / 
CREATE  PROCEDURE mailSupprInvite (IN pseudo VARCHAR(50))  BEGIN
select email from users 
where users.pseudo = pseudo;
END; 
/

delimiter / 
CREATE  PROCEDURE modifEvent (IN idEvent INT, IN nomEvent VARCHAR(100), IN adresse VARCHAR(100), IN dateEvent VARCHAR(50), IN heure VARCHAR(45))  BEGIN
update evenement
set evenement.nomEvent= nomEvent, evenement.adresse = adresse, evenement.dateEvent = dateEvent,evenement.heure = heure 
where evenement.idEvent = idEvent;
END; 
/

delimiter / 
CREATE  PROCEDURE modifMdp (IN psd VARCHAR(50), IN mdp VARCHAR(255))  BEGIN
update users
set users.passwd = mdp
where users.pseudo = psd;
END; 
/

delimiter / 
CREATE  PROCEDURE nombreComm (IN idEvent INT)  BEGIN
select idEvent, count(commentaire) as nombreComm from commentaires
where idEvent = commentaires.idEvent;
END; 
/

delimiter / 
CREATE  PROCEDURE nombreFour (IN idEvent INT)  BEGIN
select idEvent, count(fourniture) as nombreFour from fournitures
where idEvent = fournitures.idEvent;
END; 
/

delimiter / 
CREATE  PROCEDURE nombreInv (IN idEvent INT)  BEGIN
select idEvent, count(idUser)-1 as nombreInv from invite
where idEvent = invite.idEvent;
END; 
/

delimiter / 
CREATE  PROCEDURE nombreParticipant (IN idEvent INT)  BEGIN
select count(participe) as participant from invite
where invite.participe = 1 AND idEvent = invite.idEvent;
END; 
/

delimiter / 
CREATE  PROCEDURE suppEvent (IN idEvent INT)  BEGIN
delete from commentaires where idEvent = commentaires.idEvent;
delete from fournitures where idEvent = fournitures.idEvent;
delete from invite where idEvent = invite.idEvent;
delete from evenement where idEvent = evenement.idEvent;
END; 
/

delimiter /
CREATE  PROCEDURE supprCommentaire (IN idEvent INT, IN commentaire VARCHAR(255))  BEGIN
delete from commentaires
where commentaires.idEvent = idEvent AND  commentaires.commentaire = commentaire;
END; /

delimiter / 
CREATE  PROCEDURE supprFourniture (IN idEvent INT, IN fourniture VARCHAR(255))  BEGIN
delete from fournitures
where fournitures.idEvent = idEvent AND  fournitures.fourniture = fourniture;
END; 
/

delimiter / 
CREATE  PROCEDURE supprInvites (IN idEvent INT, IN psd VARCHAR(50))  BEGIN
delete invite
from invite
natural join users
where invite.idEvent = idEvent 
AND 
users.pseudo = psd;
END; 
/

delimiter / 
CREATE  PROCEDURE supprParticipant (IN idEvent INT, IN idUser INT)  BEGIN
update invite 
set participe = 0
where idEvent = invite.idEvent AND idUser = invite.idUser;
END; 
/

delimiter / 
CREATE  PROCEDURE tousLesUsers ()  BEGIN
select pseudo from users;
END; 
/

delimiter / 
CREATE  PROCEDURE verifEmail (IN mail VARCHAR(255))  BEGIN
select idUser from users
where mail = users.email; 
END; 
/

delimiter / 
CREATE  PROCEDURE verifPseudo (IN psd VARCHAR(255))  BEGIN
select idUser from users
where psd = users.pseudo;
END; 
/

delimiter /
CREATE  PROCEDURE vosEventFutur (IN hote VARCHAR(100))  BEGIN
select idEvent, nomEvent, hote, adresse, dateEvent, heure
from evenement
where hote = evenement.hote AND dateEvent > now();
END; /

delimiter / 
CREATE  PROCEDURE vosEventPasse (IN hote VARCHAR(100))  BEGIN
select idEvent, nomEvent, hote, adresse, dateEvent, heure
from evenement
where hote = evenement.hote AND dateEvent < now();
END; 
/

delimiter / 
CREATE  PROCEDURE vosInvitAno (IN idEvent INT)  BEGIN
select idEvent,nomEvent, hote, adresse, dateEvent
from evenement
where idEvent = evenement.idEvent;
END; 
/

delimiter / 
CREATE  PROCEDURE vosInvitFutur (IN id INT, IN psd VARCHAR(100))  BEGIN
select evenement.idEvent, nomEvent, hote, adresse, dateEvent, heure from evenement
join invite on evenement.idEvent = invite.idEvent
where id = invite.idUser AND evenement.hote != psd AND dateEvent > now() ;
END; 
/

delimiter / 
CREATE  PROCEDURE vosInvitPasse (IN id INT, IN psd VARCHAR(100))  BEGIN
select evenement.idEvent, nomEvent, hote, adresse, dateEvent, heure from evenement
join invite on evenement.idEvent = invite.idEvent
where id = invite.idUser AND evenement.hote != psd AND dateEvent < now();
END; 
/

delimiter / 
CREATE PROCEDURE infoPopUp(IN idUser INT)
BEGIN
select count(participe) as invitations from invite
where idUser = invite.idUser AND participe=0;
END;
/

delimiter /
CREATE PROCEDURE mailInv(IN idUser INT)
BEGIN
select email from users 
where idUser = users.idUser;
END;
/

delete from mysql.user where user = 'root';
CREATE USER 'root'@'%' IDENTIFIED BY '4TujbpbjXV6FK6h2';
CREATE USER 'admin'@'%' IDENTIFIED BY 'yVLsgfgsQa3R4HRP';
CREATE USER 'admin'@'localhost' IDENTIFIED BY '5UeW3qMmh8pFcLDa';
GRANT ALL PRIVILEGES ON * . * TO 'admin'@'%';
GRANT ALL PRIVILEGES ON * . * TO 'root'@'%';
GRANT ALL PRIVILEGES ON * . * TO 'admin'@'localhost';
FLUSH PRIVILEGES;
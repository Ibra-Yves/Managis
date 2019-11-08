USE managis;

delimiter / 
CREATE  PROCEDURE ajoutCommentaire (IN idEvent INT, IN commentaire VARCHAR(255))  BEGIN
insert into commentaires (idEvent, commentaire) values (idEvent, commentaire);
END;
/

delimiter / 
CREATE  PROCEDURE ajouterFournitures (IN idEvent INT, IN fourniture VARCHAR(255))  BEGIN
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
CREATE  PROCEDURE ajoutQuantite (IN idEvent INT(11), IN nomFourniture VARCHAR(255), IN quantite INT(255))  BEGIN
update fournitures
set  fournitures.quantite= quantite
where fournitures.idEvent = idEvent  AND   fournitures.fourniture = nomFourniture;
END;
/

delimiter / 
CREATE  PROCEDURE connexionUser (IN psd VARCHAR(255), IN pswd VARCHAR(255))  BEGIN
select idUser, pseudo  from users
where psd = users.pseudo AND pswd = users.passwd;
END;
/

delimiter / 
CREATE  PROCEDURE creationUser (IN psd VARCHAR(50), IN mail VARCHAR(255), IN pswd VARCHAR(255))  BEGIN
INSERT INTO users(pseudo, email, passwd, dateCreation) values (psd, mail, pswd, NOW());
END;
/

delimiter / 
CREATE  PROCEDURE creerEvent (IN nomEvent VARCHAR(100), IN hote VARCHAR(50), IN adresse VARCHAR(100), IN dateEvent VARCHAR(50))  BEGIN
INSERT into evenement (nomEvent, hote, adresse, dateEvent) values (nomEvent, hote, adresse, dateEvent);
insert into invite (idUser, idEvent) 
(select idUser, MAX(idEvent) from users
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
CREATE  PROCEDURE infoSoirees (IN id INT)  BEGIN
select evenement.idEvent, nomEvent, hote, adresse, dateEvent from evenement
join invite on evenement.idEvent = invite.idEvent
where id = invite.idUser;
END;
/

delimiter / 
CREATE  PROCEDURE listeCommentaire (IN idEvent INT)  BEGIN
select commentaire from commentaires
where idEvent = commentaires.idEvent;
END;
/

delimiter / 
CREATE  PROCEDURE listeFourniture (IN idEvent INT)  BEGIN
select fourniture, quantite from fournitures
where idEvent = fournitures.idEvent;
END;
/

delimiter / 
CREATE  PROCEDURE listeInvites (IN id INT)  BEGIN
select evenement.idEvent,  pseudo from invite
join users on invite.idUser = users.idUser
join evenement on invite.idEvent = evenement.idEvent
where id = evenement.idEvent;
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
CREATE  PROCEDURE supprCommentaire (IN idEvent INT, IN commentaire VARCHAR(255))  BEGIN
delete from commentaires
where commentaires.idEvent = idEvent AND  commentaires.commentaire = commentaire;
END;
/

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

CREATE USER 'root'@'%' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON * . * TO 'root'@'%';
FLUSH PRIVILEGES;
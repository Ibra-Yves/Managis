CREATE database managis;
USE managis;
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

CREATE TABLE IF NOT EXISTS evenement (
  idEvent int(11) NOT NULL AUTO_INCREMENT,
  nomEvent varchar(100) NOT NULL,
  hote varchar(50) NOT NULL,
  adresse varchar(100) NOT NULL,
  dateEvent varchar(50) NOT NULL,
  PRIMARY KEY (idEvent),
  KEY fk_nomEvent (nomEvent),
  KEY fk_hote (hote),
  KEY fk_eventComm (idEvent)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS invite (
  idUser int(11) NOT NULL,
  idEvent int(11) NOT NULL,
  KEY fk_nomEvent (idEvent),
  KEY fk_pseudo (idUser),
  KEY fk_fournEvent (idEvent)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS fournitures (
  idEvent int(11) NOT NULL,
  fourniture varchar(255) NOT NULL,
  quantite int(255) NOT NULL,
  KEY fk_fournEvent (idEvent)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS commentaires (
  idEvent int(11) NOT NULL,
  commentaire varchar(255) NOT NULL,
  KEY fk_eventComm (idEvent)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



ALTER TABLE commentaires
  ADD CONSTRAINT fk_eventComm FOREIGN KEY (idEvent) REFERENCES evenement (idEvent) ON DELETE NO ACTION ON UPDATE NO ACTION;
  
ALTER TABLE evenement
  ADD CONSTRAINT fk_hote FOREIGN KEY (hote) REFERENCES users (pseudo) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE fournitures
  ADD CONSTRAINT fk_fournEvent FOREIGN KEY (idEvent) REFERENCES evenement (idEvent) ON DELETE NO ACTION ON UPDATE NO ACTION;
  
ALTER TABLE invite
  ADD CONSTRAINT fk_nomEvent FOREIGN KEY (idEvent) REFERENCES evenement (idEvent) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_pseudo FOREIGN KEY (idUser) REFERENCES users (idUser) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

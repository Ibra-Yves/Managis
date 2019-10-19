<?php
include_once 'INC/Events.php'; //On include les events
$events  = new Events(); //Instance de la classe event
if(!is_null($events->getRq())) die($events->send()); //En envoie la requete passée au accesseur dans event.php
include_once 'INC/template.php'; //On include la page qu'il faut après la requête


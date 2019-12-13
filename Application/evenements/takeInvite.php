<?php
include '../DBAccess/dbAccess.php';
$db = new dbAccess();
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$idEvent= $obj['idEvent']; //Met l id de user connecte que tu as dans ton JS en JSON
$recupInvite = $db->procCall('listeInvites', [$idEvent]);
//Faites un foreach ou quoi pour pas avoir de problèmes ... je le fais au cas ou
echo json_encode($recupInvite); //Decode le en JS
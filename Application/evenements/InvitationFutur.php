<?php
include '../DBAccess/dbAccess.php';
$db = new dbAccess();
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
//$idUser = 70;
//$pseudoInvite = 'Remy';

$idUser = $obj['userId']; //Met l'id user que tu récupères ici en json à partir du JS
$pseudoInvite = $obj['userName']; //Met le pesudo de user connecte que tu as dans ton JS en JSON
$invitFutur = $db->procCall('vosInvitFutur', [$idUser, $pseudoInvite]);
//Faites un foreach ou quoi pour pas avoir de problèmes ... je le fais au cas ou
echo json_encode($invitFutur); //Decode le en JS
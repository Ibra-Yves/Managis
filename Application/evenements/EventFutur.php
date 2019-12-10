<?php
include '../DBAccess/dbAccess.php';
$db = new dbAccess();
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$hote = $obj['userName']; //Met le pseudo de user connecte que tu as dans ton JS en JSON
$events = $db->procCall('vosEventFutur', [$hote]);
//Faites un foreach ou quoi pour pas avoir de problèmes ... je le fais au cas ou
echo json_encode($events); //Decode le en JS
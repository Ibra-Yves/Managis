<?php
include '../DBAccess/dbAccess.php';
$db = new dbAccess();
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
//$user = 70;
$user = $obj['userName']; //Met l id de user connecte que tu as dans ton JS en JSON
$pswd = hash('md5', $obj['newPswd']);
$modifMotDePasse = $db->procCall('modifMdp', [$user, $pswd]);
//Faites un foreach ou quoi pour pas avoir de problèmes ... je le fais au cas ou
echo json_encode($modifMotDePasse); //Decode le en JS
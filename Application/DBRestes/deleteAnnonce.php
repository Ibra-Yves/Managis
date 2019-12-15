<?php
include 'dbAccess.php';
//include '../DBAccess/dbAccess.php';
$db = new dbAccess();
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$idReste = $obj['idReste'];
$deleteAnnonce = $db->procCall('deleteAnnonce', [$idReste]);
//Faites un foreach ou quoi pour pas avoir de problèmes ... je le fais au cas ou
echo json_encode($deleteAnnonce); //Decode le en JS
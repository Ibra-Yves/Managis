<?php
include '../DBAccess/dbAccess.php';
$db = new dbAccess();
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$user = $obj['userId']; //Met l id de user connecte que tu as dans ton JS en JSON
$nomReste = $obj['nomReste'];
$quantiteReste =  $obj['quantiteReste'];
$descriptionReste = $obj['descriptionReste'];
$adresse = $obj['adresse'];
$idReste = $obj['idReste'];
$modifAnnonce = $db->procCall('modifAnnonce', [$idReste,$nomReste, $quantiteReste, $descriptionReste, $adresse, $user]);
//Faites un foreach ou quoi pour pas avoir de problèmes ... je le fais au cas ou
echo json_encode($modifAnnonce); //Decode le en JS
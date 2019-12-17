
<?php
include 'dbAccess.php';
//include '../DBAccess/dbAccess.php';
$db = new dbAccess();
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$user = $obj['userId']; //Met l id de user connecte que tu as dans ton JS en JSON
$nomReste = $obj['nomReste'];
$quantiteReste =  $obj['quantiteReste'];
$descriptionReste = $obj['descriptionReste'];
$adresse = $obj['adresse'];
$ajoutAnnonce = $db->procCall('ajoutAnnonce', [$user,$nomReste, $quantiteReste, $descriptionReste, $adresse]);
//Faites un foreach ou quoi pour pas avoir de problèmes ... je le fais au cas ou
echo json_encode($ajoutAnnonce); //Decode le en JS

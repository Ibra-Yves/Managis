<?php

include 'dbAccess.php';
//include '../DBAccess/dbAccess.php';
$db = new dbAccess();
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
//$user = 70;
$user = $obj['userId']; //Met l id de user connecte que tu as dans ton JS en JSON
$mesAnnonces = $db->procCall('mesAnnoncesMarche', [$user]);
//Faites un foreach ou quoi pour pas avoir de problèmes ... je le fais au cas ou
echo json_encode($mesAnnonces); //Decode le en JS

include 'dbconfig.php';
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$email = $obj['email'];
$nomReste = $obj['nomReste'];
$quantiteReste = $obj['quantiteReste'];
$descriptionReste = $obj['descriptionReste'];
$adresse = $obj['adresse'];

$Sql_Query = "select * from restes where email = '$email'";
$check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));

if(isset($check)){
$SuccessAnnonceMsg = 'Donnees reçu';
$SuccessAnnonceJson = json_encode($SuccessAnnonceMsg);
echo $SuccessAnnonceJson ;
 }
mysqli_close($con);
?>


<?php
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

<?php
include 'dbconfig.php';
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$idUser = $obj['idUser'];
$nomReste = $obj['nomReste'];
$quantiteReste = $obj['quantiteReste'];
$descriptionReste = $obj['descriptionReste'];
$adresse = $obj['adresse'];

$CheckSQL = "SELECT * FROM gestionrestes WHERE idUser='$idUser'";
$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
if(isset($check)){
 $RestExistMSG = 'Cette annonce a déjà été crée !';
$RestExistJson = json_encode($RestExistMSG);
 echo $RestExistJson ;
 }
 else{
$Sql_Query = "insert into gestionrestes (idUser,nomReste,quantiteReste,descriptionReste,adresse)
values ('$idUser','$nomReste','$quantiteReste','$descriptionReste','$adresse')";
 if(mysqli_query($con,$Sql_Query)){
$MSG = 'Annonce enregistrée avec succès' ;
$json = json_encode($MSG);
 echo $json ;
 }
 }
 mysqli_close($con);
?>

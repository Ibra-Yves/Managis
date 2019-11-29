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

$CheckSQL = "SELECT * FROM gestionrestes";
$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
$Sql_Query = "insert into gestionrestes (idUser,nomReste,quantiteReste,descriptionReste,adresse) values ('$idUser','$nomReste','$quantiteReste','$descriptionReste','$adresse')";
 mysqli_close($con);
?>
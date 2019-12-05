<?php

include 'dbconfig.php';

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$pseudo = $obj['pseudo'];
$email = $obj['email'];
$passwd = hash('md5', $obj['passwd']);
$CheckSQL = "SELECT * FROM users WHERE email='$email'";
$check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

if(isset($check)){

 $EmailExistMSG = 'Ce compte existe déjà !';
$EmailExistJson = json_encode($EmailExistMSG);

 echo $EmailExistJson ;

 }
 else{

$Sql_Query = "insert into users (pseudo,email,passwd) values ('$pseudo','$email','$passwd')";


 if(mysqli_query($con,$Sql_Query)){

$MSG = 'utilisateur enregistré avec succès' ;

$json = json_encode($MSG);

 echo $json ;

 }
 else{

 echo 'Essayer encore !';

 }
 }
 mysqli_close($con);
?>

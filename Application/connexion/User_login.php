<?php
include 'dbconfig.php';

$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$email = $obj['email'];
$passwd = hash('md5', $obj['passwd']);


$Sql_Query = "select * from users where email = '$email' and passwd = '$passwd' ";
$check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));


if(isset($check)){
$SuccessLoginMsg = 'ok';
$SuccessLoginJson = json_encode($SuccessLoginMsg);

echo $SuccessLoginJson ;
 }else{

$InvalidMSG = 'Email ou mot de passe incorrect ! ' ;
$InvalidMSGJSon = json_encode($InvalidMSG);

echo $InvalidMSGJSon ;
 }
mysqli_close($con);
?>

 <?php
//include 'dbAccess.php';
include '../DBAccess/dbAccess.php';
$db = new dbAccess();
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$pseudo = $obj['pseudo'];
$email = $obj['email'];
$passwd = hash('md5', $obj['passwd']);
$inscription = $db->procCall('creationUser', [$pseudo, $email, $passwd]);
$SuccessLoginJson = json_encode($inscription);
echo $SuccessLoginJson ;

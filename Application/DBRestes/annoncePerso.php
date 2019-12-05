<?php
include 'dbconfig.php';
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

if ($conn->connect_error) {

 die("La connexion à échoué: " . $conn->connect_error);
}

$sql = "SELECT * FROM gestionrestes where idUser='$idUser'";

$result = $conn->query($sql);

if ($result->num_rows >0) {


 while($row[] = $result->fetch_assoc()) {
 $tem = $row;
 $json = json_encode($tem);
 }

} else {
 echo "Aucun résultat trouvé !";
}
 echo $json;
$conn->close();
?>

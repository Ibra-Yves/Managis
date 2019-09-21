<?php
include_once 'INC/Events.php';
$events  = new Events();
if(!is_null($events->getRq())) die($events->send());
//echo($events->getRq());
//print_r($_GET);
//print_r($events->getRq());
include_once 'INC/template.php';
?>

<?php
include_once 'INC/Events.php';
$events  = new Events();
if(!is_null($events->getRq())) die($events->send());
/*if(!empty($_SESSION['user'])){

}*/
include_once 'INC/template.php';


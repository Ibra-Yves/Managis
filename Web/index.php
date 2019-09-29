<?php
include_once 'INC/Events.php';
include_once 'INC/Actions.php';
$events  = new Events();
$action = new Actions();
if(!is_null($events->getRq())) die($events->send());
if(!empty($_SESSION['user'])){

}
include_once 'INC/template.php';


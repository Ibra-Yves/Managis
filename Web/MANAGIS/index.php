<?php
include_once 'INC/Events.php';
$events  = new Events();
if(!is_null($events->getRq())) die($events->send());
include_once 'INC/template.php';


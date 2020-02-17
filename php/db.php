<?php

$host = 'db'; //service name for docker-compose.yml
$user = 'devuser';
$password = 'devpass';
$db='test_db';

$dbi = new mysqli($host,$user,$password,$db); 

?>

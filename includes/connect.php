<?php
//Connect to database
error_reporting(E_ALL);
session_start();
$sessid = session_id();
// localhost:
$dbh = new PDO("mysql:host=localhost;dbname=sofia_pizza", 'root', '');
// 000webhost:
//$dbh = new PDO("mysql:host=localhost:8889;dbname=sofia_pizza", 'root', 'root');
// HostRocket hosting
//$dbh = new PDO("mysql:host=localhost;dbname=sfaverma_sofiapizza", 'sfaverma_sofiapizza', 'SPadmin1');
//echo 'connected to sofia_pizza database<br>';
?>

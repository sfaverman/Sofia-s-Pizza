<?php
//Connect to database
error_reporting(E_ALL);
session_start();
$sessid = session_id();
$dbh = new PDO("mysql:host=localhost:8889;dbname=sofia_pizza", 'root', 'root');
//echo 'connected to sofia_pizza database<br>';
?>

<?php
//Connect to database
error_reporting(E_ALL);

//change for server !!!!!!!!!
$dbh = new PDO("mysql:host=localhost:8889;dbname=sofia_pizza", 'root', 'root');
//echo 'connected to sofia_pizza database<br>';
?>

foreach ($_POST as $key=>$val){
    $content .= $key.' '.$val.'<br>';
    //* empty cart per sessid passed via custom field
    if ($key == 'custom') {
    	$delsql = $dbh->prepare("delete from sp19_cartitems where sessionid = '$val'");
	$delsql->execute();
    }
}
mail("sofiasd@yahoo.com","You have new order!",$content,"Content-type:text/html");
?>


<?php
function numcartitems($sessid){
   $dbh = new PDO("mysql:host=localhost:8889;dbname=sofia_pizza", 'root', 'root');
   //echo 'connected to sofia_pizza database<br>';

   $sql = $dbh->prepare("select count(productid) from sp19_cartitems where sessionid = '$sessid'");
   $sql->execute();
   $row = $sql->fetch();
   $num = $row[0];
   return $num;
}






function addtocart($pid,$qty){
	$sessid = session_id();
$dbh = new PDO("mysql:host=localhost:8889;dbname=sofia_pizza", 'root', 'root');
//echo 'connected to sofia_pizza database<br>';

	$checksql = $dbh->prepare("select productid from sp19_cartitems where productid = ? and sessionid = '$sessid'");
	$checksql->bindValue(1,$pid);
	$checksql->execute();
	$checkpid = $checksql->fetch();
	$existingpid = $checkpid[0];
	if (is_numeric($existingpid)){
		$sql = $dbh->prepare(" update sp19_cartitems set qty = ? where productid = '$pid' and sessionid = '$sessid'");
		$sql->bindValue(1,$qty);
		$sql->execute();
		    echo '<script>alert("Quantity updated!");</script>';

	}
	else {
	$sql = $dbh->prepare("insert into sp19_cartitems (productid,qty,sessionid) values (?,?,?)");
	$sql->bindValue(1,$pid);
	$sql->bindValue(2,$qty);
	$sql->bindValue(3,$sessid);
	$sql->execute();
	//print_r($sql->errorInfo());
    echo '<script>alert("Added to Cart!"); window.location.reload();</script>';
   }
}
?>

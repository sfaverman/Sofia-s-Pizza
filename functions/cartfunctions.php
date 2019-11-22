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

function delCartItem($pid) {
	$sessid = session_id();
	$dbh = new PDO("mysql:host=localhost:8889;dbname=sofia_pizza", 'root', 'root');
	$delsql = $dbh->prepare("delete from sp19_cartitems where productid = '$pid' and sessionid = '$sessid'");
	$delsql->execute();
	echo '<script>
		 var r = confirm("Please confirm delete item id='.$pid.'");
		 if (r == true) {
		 		document.getElementById("popUp").style.display = "block";
				document.getElementById("popUp3").style.display = "block";
				document.getElementById("popUpItem3").innerHTML = " '.$pid.' ";
				document.getElementById("numcartitems").innerHTML = " '.numcartitems($sessid).' ";
		 }
		</script>';
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
		//echo '<script>alert("Quantity updated!");</script>';
		echo '<script>
				document.getElementById("popUp").style.display = "block";
				document.getElementById("popUp2").style.display = "block";
				document.getElementById("popUpItem2").innerHTML = " '.$pid.' ";
			  </script>';
	}
	else {
	$sql = $dbh->prepare("insert into sp19_cartitems (productid,qty,sessionid) values (?,?,?)");
	$sql->bindValue(1,$pid);
	$sql->bindValue(2,$qty);
	$sql->bindValue(3,$sessid);
	$sql->execute();
	//print_r($sql->errorInfo());
    //echo '<script>alert("New Item Added to Cart!"); window.location.reload();</script>';
	//echo "pid $pid";
	echo '<script>
				document.getElementById("popUp").style.display = "block";
				document.getElementById("popUp1").style.display = "block";
				document.getElementById("popUpItem1").innerHTML = " '.$pid.' ";
				document.getElementById("numcartitems").innerHTML = " '.numcartitems($sessid).' ";
	     </script>';
   }
}
?>

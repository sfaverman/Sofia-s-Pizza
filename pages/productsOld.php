<?php
 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Products");
include '../includes/connect.php';
include '../functions/cartfunctions.php';
include '../includes/header.php';
//require 'search.php';

$prodid = $_GET['prodid'];

if (isset($_POST['qty'])){
	$qty = $_POST['qty'];
	addtocart($prodid,$qty);
}

$sql = $dbh->prepare("select * from sp19_products where prodid = '$prodid'");
$sql->execute();
   $row = $sql->fetch();
	$prodid = $row['prodid'];
	$prodname = $row['prodname'];
	$proddesc = $row['proddesc'];
	$prodprice = $row['prodprice'];
    $prodimg = $row['image'];
    //echo '<img src = "prodimages/'.$prodid.'.jpg" height="200"><br>';
    echo '<img src = "../images/products/'.$prodimg.'.jpg" height="200"><br>';
	echo '<strong>'.$prodname.'</strong><br>'.$proddesc.'<br>'.$prodprice;
	echo '<form action = "'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" method="post">
	<input type="number" name="qty" class="small" size="5" value="1" required="required"/>
	<input type="submit" value="Add to Cart">
	</form>
	';
	include '../includes/footer.php';

?>

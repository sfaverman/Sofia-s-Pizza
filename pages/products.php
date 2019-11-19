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
echo '<section class="gallery">';
$sql = $dbh->prepare("select * from sp19_products where prodid = '$prodid'");
$sql->execute();
   $row = $sql->fetch();
	$prodid = $row['prodid'];
	$prodname = $row['prodname'];
	$proddesc = $row['proddesc'];
	$prodprice = $row['prodprice'];
    $prodimg = $row['image'];
    //echo '<img src = "prodimages/'.$prodid.'.jpg" height="200"><br>';
	 echo '<div class="card-container">';
	   echo '<div>';
			  echo '<img src="../images/products/'.$prodimg.'.jpg" alt="'.$prodname.'" class="img-responsive zoomIn">';
	   echo '</div>';
	   echo '<div>';
		echo '<h3 class="text-alignCenter">'.$prodname.'</h3>';
		echo '<p class="price text-alignCenter">'.$prodprice.'</p>';
   		echo '<p>'.$proddesc.'</p>';
		echo '<form action = "'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" method="post">
		<ul class="formBtn">
			<li><label for="qty">Qty</label></li>
			<li><input type="number" class="qty" name="qty" id="qty" size="5" value="1" required="required"/></li>
			<li><input type="submit" class="button btn-orderForm" value="Add to Cart">
			</li>
		</ul>

		</form>
		';
	  echo '</div>';
	echo '</div>';
echo '</section>';
    echo '<a id="bttBtn" href="#products"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>';
	include '../includes/footer.php';

?>

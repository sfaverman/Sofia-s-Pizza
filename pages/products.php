<?php
 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Products");
include '../includes/connect.php';
include '../functions/cartfunctions.php';
include '../includes/header.php';
//require 'search.php';

$prodid = $_GET['prodid'];

/*if (isset($_POST['qty'])){
	$qty = $_POST['qty'];
	addtocart($prodid,$qty);
}*/
if(isset($_POST['submit'])) {
	$prodid = $_GET['prodid'];

	//$rest = var_dump($_POST);
	//echo $rest;

 	$qty = $_POST["qty"];

	addtocart($prodid,$qty);
};

echo '<section class="grid column2">';
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
			<li><input type="submit" name="submit" class="button btn-orderForm" value="Add to Cart">
			</li>
		</ul>

		</form>
		';
	  echo '</div>';
	echo '</div>';
echo '</section>';
echo '<section class="orderTotal">
		<h4>Your Order</h4>';

		$sql = $dbh->prepare("select  sp19_products.prodid, sp19_products.prodname,   sp19_products.prodprice,  sp19_cartitems.qty
			from sp19_products, sp19_cartitems
			where sp19_products.prodid = sp19_cartitems.productid
			and sp19_cartitems.sessionid = '$sessid'");
		$sql->execute();
			    // display each cart
			   	$i=1;
			    $total=0;
			echo '<article class="checkout">';
				while  ($row = $sql->fetch()){

					$prodname = $row['prodname'];
					$prodprice = $row['prodprice'];
					$qty = $row['qty'];

				//echo '<img src = "prodimages/'.$prodid.'.jpg" height="200"><br>';

				echo '<p>'.$prodname.' ----- $'.$prodprice.' - QTY: '.$qty.'</p>';


				$i++;
				$total = $total + $prodprice;
				}
			if ($i==1) {
			$numItems = $i - 1;
			echo "<p><i>You have $numItems item in your cart</i></p>";
			};
			echo '<p><strong>Subtotal: '.$total.'</strong></p>';

			echo '<a href="#" class="btn button checkoutBtn">Checkout!</a>';
		    echo '</article>';

	echo '</section>';
    echo '</section>';
    echo '<a id="bttBtn" href="#products"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>';
	include '../includes/footer.php';

?>

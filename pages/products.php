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
    $prodlink = $row['link'];
    $prod_wsale = $row['weeklyspecial'];

    //echo '<img src = "prodimages/'.$prodid.'.jpg" height="200"><br>';
	 echo '<div class="card-container">';
     if ($prod_wsale == $weekday) { echo '<div class="ribbon">Sale</div>'; };
	    echo '<div>';
         if ($prod_wsale == $weekday) {
             echo '<img src="'.$rootPath.'/images/products/'.$prodimg.'.jpg" alt="'.$prodname.'" class="img-responsive zoomIn topcut">';}
         else {
             echo '<img src="'.$rootPath.'/images/products/'.$prodimg.'.jpg" alt="'.$prodname.'" class="img-responsive zoomIn">';}
	    echo '</div>';
	    echo '<div>';
		echo '<h3 class="text-alignCenter">'.$prodname.'</h3>';
        if ($prod_wsale == $weekday) {
             echo '<p text-alignCenter> reg $'.$prodprice.', sale<span class="price">$'.discount20($prodprice).'</span></p>';}
        else {
             echo '<p class="price text-alignCenter">$'.$prodprice.'</p>';}
		echo '<p>'.$proddesc.'</p>';
		/*echo '<form action = "'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" method="post">*/
		echo '<form action = "'.$rootPath.$prodlink.'" method="post">';

		/* creating dropdown option for sizes */

		$sqlOpt = $dbh->prepare("select distinct sp19_labels.labelid,sp19_labels.labelname
			from sp19_labels, sp19_attributes
			where sp19_labels.labelid = sp19_attributes.labelid
			and sp19_attributes.prodid = '$prodid'");

		$sqlOpt->execute();
		while ($rowOpt = $sqlOpt->fetch()){
			$labelid = $rowOpt[0];
			$labelname = $rowOpt[1];
			echo $labelname.': <select name="'.$labelname.'" value="'.$labelname.'">'."\n";
			$innersql = $dbh->prepare("select value,price from sp19_attributes where prodid = '$prodid' and labelid = '$labelid'");
			$innersql->execute();
			while ($innerrow = $innersql ->fetch()){
				$value = $innerrow[0];
				$price = $innerrow[1];
				echo '<option value = "'.$value.'">'.$value.' - $'.$price.'</option>'."\n";

			}
			echo '</select><br>';
		}
		echo '
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

	 echo '<a id="bttBtn" href="#products"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>';

    echo '</section>';
echo '<section class="orderTotal">
		<h4>Your Order</h4>';

		$sql = $dbh->prepare("select  sp19_products.prodid, sp19_products.prodname,   sp19_products.prodprice,  sp19_products.weeklyspecial, sp19_cartitems.qty
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
                    $prod_wsale = $row['weeklyspecial'];

				//echo '<img src = "prodimages/'.$prodid.'.jpg" height="200"><br>';
                   /*echo "$prod_wsale $weekday";*/

                if ($prod_wsale == $weekday) { $prodprice = discount20($prodprice); }

				echo '<p>'.$prodname.' ----- $'.$prodprice.' - QTY: '.$qty.'</p>';

				$i++;
				$total = $total + ($prodprice * $qty);
				}
			if ($i==1) {
			$numItems = $i - 1;
			echo "<p><i>You have $numItems item in your cart</i></p>";
			};
			echo '<p><strong>Subtotal: $'.$total.'</strong></p>';

			echo '<a href="'.$rootPath.'/pages/viewcart.php#orderTotal" class="btn button checkoutBtn">Buy Now!</a>';
		    echo '</article>';

	echo '</section>';
    echo '</section>';
   /* echo '<a id="bttBtn" href="#products"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>';*/
	include '../includes/footer.php';

?>

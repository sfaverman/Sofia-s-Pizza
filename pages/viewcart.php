<?php
 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - View Cart");
include '../includes/connect.php';
include '../functions/cartfunctions.php';
include '../includes/header.php';

//echo 'Sessionid = '.$sessid;



$sql = $dbh->prepare("select sp19_products.prodid, sp19_products.prodname, sp19_products.prodprice, sp19_products.image, sp19_cartitems.qty
	from sp19_products, sp19_cartitems
	where sp19_products.prodid = sp19_cartitems.productid
	and sp19_cartitems.sessionid = '$sessid'");
$sql->execute();


?>
<script>
	function sameship(){
		if (document.getElementById('ship').checked == true){
	document._xclick.billfirst_name.value = document._xclick.first_name.value;
	    }
	    else {
	document._xclick.billfirst_name.value = '';
	    }

	}

</script>

<section class="grid asideLeft">
	<section>
	    <h4>Your Cart</h4>
		<article class="gallery text-alignCenter">
			<?php
			    // display each cart
			   	$i=1;
			   // $total=0;
				while  ($row = $sql->fetch()){
					$prodid = $row['prodid'];
					$prodname = $row['prodname'];
					$prodprice = $row['prodprice'];
					$prodimg = $row['image'];
					$qty = $row['qty'];
				echo '<div class="card-container">';
						//echo '<img src = "prodimages/'.$prodid.'.jpg" height="200"><br>';

						 echo '<img src="../images/products/'.$prodimg.'.jpg" alt="'.$prodname.'" class="img-responsive zoomIn">';
							  /* echo '</div>';*/
							   echo '<div>';
									echo '<p>'.$prodname.'</p>';
								    echo '<p class="price">$'.$prodprice.'  QTY: '.$qty.'</p>';
								   	echo '<a href="#" class="btn button ">Edit Item</a>';
								echo '</div>';

				$i++;
				//$total = $total + $prodprice;
				echo '</div>';
				}
			?>
		</article>
		<a href="order.php" class="btn button checkoutBtn">Continue Shopping!</a>
	</section>

	<section class="orderTotal">
		<h4>Your Order</h4>

		<?php

		$sql = $dbh->prepare("select  sp19_products.prodid, sp19_products.prodname, sp19_products.prodprice,  sp19_cartitems.qty
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


				echo '<input type = "hidden" name = "item_name_'.$i.'" value = "'.$prodname.'" /><input type = "hidden" name = "amount_'.$i.'" value = "'.$prodprice.'" />
				<input type = "hidden" name = "quantity_'.$i.'" value = "'.$qty.'" /> ';

				$i++;
				$total = $total + $prodprice;
				}

			echo '<p><strong>Subtotal: '.$total.'</strong></p>';

			$delivery = 5;
		    ?>
		    <ul class="radioList">
                           <li>
                              <label for="r-method-delivery">
                           	 <input type="radio" name="r_method" value="delivery" id="r-method-delivery">Delivery</label>
                           </li>
                           <li>
                              <label for="r-method-carryout">
                           	 <input type="radio" name="r_method" value="carryout" id="r-method-carryout">Carryout</label>
                           </li>

             </ul><br>

             <ul class="promoCode">
             	<li >
             		<label for="promo">Enter Promo Code:</label>
             	</li>
             	<li>
             		<input type="text" id="promo" name="promo"><br>
             	</li>
             	<li>
             		<a href="#" class="btn button">Apply!</a>
             	</li>
             </ul>

            <?php
			echo '<p>Delivery: $'.$delivery.'</strong></p>';
		    $total = $total + $delivery;
			echo '<p><strong>Total: '.$total.'</strong></p>';
			echo '<a href="#" class="btn button checkoutBtn">Checkout!</a>';
		    echo '</article>';
			?>

	<!--	<form action= "https://www.sandbox.paypal.com/us/cgi-bin/webscr"
        method="post"  name="_xclick">-->

  <!--Shipping:<br/>
  First Name
  <input type = "text" id = "firstname" name = "first_name" />
  <br/>
  Last Name
  <input type = "text" name = "last_name" />
  <br/>
  Address
  <textarea name = "address1" cols="10" rows="5"></textarea>
  <br/>
  City
  <input type = "text" name = "city"  id = "city"/>
  <br/>
  State
  <input type = "text" name = "state"  id = "state" />
  <br/>
  Zip:
  <input type = "text" name = "zip" id = "zip"/>
  <br/>
  Same as Shipping?
  <input type = "checkbox" id = "ship" onClick="sameship();"/>
  <br/>
  Billing:<br/>
  First Name
  <input type = "text" id = "billfirst_name" name = "billfirst_name" />
  <br/>
  Last Name
  <input type = "text" name = "billlast_name" />
  <br/>
  Address
  <textarea name = "billaddress1"></textarea>
  <br/>
  <span id = "citystate" style="display:none"> City
  <input type = "text" name = "billcity"/>
  <br/>
  State
  <input type = "text" name = "billstate"/>
  <br/>
  </span>
  Zip:
  <input type = "text" name = "billzip" onblur="makeRequest('state');"/>
  <br/>
  Email:
  <input type = "text" name = "email" />
  <br/>
  Phone:
  <input type = "text" name = "night_phone_a" />
  <br/>
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="kdsecor+350@gmail.com">
  <input type="hidden" name="upload" value="1">
  <input type="hidden" name="currency_code" value="USD">
  <input type = "hidden" name = "shipping_1" value = "0.00"/><input type ="hidden" id ="subtotal" name = "subtotal" value = "0.00"><br/>Subtotal:$ <div id = "copy">Shipping is</div>

  <input class="btn button" type="submit"  name = "submit" value = "Check Out">
</form>

	-->
	</section>
</section>

<a id="bttBtn" href="#viewcart"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>
<?php
include '../includes/footer.php';
?>

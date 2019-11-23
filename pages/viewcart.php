<?php
 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - View Cart");
include '../includes/connect.php';
include '../functions/cartfunctions.php';
include '../includes/header.php';

//echo 'Sessionid = '.$sessid;

//$prodid = $_GET['prodid'];

if(isset($_POST['submit'])) {
	$prodid = $_POST['prodid'];

	//$rest = var_dump($_POST);
	//echo $rest;

 	/*$qty = $_POST["qty"];*/
	$qty = $_POST["qty$prodid"];

	addtocart($prodid,$qty);
};
if(isset($_POST['delete'])) {
	$prodid = $_POST['prodid'];

	//$rest = var_dump($_POST);
	//echo $rest;
	//echo '<script>alert("Confirm Delete item");</script>';
 	/*$qty = $_POST["qty"];

	addtocart($prodid,$qty);*/
	delCartItem($prodid);
};

/*if(isset($_POST['checkout'])) {

	}
}*/

$sql = $dbh->prepare("select sp19_products.prodid, sp19_products.prodname, sp19_products.prodprice, sp19_products.image, sp19_cartitems.qty
	from sp19_products, sp19_cartitems
	where sp19_products.prodid = sp19_cartitems.productid
	and sp19_cartitems.sessionid = '$sessid'");
$sql->execute();


?>
<script>
	/*function sameship(){
		if (document.getElementById('ship').checked == true){
	document._xclick.billfirst_name.value = document._xclick.first_name.value;
	    }
	    else {
	document._xclick.billfirst_name.value = '';
	    }
	}*/

	function disDelMethod() {
		if (document.getElementById('r-method-delivery').checked == true){
		 //alert ("2 delivery button is checked");
		 document.getElementById("carryout").style.display = "none";
	     document.getElementById("delivery").style.display = "block";


	    } else if (document.getElementById('r-method-carryout').checked == true) {
		  //alert ("3 carryout button is checked");
		  document.getElementById("delivery").style.display = "none";
		  document.getElementById("carryout").style.display = "block";
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
								    /*echo '<p class="price">$'.$prodprice.'  QTY: '.$qty.'</p>';*/
							echo '<form action = "'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" method="post">';

							  echo '<ul class="formBtn">
										<li><label for="qty">Qty</label></li>
										<li><input type="number" name="qty'.$prodid.'" id="qty'.$prodid.'" size="5" value="'.$qty.'" required="required"/></li>
										<input type="hidden" name="prodid" value="'.$prodid.'">
										<li><input type="submit" name="submit" class="button btn-orderForm" value="Update">
										<li><input type="submit" name="delete" class="button btn-orderForm" value="Delete">
										</li>
									</ul>';
								   /*	echo '<a href="#" class="btn button ">Delete Item</a>';*/
							echo '</form>';
				echo '</div>';

				$i++;
				//$total = $total + $prodprice;
				echo '</div>';
				}
			?>
		</article>
		<a href="order.php" class="btn button checkoutBtn">Continue Shopping!</a>
	</section>

	<section id="orderTotal" class="orderTotal">
		<h4>Your Order</h4>
		<form action = "https://www.sandbox.paypal.com/cgi-bin/webscr" method = "post" target = "paypal" name="_xclick">
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
				$total = $total + ($prodprice * $qty);
				}

			if ($i==1) {
			$numItems = $i - 1;
			echo "<p><i>You have $numItems item in your cart</i></p>";
			};

			echo '<p><strong>Subtotal: '.$total.'</strong></p>';

		    ?>

             <ul class="promoCode">
             	<li >
             		<label for="promo">Enter Promo Code:</label>
             	</li>
             	<li>
             		<input type="text" id="promo" name="promo"><br>
             	</li>
             	<li>
             		<a href="#" class="btn btn-orderForm">Apply!</a>
             	</li>
             </ul>

            <?php

		    echo
		    ' <fieldset class="fieldsetStyle">
                    <legend class="formSubHeader legendStyle">Delivery Method</legend>
			<ul class="radioList">
                           <li>
                              <label for="r-method-delivery">
                           	 <input type="radio" name="r_method" value="delivery" id="r-method-delivery" onClick="disDelMethod();" required>Delivery</label>
                           </li>
                           <li>
                              <label for="r-method-carryout">
                           	 <input type="radio" name="r_method" value="carryout" id="r-method-carryout" onClick="disDelMethod();">Carryout</label>
                           </li>

             </ul></fieldset>';
			?>

            <article id="delivery" class="fullWidthForm" >
                <fieldset class="fieldsetStyle">
                    <legend class="formSubHeader legendStyle">Delivery Location</legend>
                <p>Please enter your name and address:</p>

                <label for="name">Name*:</label><span id="nameVal"></span>
                <input type="text" id="name" name="name" required pattern="^([a-zA-Z ]){2,30}$" title="Please enter a valid name" autofocus>
                <label for="a-type">Address Type:</label>
                    <select name="a-type" id="a-type">
                        <option value="">- Please select -</option>
                        <option value="H">House</option>
                        <option value="A">Apartment</option>
                        <option value="B">Business</option>
                        <option value="C">Campus</option>
                        <option value="H">Hotel</option>
                        <option value="D">Dorm</option>
                        <option value="O">Other</option>
                    </select>
                <div id="otherOpt" style="display:none">
                    <label for="other">Other Address Type:</label>
                    <input type="text" id="other" name="other">
                </div>
                <label for="street">Street name*:</label><span id="streetVal"></span>
                <input type="text" id="street" name="street" placeholder="123 Your St" pattern="^\d+[ ](?:[A-Za-z0-9.-]+[ ]?)+(?:Avenue|Lane|Road|Boulevard|Drive|Street|Ave|Dr|Rd|Blvd|Ln|St|Way)\.?" title="Please enter a street name like: 123 Your St" required>
                <ul>
                    <li>
                        <label for="city">City*:</label><span id="cityVal"></span>
                        <input type="text" id="city" name="city" pattern="^[a-zA-Z',.\s-]{1,25}$" title="Please enter a valid city name" required>
                    </li>
                    <li>
                        <label for="s-state">State:</label>
                        <select name="s-state" id="s-state">
                            <option value="">- Please select -</option>
                            <option value="CA">California</option>
                            <option value="WA">Washington</option>
                            <option value="OR">Oregon</option>
                            <option value="AZ">Arizona</option>
                        </select>
                    </li>
                    <li>
                        <label for="zip">ZipCode*:</label><span id="zipVal"></span>
                        <input type="text" id="zip" name="zip" placeholder="999-999-9999" pattern="^[0-9]{5}(?:-[0-9]{4})?$" title="Please enter a valid zipcode" required>
                    </li>
                </ul>

                <label for="email">Email*:</label>
                <input type="email" id="email" name="email" placeholder="name@url.com" required>


                <label for="phone">Phone*:</label>
                <input type="tel" id="phone" name="phone" placeholder="000-000-0000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Please enter phone number as 999-999-9999" required>

                <p class="formNote">* indicated required field</p>
                </fieldset>
            <?php
				/*$delivery = 5;
				echo '<p>Delivery: $'.$delivery.'</strong></p>';
				$total = $total + $delivery;*/
			?>
            </article>
            <article id="carryout" >
            	   <select class="searchLoc" id="selLoc">
						<option value="">Location</option>
						<option value="92128">Rancho Bernardo</option>
						<option value="92108">Mission Valley</option>
						<option value="92037">La Jolla</option>
						<option value="92014">Del Mar</option>
						<option value="92107">Point Loma</option>
            	  </select>
            	  <button id="butLoc2" value="Seleted location" class="searchButton"><i class="fas fa-map-marker-alt"></i>
            	  </button>

            </article>
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="sb-0lxwj140581@business.example.com">
  <input type="hidden" name="upload" value="1">
 <!-- <input type = "hidden" name = "no_shipping" value = "2"> -->
  <input type="hidden" name="currency_code" value="USD">
  <p><strong>Total: <?php echo "$total"; ?></strong></p>
  <input type ="hidden" id ="subtotal" name = "subtotal" value = "<?php echo "$total"; ?>">

  <input type="submit" name="submit" class="btn button checkoutBtn" value="Checkout!">

</form>


	</section>
</section>

<a id="bttBtn" href="#viewcart"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>
<?php
include '../includes/footer.php';
?>

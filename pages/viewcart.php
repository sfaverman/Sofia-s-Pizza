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
		<a href="order.php" id="checkout" class="btn button checkoutBtn">Continue Shopping!</a>
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

			if ($i==1) {
			$numItems = $i - 1;
			echo "<p><i>You have $numItems item in your cart</i></p>";
			};

			echo '<p><strong>Subtotal: '.$total.'</strong></p>';

			$delivery = 5;
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
			echo '<p>Delivery: $'.$delivery.'</strong></p>';
		    $total = $total + $delivery;
			echo '<p><strong>Total: '.$total.'</strong></p>';
		    echo
		    '<ul class="radioList">
                           <li>
                              <label for="r-method-delivery">
                           	 <input type="radio" name="r_method" value="delivery" id="r-method-delivery" onClick="disDelMethod();">Delivery</label>
                           </li>
                           <li>
                              <label for="r-method-carryout">
                           	 <input type="radio" name="r_method" value="carryout" id="r-method-carryout" onClick="disDelMethod();">Carryout</label>
                           </li>

             </ul><br>';

		    //<form action="" id="pizza-form">
            echo '<form id="pizza-form" action = "'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" method="post">';
		    ?>

           <!-- <article id="delivery" class="fullWidthForm">-->
            <article id="delivery">
                <fieldset class="fieldsetStyle">
                    <legend class="formSubHeader legendStyle">Delivery Location</legend>
                <p>Please enter your name and address:</p>

                <label for="name">Name*:</label><span id="nameVal"></span>
                <input type="text" id="name" name="name" autofocus>
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
                <input type="text" id="street" name="street" >
                <ul>
                    <li>
                        <label for="city">City*:</label><span id="cityVal"></span>
                        <input type="text" id="city" name="city">
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
                        <input type="text" id="zip" name="zip">
                    </li>
                </ul>

                <label for="email">Email*:</label>
                <input type="email" id="email" name="email" placeholder="name@url.com">


                <label for="phone">Phone*:</label>
                <input type="tel" id="phone" name="phone" placeholder="000-000-0000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">

                <p class="formNote">* indicated required field</p>
                </fieldset>

            </article>
            <article id="carryout" >
            	<form class="search" action ="#" method="get">
            	        <select class="searchLoc" id="selLoc">
            	            <option value="">Location</option>
            	            <option value="92128">Rancho Bernardo</option>
            	            <option value="92108">Mission Valley</option>
            	            <option value="92037">La Jolla</option>
            	            <option value="92014">Del Mar</option>
            	            <option value="92107">Point Loma</option>
            	         </select>
            	         <button type="submit" id="butLoc" value="Seleted location" class="searchButton">
            							<i class="fas fa-map-marker-alt"></i>
            						 </button>

            			    </form>
            </article>
            <input type="submit" name="checkout" class="btn button checkoutBtn" value="Checkout!">
            <!--<a href="#" class="btn button checkoutBtn">Checkout!</a>';-->

		    <?php
		    echo '</form>';
			/*echo '<a href="#" class="btn button checkoutBtn">Checkout!</a>';*/
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

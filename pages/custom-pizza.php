<?php
 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Products");
include '../includes/connect.php';
include '../functions/cartfunctions.php';
include '../includes/header.php';

/*$prodid = $_GET['prodid'];

if(isset($_POST['submit'])) {
	$prodid = $_GET['prodid'];

	//$rest = var_dump($_POST);
	//echo $rest;

 	$qty = $_POST["qty"];

	addtocart($prodid,$qty);
};*/
?>
<main>

      <h1 class="text-alignCenter">Build Your Own Pizza</h1>
      <p class="ml mr text-alignCenter">Build a pizza you'd like to order. Choose from variety options and we will provide you with an estimated total.</p>

	<section id="buildPizza" class="gallery">
			<form action="" id="pizza-form">
					<h3 class="formHeader text-alignCenter ">You Make It - We Bake It!</h3>

					<fieldset class="fieldsetStyle">
						<legend class="formSubHeader legendStyle">Build your pizza</legend>

							<p class="formSubHeader text-bold text-underline">Choose your crust</p><span id="crustVal"></span>


							<ul class="radioList">
							   <li>
								  <label for="r-dough-hand">
								<input type="radio" name="r_dough" value="Hand Tossed" id="r-dough-hand">Hand Tossed</label>
							   </li>
							   <li>
								  <label for="r-dough-thin">
							<input type="radio" name="r_dough" value="Thin" id="r-dough-thin">Thin Crust</label>
							   </li>
							   <li>
								   <label for="r-dough-nys">
							<input type="radio" name="r_dough" value="NYS" id="r-dough-nys">New York Style</label>
							   </li>
							   <li>
								   <label for="r-dough-gluten">
							<input type="radio" name="r_dough" value="Gluten Free" id="r-dough-gluten">Gluten Free</label>
							   </li>
						   </ul>





				<article>
					<p class="formSubHeader text-bold text-underline">Choose pizza size, cheese and sauce</p>
					<p>Please enter the size of pizza:</p>

				   <ul class="dropOption">
					   <li>
							<label for="p-size" class="floatLeft">Pizza size:</label>
						<select name="p-size" id="p-size" class="halfWidth">
							<option value="">- Please select -</option>
						   <!-- <option value="9.99">Small ($9.99)</option>
							<option value="12.99">Medium ($12.99)</option>
							<option value="14.99">Large ($14.99)</option>-->
						</select>

					   </li>
					   <li class="clearfloat"></li>
					   <li>
							   <label for="o-cheeze" class="floatLeft">Cheeze options:</label>
						<select name="o-cheeze" id="o-cheeze" class="halfWidth">
							<option value="">- Please select -</option>
							<option value="0">Light ($0.00)</option>
							<option value="0">Normal ($0.00)</option>
							<option value="2.99">Extra ($2.99)</option>
							<option value="3.99">Double ($3.99)</option>
						</select>
					   </li>
					   <li class="clearfloat"></li>
					   <li>
							 <label for="o-sauce" class="floatLeft">Sauce options:</label>
						<select name="o-sauce" id="o-sauce" class="halfWidth">
							<option value="">- Please select -</option>
							<option value="0.00">Regular Tomato ($0.00)</option>
							<option value="0.99">Hearty Tomato ($0.99)</option>
							<option value="1.99">BBQ Sauce ($1.99)</option>
						</select>
					   </li>
					   <li class="clearfloat"></li>
				   </ul>


				</article>
				<article >
					<p class="formSubHeader text-bold text-underline">Toppings</p>
					<p>Select the toppings. Each topping is $.99 extra. </p>

					 <ul class="cbList">
							   <li>
								  <label for="c-pepperoni">
								  <input type="checkbox" name="toppings" value="pepperoni" id="c-pepperoni">Pepperoni</label>
								</li>
							   <li>
								  <label for="c-sausage">
						<input type="checkbox" name="toppings" value="sausage" id="c-sausage">Sausage</label>
							   </li>

							   <li>
								  <label for="c-ham">
						<input type="checkbox" name="toppings" value="ham" id="c-ham">Ham</label>
							   </li>
							   <li>
								  <label for="c-bacon">
						<input type="checkbox" name="toppings" value="bacon" id="c-bacon">Bacon</label>
							   </li>
							   <li>
								  <label for="c-salami">
						<input type="checkbox" name="toppings" value="salami" id="c-salami">Salami</label>
							   </li>
							   <li>
								  <label for="c-peppers">
						<input type="checkbox" name="toppings" value="peppers" id="c-peppers">Peppers</label>
							   </li>
							   <li>
								   <label for="c-olives">
						<input type="checkbox" name="toppings" value="olives" id="c-olives">Olives</label>
							   </li>
							   <li>
								   <label for="c-jalapenos">
						<input type="checkbox" name="toppings" value="jalapenos" id="jalapenos">Jalapenos</label>
							   </li>

						<li>
							<label for="c-mashrooms">
						<input type="checkbox" name="toppings" value="mashrooms" id="c-mashrooms">Mushrooms</label>
						</li>

						<li>
							<label for="c-pineapple">
						<input type="checkbox" name="toppings" value="pineapple" id="c-pineapple">Pineapple</label>

						</li>
						<li>
							<label for="c-onions">
						<input type="checkbox" name="toppings" value="onions" id="onions">Onions</label>
						</li>

						<li>
							<label for="c-spinach">
						<input type="checkbox" name="toppings" value="spinach" id="spinach">Spinach</label>
						</li>
						   </ul>





				</article>

				<article id="addCustomPizza" class="fullWidthForm">
					<p class="formSubHeader text-bold text-underline">Special notes</p>
					 <label for="msg"></label>
					 <textarea name="message" id="msg" placeholder="Please write your message here"></textarea>

				</article>

				<div>
						<p>
							<label for="btn-orderForm">Click to estimate:</label>
							<input type="submit" class="btn btn-orderForm" value="Total">
							<input type="text" placeholder="$0.00" id="txt-estimate">
						</p>

				</div>
				<div id="est-results1" class="results"></div>
				</fieldset>



               <article class="card-container">
                	<!--<h2>Your Custom Pizza</h2>-->
                	<div>
                		<img src="../images/pizza-demo-logo.png" class="img-responsive" alt="custom pizza">
                	</div>
                	<div>
                		<h3 class="text-alignCenter">Your Custom Pizza</h3>
						<p id="cp-price" class="price text-alignCenter"></p>
   						<p id="est-results2">Description bla-bla-bla</p>

						<ul class="formBtn">
							<li><label for="qty">Qty</label></li>
							<li><input type="number" class="qty" name="qty" id="qty" size="5" value="1" required="required"/></li>
							<li><input type="submit" name="submit" class="button btn-orderForm" value="Add to Cart">
							</li>
						</ul>
                	</div>
                </article>
	 </form> <!-- end billing form -->
  </section>

</main>

<a id="bttBtn" href="#custom-pizza"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>'
<?php
	include '../includes/footer.php';
?>

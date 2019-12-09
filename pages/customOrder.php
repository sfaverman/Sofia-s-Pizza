<?php
	 // Set the page title and include the header file.
    define('TITLE', "Sofia's Pizza - Custom Pizza Order");

	include '../includes/connect.php';
	include '../functions/cartfunctions.php';
	include '../includes/header.php';

?>

  <section class="bgImage">
     <p>&nbsp;</p>
      <section id="formWrapper">

         <h1 class="formHeader">Order pizza</h1>
      <p>Build a pizza you'd like to order. Start with the personal information that the delivery man will use to deliver your pizza, choose from variety options and we wil provide you with an estimated total.</p>
            <form action="#" id="pizza-form">
            <article class="fullWidthForm">
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
                <input type="tel" id="phone" name="phone" placeholder="999-999-9999" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Please enter phone in a format as 999-999-9999">

                <p class="formNote">* indicated required field</p>
                </fieldset>

            </article>

             <article>
               	    <fieldset class="fieldsetStyle">
                	<legend class="formSubHeader legendStyle">Build your order</legend>

                	<p>You Make It - We Bake It. The Best custom built pizza restaurant all over San Diego Area.</p>


                	<p class="formSubHeader text-bold text-underline">Choose your crust</p><span id="crustVal"></span>


                	        <ul class="radioList">
                	           <li>
                	              <label for="r-dough-hand">
                	            <input type="radio" name="r_dough" value="hand" id="r-dough-hand">Hand Tossed</label>
                	           </li>
                	           <li>
                	              <label for="r-dough-thin">
                	        <input type="radio" name="r_dough" value="thin" id="r-dough-thin">Thin Crust</label>
                	           </li>
                	           <li>
                	               <label for="r-dough-nys">
                	        <input type="radio" name="r_dough" value="nys" id="r-dough-nys">New York Style</label>
                	           </li>
                	           <li>
                	               <label for="r-dough-gluten">
                	        <input type="radio" name="r_dough" value="gluten" id="r-dough-gluten">Gluten Free</label>
                	           </li>
                	       </ul>


            <article class="fullWidthForm">
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
           <!-- <article class="fullWidthForm">-->
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





          <!--  </article>-->

            <article>
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
                    <div id="est-results" class="results"></div>
            </div>
             </fieldset>
			</article>
        </form>
        <!-- Billing form -->
         <form action="#" id="billing-form">
         <article>
                <fieldset class="fieldsetStyle">
                  <legend class="formSubHeader legendStyle">Billing Information</legend>
                <p class="formText">Please select the method of payment</p>
                <span id="ccRadioVal"></span>
                 <ul class="radioList grid column3">
                   <label for="r-card-visa">
                      <li>
                        <input type="radio" name="r_card" value="visa" id="r-card-visa" checked>Visa
                     </li>
                   </label>
                   <label for="r-card-master">
                   <li>

                        <input type="radio" name="r_card" value="master" id="r-card-master">Master Card

                   </li>
                   </label>
                   <label for="r-card-ax">
                   <li>


                        <input type="radio" name="r_card" value="ax" id="r-card-ax">American Express
                   </li>
                   </label>
               </ul>


               <label for="acctNum">Please enter your credit  card account number:</label><span id="acctNumVal"></span>
               <input type="text" id="acctNum" name="acctNum" placeholder="1234 5678 9012 3456">

               <article class="grid column2">
					 <div>
						<label for="expDate">Expiration Date:</label><span id="expVal"></span>
						<input type="text" id="expDate" name="expDate" placeholder="dd/yy">
					 </div>

					  <div>
						<label for="cvcCode">CVC/Security Code:</label><span id="cvcVal"></span>
						<input type="text" id="cvcCode" name="cvcCode">
					  </div>

              </article>
              </fieldset>



            </article>
			 <article class="formBtn clearIt">
                <input type="submit" class="btn btn-orderForm" value="Order!">
                <input type="reset" class="btn btn-orderForm">
            </article>
             <div id="order-results" class="results"></div>
        </form> <!-- end billing f0rm -->

     </section>

  <a id="bttBtn" href="#customOrder"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>
<?php
	include('../includes/footer.php');
?>
